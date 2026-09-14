<?php
/**
 * Booking request custom post type: registration, admin list/edit UI, and the
 * AJAX handler that the frontend form in index.php submits to.
 */

function monarch_register_booking_cpt() {
	register_post_type( 'booking_request', array(
		'labels' => array(
			'name'          => 'Заявки на бронирование',
			'singular_name' => 'Заявка на бронирование',
			'menu_name'     => 'Бронирования',
			'all_items'     => 'Все заявки',
			'view_item'     => 'Просмотр заявки',
			'search_items'  => 'Найти заявку',
			'not_found'     => 'Заявок не найдено',
		),
		'public'          => false,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'menu_icon'       => 'dashicons-calendar-alt',
		'capability_type' => 'post',
		'supports'        => array( 'title' ),
	) );
}
add_action( 'init', 'monarch_register_booking_cpt' );

function monarch_format_date( $ymd ) {
	if ( ! $ymd ) {
		return '—';
	}
	$ts = strtotime( $ymd );
	return $ts ? date_i18n( 'd.m.Y', $ts ) : esc_html( $ymd );
}

function monarch_booking_status( $post_id ) {
	$status = get_post_meta( $post_id, 'booking_status', true );
	return $status ? $status : 'pending';
}

function monarch_booking_status_label( $status ) {
	$labels = array(
		'pending'   => 'На рассмотрении',
		'confirmed' => 'Подтверждено',
		'rejected'  => 'Отклонено',
	);
	return isset( $labels[ $status ] ) ? $labels[ $status ] : $labels['pending'];
}

function monarch_booking_status_badge( $status ) {
	$colors = array(
		'pending'   => array( '#92400E', '#FEF3C7' ),
		'confirmed' => array( '#065F46', '#D1FAE5' ),
		'rejected'  => array( '#991B1B', '#FEE2E2' ),
	);
	list( $text, $bg ) = isset( $colors[ $status ] ) ? $colors[ $status ] : $colors['pending'];
	return '<span style="display:inline-block;padding:2px 10px;border-radius:9999px;font-size:12px;font-weight:600;white-space:nowrap;color:' . esc_attr( $text ) . ';background:' . esc_attr( $bg ) . ';">' . esc_html( monarch_booking_status_label( $status ) ) . '</span>';
}

function monarch_booking_status_action_url( $post_id, $status ) {
	return wp_nonce_url(
		admin_url( 'admin.php?action=monarch_booking_status&post=' . $post_id . '&status=' . $status ),
		'monarch_booking_status_' . $post_id
	);
}

/** Renders "Подтвердить / Отклонить / Вернуть в ожидание" links for whichever states the request isn't currently in. */
function monarch_booking_status_links( $post_id, $status, $tag = 'a' ) {
	$targets = array(
		'confirmed' => 'Подтвердить',
		'rejected'  => 'Отклонить',
		'pending'   => 'Вернуть в ожидание',
	);
	$links = array();
	foreach ( $targets as $target => $label ) {
		if ( $target === $status ) {
			continue;
		}
		$url = esc_url( monarch_booking_status_action_url( $post_id, $target ) );
		if ( 'button' === $tag ) {
			$links[] = '<a href="' . $url . '" class="button" style="margin-right:8px;">' . esc_html( $label ) . '</a>';
		} else {
			$links[ $target ] = '<a href="' . $url . '">' . esc_html( $label ) . '</a>';
		}
	}
	return $links;
}

function monarch_handle_booking_status_change() {
	$post_id = isset( $_GET['post'] ) ? absint( $_GET['post'] ) : 0;
	$status  = isset( $_GET['status'] ) ? sanitize_key( $_GET['status'] ) : '';

	if ( ! $post_id || ! in_array( $status, array( 'pending', 'confirmed', 'rejected' ), true ) ) {
		wp_die( 'Некорректный запрос.' );
	}

	check_admin_referer( 'monarch_booking_status_' . $post_id );

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		wp_die( 'Недостаточно прав.' );
	}

	$post = get_post( $post_id );
	if ( ! $post || 'booking_request' !== $post->post_type ) {
		wp_die( 'Заявка не найдена.' );
	}

	update_post_meta( $post_id, 'booking_status', $status );

	$redirect = wp_get_referer();
	wp_safe_redirect( $redirect ? $redirect : admin_url( 'edit.php?post_type=booking_request' ) );
	exit;
}
add_action( 'admin_action_monarch_booking_status', 'monarch_handle_booking_status_change' );

function monarch_booking_row_actions( $actions, $post ) {
	if ( 'booking_request' !== $post->post_type ) {
		return $actions;
	}
	$status = monarch_booking_status( $post->ID );
	return monarch_booking_status_links( $post->ID, $status ) + $actions;
}
add_filter( 'post_row_actions', 'monarch_booking_row_actions', 10, 2 );

function monarch_booking_status_filter( $post_type ) {
	if ( 'booking_request' !== $post_type ) {
		return;
	}
	$current = isset( $_GET['booking_status'] ) ? sanitize_key( $_GET['booking_status'] ) : '';
	$options = array(
		''          => 'Все статусы',
		'pending'   => 'На рассмотрении',
		'confirmed' => 'Подтверждено',
		'rejected'  => 'Отклонено',
	);
	echo '<select name="booking_status">';
	foreach ( $options as $value => $label ) {
		echo '<option value="' . esc_attr( $value ) . '" ' . selected( $current, $value, false ) . '>' . esc_html( $label ) . '</option>';
	}
	echo '</select>';
}
add_action( 'restrict_manage_posts', 'monarch_booking_status_filter' );

function monarch_booking_status_filter_query( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() || 'booking_request' !== $query->get( 'post_type' ) || empty( $_GET['booking_status'] ) ) {
		return;
	}
	$query->set( 'meta_key', 'booking_status' );
	$query->set( 'meta_value', sanitize_key( $_GET['booking_status'] ) );
}
add_action( 'pre_get_posts', 'monarch_booking_status_filter_query' );

function monarch_booking_columns( $columns ) {
	return array(
		'cb'     => $columns['cb'],
		'title'  => 'Заявка',
		'status' => 'Статус',
		'guest'  => 'Гость',
		'phone'  => 'Телефон',
		'room'   => 'Номер',
		'dates'  => 'Даты',
		'email'  => 'Email',
		'date'   => 'Получена',
	);
}
add_filter( 'manage_booking_request_posts_columns', 'monarch_booking_columns' );

function monarch_booking_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'status':
			echo monarch_booking_status_badge( monarch_booking_status( $post_id ) );
			break;
		case 'guest':
			echo esc_html( get_post_meta( $post_id, 'guest_name', true ) );
			break;
		case 'phone':
			$phone = get_post_meta( $post_id, 'guest_phone', true );
			if ( $phone ) {
				echo '<a href="tel:' . esc_attr( preg_replace( '/[^\d+]/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a>';
			} else {
				echo '—';
			}
			break;
		case 'room':
			echo esc_html( get_post_meta( $post_id, 'room_type', true ) );
			break;
		case 'dates':
			$in  = get_post_meta( $post_id, 'check_in', true );
			$out = get_post_meta( $post_id, 'check_out', true );
			echo esc_html( monarch_format_date( $in ) . ' — ' . monarch_format_date( $out ) );
			break;
		case 'email':
			$email = get_post_meta( $post_id, 'guest_email', true );
			echo $email ? '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>' : '—';
			break;
	}
}
add_action( 'manage_booking_request_posts_custom_column', 'monarch_booking_column_content', 10, 2 );

function monarch_booking_meta_box() {
	add_meta_box( 'monarch_booking_details', 'Детали заявки', 'monarch_booking_meta_box_html', 'booking_request', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'monarch_booking_meta_box' );

function monarch_booking_meta_box_html( $post ) {
	$status = monarch_booking_status( $post->ID );
	echo '<p><strong>Статус:</strong> ' . monarch_booking_status_badge( $status ) . '</p>';
	echo '<p>' . implode( '', monarch_booking_status_links( $post->ID, $status, 'button' ) ) . '</p>';
	echo '<hr>';

	$fields = array(
		'guest_name'   => 'Имя',
		'guest_phone'  => 'Телефон',
		'guest_email'  => 'Email',
		'room_type'    => 'Тип номера',
		'check_in'     => 'Заезд',
		'check_out'    => 'Выезд',
		'guests_count' => 'Количество гостей',
		'comment'      => 'Комментарий',
	);
	echo '<table class="form-table"><tbody>';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		if ( in_array( $key, array( 'check_in', 'check_out' ), true ) ) {
			$value = monarch_format_date( $value );
		}
		echo '<tr><th style="width:180px;text-align:left;">' . esc_html( $label ) . '</th><td>' . esc_html( $value ? $value : '—' ) . '</td></tr>';
	}
	echo '</tbody></table>';
}

function monarch_booking_submit() {
	if ( ! check_ajax_referer( 'monarch_booking_nonce', 'nonce', false ) ) {
		wp_send_json_error( array( 'message' => 'Сессия устарела. Обновите страницу и попробуйте снова.' ) );
	}

	// Honeypot: real visitors never fill this hidden field.
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_success( array( 'message' => 'Спасибо! Заявка отправлена, мы свяжемся с вами в ближайшее время.' ) );
	}

	$name       = isset( $_POST['guest_name'] ) ? sanitize_text_field( wp_unslash( $_POST['guest_name'] ) ) : '';
	$phone      = isset( $_POST['guest_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['guest_phone'] ) ) : '';
	$email      = isset( $_POST['guest_email'] ) ? sanitize_email( wp_unslash( $_POST['guest_email'] ) ) : '';
	$room       = isset( $_POST['room_type'] ) ? sanitize_text_field( wp_unslash( $_POST['room_type'] ) ) : '';
	$check_in   = isset( $_POST['check_in'] ) ? sanitize_text_field( wp_unslash( $_POST['check_in'] ) ) : '';
	$check_out  = isset( $_POST['check_out'] ) ? sanitize_text_field( wp_unslash( $_POST['check_out'] ) ) : '';
	$guests     = isset( $_POST['guests_count'] ) ? absint( $_POST['guests_count'] ) : 0;
	$comment    = isset( $_POST['comment'] ) ? sanitize_textarea_field( wp_unslash( $_POST['comment'] ) ) : '';

	$allowed_rooms = array( 'Уютный Стандарт', 'Комфорт', 'Люкс' );
	$errors        = array();

	if ( '' === $name ) {
		$errors[] = 'Укажите имя.';
	}
	if ( '' === $phone ) {
		$errors[] = 'Укажите телефон.';
	}
	if ( ! in_array( $room, $allowed_rooms, true ) ) {
		$errors[] = 'Выберите тип номера.';
	}

	$in_date  = DateTime::createFromFormat( 'Y-m-d', $check_in );
	$out_date = DateTime::createFromFormat( 'Y-m-d', $check_out );
	if ( ! $in_date || ! $out_date ) {
		$errors[] = 'Укажите корректные даты заезда и выезда.';
	} elseif ( $out_date <= $in_date ) {
		$errors[] = 'Дата выезда должна быть позже даты заезда.';
	}

	if ( $email && ! is_email( $email ) ) {
		$errors[] = 'Некорректный email.';
	}

	if ( $errors ) {
		wp_send_json_error( array( 'message' => implode( ' ', $errors ) ) );
	}

	$post_id = wp_insert_post( array(
		'post_type'   => 'booking_request',
		'post_title'  => sprintf( '%s — %s — %s', $name, $room, monarch_format_date( $check_in ) ),
		'post_status' => 'publish',
	), true );

	if ( is_wp_error( $post_id ) ) {
		wp_send_json_error( array( 'message' => 'Не удалось сохранить заявку, попробуйте ещё раз.' ) );
	}

	update_post_meta( $post_id, 'booking_status', 'pending' );
	update_post_meta( $post_id, 'guest_name', $name );
	update_post_meta( $post_id, 'guest_phone', $phone );
	update_post_meta( $post_id, 'guest_email', $email );
	update_post_meta( $post_id, 'room_type', $room );
	update_post_meta( $post_id, 'check_in', $check_in );
	update_post_meta( $post_id, 'check_out', $check_out );
	update_post_meta( $post_id, 'guests_count', $guests );
	update_post_meta( $post_id, 'comment', $comment );

	$admin_email = get_option( 'admin_email' );
	$subject     = 'Новая заявка на бронирование — ' . get_bloginfo( 'name' );
	$body        = "Новая заявка на бронирование:\n\n"
		. "Имя: $name\n"
		. "Телефон: $phone\n"
		. ( $email ? "Email: $email\n" : '' )
		. "Номер: $room\n"
		. "Заезд: $check_in\n"
		. "Выезд: $check_out\n"
		. ( $guests ? "Гостей: $guests\n" : '' )
		. ( $comment ? "Комментарий: $comment\n" : '' );
	wp_mail( $admin_email, $subject, $body );

	if ( $email ) {
		wp_mail(
			$email,
			'Ваша заявка принята — ' . get_bloginfo( 'name' ),
			"Здравствуйте, $name!\n\nМы получили вашу заявку на бронирование номера «$room» с $check_in по $check_out. Мы свяжемся с вами по телефону $phone для подтверждения.\n\nС уважением,\n" . get_bloginfo( 'name' )
		);
	}

	wp_send_json_success( array( 'message' => 'Спасибо! Заявка отправлена, мы свяжемся с вами в ближайшее время.' ) );
}
add_action( 'wp_ajax_monarch_booking_submit', 'monarch_booking_submit' );
add_action( 'wp_ajax_nopriv_monarch_booking_submit', 'monarch_booking_submit' );
