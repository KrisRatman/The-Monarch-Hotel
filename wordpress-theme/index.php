<?php get_header(); ?>

<!-- HERO -->
<section id="top" class="relative isolate overflow-hidden">
  <div class="absolute inset-0 -z-10">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.png' ); ?>" alt="" class="h-full w-full object-cover">
    <div class="absolute inset-0 bg-navy/70"></div>
  </div>

  <div class="mx-auto flex min-h-[560px] max-w-7xl flex-col items-center justify-center px-5 py-20 text-center sm:min-h-[640px] sm:py-28">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-crest-hero.png' ); ?>" alt="The Monarch Hotel" class="mb-6 h-40 w-40 sm:h-48 sm:w-48">
    <p class="max-w-xl text-xs font-semibold tracking-[0.25em] text-cream-light/90 sm:text-sm">
      ОТЕЛЬ ГДЕ КОМФОРТ ВСТРЕЧАЕТ СТИЛЬ
    </p>
    <a href="tel:+79999990000" class="btn-solid mt-8">Позвонить</a>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="bg-cream-light px-5 pb-20 pt-10 lg:px-8">
  <div class="mx-auto -mt-24 max-w-5xl rounded-3xl bg-cream p-6 shadow-xl sm:-mt-28 sm:p-10 lg:-mt-32">
    <h2 class="text-center font-serif text-2xl font-bold tracking-wide text-charcoal sm:text-3xl">ОБ ОТЕЛЕ</h2>

    <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2">
      <div class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm sm:items-start sm:text-left">
        <h3 class="font-bold text-charcoal">Стильные номера:</h3>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-rooms.png' ); ?>" alt="" class="my-5 h-16 w-16">
        <p class="text-sm text-charcoal/70">
          Современный интерьер в спокойных тонах, ортопедические кровати King-size и блэкаут-шторы для идеального отдыха.
        </p>
      </div>

      <div class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm sm:items-start sm:text-left">
        <h3 class="font-bold text-charcoal">Идеально для работы:</h3>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-work.png' ); ?>" alt="" class="my-5 h-16 w-16">
        <p class="text-sm text-charcoal/70">
          Высокоскоростной Wi-Fi, розетки у каждого спального и рабочего места, тихие зоны для звонков и лобби.
        </p>
      </div>

      <div class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm sm:items-start sm:text-left">
        <h3 class="font-bold text-charcoal">Сервис 24/7:</h3>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-service.png' ); ?>" alt="" class="my-5 h-16 w-16">
        <p class="text-sm text-charcoal/70">
          Круглосуточный заезд, подземная парковка, камера хранения багажа и консьерж-служба.
        </p>
      </div>

      <div class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm sm:items-start sm:text-left">
        <h3 class="font-bold text-charcoal">Вкусные завтраки:</h3>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-breakfast.png' ); ?>" alt="" class="my-5 h-16 w-16">
        <p class="text-sm text-charcoal/70">
          Каждое утро сервируем свежий завтрак: горячие блюда, легкие закуски, свежая выпечка и бодрящий зерновой кофе.
        </p>
      </div>
    </div>
  </div>

  <div class="mx-auto mt-16 max-w-2xl text-center">
    <h2 class="font-serif text-2xl font-bold tracking-wide text-charcoal sm:text-3xl">НОМЕРА И ЦЕНЫ</h2>
    <p class="mt-4 text-sm text-charcoal/70 sm:text-base">
      Современный дизайн, идеальная эргономика и все необходимое для полноценного отдыха. Завтрак уже включен в стоимость проживания.
    </p>
  </div>
</section>

<!-- ROOMS -->
<section id="rooms" class="bg-brown px-5 py-16 lg:px-8">
  <div class="mx-auto flex max-w-5xl flex-col gap-12">

    <!-- Standard -->
    <div class="flex flex-col gap-6 md:flex-row md:items-stretch">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/room-standard.png' ); ?>" alt="Уютный Стандарт" class="h-64 w-full rounded-2xl object-cover shadow-lg md:h-auto md:w-3/5">
      <div class="flex w-full flex-col justify-between rounded-2xl bg-cream p-6 shadow-lg md:w-2/5 sm:p-8">
        <div>
          <h3 class="font-serif text-xl font-bold text-charcoal sm:text-2xl">Уютный Стандарт</h3>
          <p class="mt-3 text-sm text-charcoal/70">1 двухспальная или 2 односпальные</p>
          <p class="text-sm text-charcoal/70">1-2 человека</p>
          <p class="text-sm text-charcoal/70">18кв.м</p>
          <ul class="mt-4 space-y-1.5 text-sm font-medium text-charcoal">
            <li>&bull; Wi-Fi</li>
            <li>&bull; Кондиционер</li>
            <li>&bull; Smart TV</li>
            <li>&bull; Фен</li>
            <li>&bull; Завтрак &laquo;шведский стол&raquo;</li>
          </ul>
        </div>
        <div class="mt-6">
          <p class="font-serif text-lg font-bold text-charcoal">от 4500/сутки</p>
          <a href="#booking" data-room="Уютный Стандарт" class="btn-outline mt-4 w-full">Забронировать</a>
        </div>
      </div>
    </div>

    <!-- Comfort -->
    <div class="flex flex-col gap-6 md:flex-row md:items-stretch">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/room-comfort.png' ); ?>" alt="Комфорт" class="h-64 w-full rounded-2xl object-cover shadow-lg md:h-auto md:w-3/5">
      <div class="flex w-full flex-col justify-between rounded-2xl bg-cream p-6 shadow-lg md:w-2/5 sm:p-8">
        <div>
          <h3 class="font-serif text-xl font-bold text-charcoal sm:text-2xl">Комфорт</h3>
          <p class="mt-3 text-sm text-charcoal/70">1 двухспальная/ возможность разместить дополнительное спальное место</p>
          <p class="text-sm text-charcoal/70">1-2 человека</p>
          <p class="text-sm text-charcoal/70">16кв.м</p>
          <ul class="mt-4 space-y-1.5 text-sm font-medium text-charcoal">
            <li>&bull; Wi-Fi</li>
            <li>&bull; Кондиционер</li>
            <li>&bull; Smart TV</li>
            <li>&bull; Сейф</li>
            <li>&bull; Чайная станция</li>
            <li>&bull; Фен</li>
            <li>&bull; Завтрак &laquo;шведский стол&raquo;</li>
          </ul>
        </div>
        <div class="mt-6">
          <p class="font-serif text-lg font-bold text-charcoal">от 5500/сутки</p>
          <a href="#booking" data-room="Комфорт" class="btn-outline mt-4 w-full">Забронировать</a>
        </div>
      </div>
    </div>

    <!-- Lux -->
    <div class="flex flex-col gap-6 md:flex-row md:items-stretch">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/room-lux.png' ); ?>" alt="Люкс" class="h-64 w-full rounded-2xl object-cover shadow-lg md:h-auto md:w-3/5">
      <div class="flex w-full flex-col justify-between rounded-2xl bg-cream p-6 shadow-lg md:w-2/5 sm:p-8">
        <div>
          <h3 class="font-serif text-xl font-bold text-charcoal sm:text-2xl">Люкс</h3>
          <p class="mt-3 text-sm text-charcoal/70">1 двухспальная/ возможность разместить дополнительное спальное место</p>
          <p class="text-sm text-charcoal/70">1-2 человека</p>
          <p class="text-sm text-charcoal/70">16кв.м</p>
          <ul class="mt-4 space-y-1.5 text-sm font-medium text-charcoal">
            <li>&bull; Wi-Fi</li>
            <li>&bull; Кондиционер</li>
            <li>&bull; Smart TV</li>
            <li>&bull; Сейф</li>
            <li>&bull; Чайная станция</li>
            <li>&bull; Фен</li>
            <li>&bull; Завтрак &laquo;шведский стол&raquo;</li>
            <li>&bull; Рабочее место</li>
            <li>&bull; Ванная комната оборудована душевой кабиной</li>
          </ul>
        </div>
        <div class="mt-6">
          <p class="font-serif text-lg font-bold text-charcoal">от 6500/сутки</p>
          <a href="#booking" data-room="Люкс" class="btn-outline mt-4 w-full">Забронировать</a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- BOOKING -->
<section id="booking" class="bg-cream-light px-5 py-16 lg:px-8">
  <div class="mx-auto max-w-2xl">
    <h2 class="text-center font-serif text-2xl font-bold tracking-wide text-charcoal sm:text-3xl">ЗАБРОНИРОВАТЬ НОМЕР</h2>
    <p class="mt-4 text-center text-sm text-charcoal/70 sm:text-base">
      Оставьте заявку — мы свяжемся с вами для подтверждения бронирования.
    </p>

    <form id="booking-form" class="mt-8 flex flex-col gap-4 rounded-2xl bg-cream p-6 shadow-lg sm:p-8" novalidate>
      <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
        <label for="booking-website">Website</label>
        <input type="text" id="booking-website" name="website" tabindex="-1" autocomplete="off">
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label for="booking-name" class="block text-sm font-semibold text-charcoal">Имя *</label>
          <input type="text" id="booking-name" name="guest_name" required class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
        </div>
        <div>
          <label for="booking-phone" class="block text-sm font-semibold text-charcoal">Телефон *</label>
          <input type="tel" id="booking-phone" name="guest_phone" required class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
        </div>
      </div>

      <div>
        <label for="booking-email" class="block text-sm font-semibold text-charcoal">Email</label>
        <input type="email" id="booking-email" name="guest_email" class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
      </div>

      <div>
        <label for="booking-room" class="block text-sm font-semibold text-charcoal">Тип номера *</label>
        <select id="booking-room" name="room_type" required class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
          <option value="">Выберите номер</option>
          <option value="Уютный Стандарт">Уютный Стандарт — от 4500/сутки</option>
          <option value="Комфорт">Комфорт — от 5500/сутки</option>
          <option value="Люкс">Люкс — от 6500/сутки</option>
        </select>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label for="booking-checkin" class="block text-sm font-semibold text-charcoal">Заезд *</label>
          <input type="date" id="booking-checkin" name="check_in" required class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
        </div>
        <div>
          <label for="booking-checkout" class="block text-sm font-semibold text-charcoal">Выезд *</label>
          <input type="date" id="booking-checkout" name="check_out" required class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
        </div>
      </div>

      <div>
        <label for="booking-guests" class="block text-sm font-semibold text-charcoal">Количество гостей</label>
        <input type="number" id="booking-guests" name="guests_count" min="1" max="10" class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none">
      </div>

      <div>
        <label for="booking-comment" class="block text-sm font-semibold text-charcoal">Комментарий</label>
        <textarea id="booking-comment" name="comment" rows="3" class="mt-1.5 w-full rounded-lg border border-charcoal/20 bg-white px-4 py-2.5 text-sm text-charcoal focus:border-orange focus:outline-none"></textarea>
      </div>

      <p id="booking-feedback" class="hidden text-sm font-medium" role="status"></p>

      <button type="submit" class="btn-solid mt-2 w-full">Отправить заявку</button>
    </form>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="bg-cream-light px-5 py-16 lg:px-8">
  <h2 class="text-center font-serif text-2xl font-bold tracking-wide text-charcoal sm:text-3xl">ФОТОГАЛЕРЕЯ</h2>

  <div class="mx-auto mt-10 grid max-w-5xl grid-cols-2 gap-3 sm:gap-4 md:grid-cols-3">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-1.png' ); ?>" alt="Стойка регистрации" class="col-span-2 h-56 w-full rounded-xl object-cover shadow-sm sm:h-72 md:col-span-2 md:h-64">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-2.png' ); ?>" alt="Вход в отель" class="col-span-2 h-56 w-full rounded-xl object-cover shadow-sm sm:h-72 md:col-span-1 md:h-64">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-3.png' ); ?>" alt="Здание отеля" class="h-40 w-full rounded-xl object-cover shadow-sm sm:h-48">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-4.png' ); ?>" alt="Завтрак" class="h-40 w-full rounded-xl object-cover shadow-sm sm:h-48">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-5.png' ); ?>" alt="Лаунж-зона" class="h-40 w-full rounded-xl object-cover shadow-sm sm:h-48">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gallery-6.png' ); ?>" alt="Кондитерская" class="h-40 w-full rounded-xl object-cover shadow-sm sm:h-48 hidden md:block">
  </div>
</section>

<?php get_footer(); ?>
