<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-cream-light text-charcoal antialiased' ); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header class="sticky top-0 z-50 bg-cream-light/95 backdrop-blur border-b border-charcoal/10">
  <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-3 lg:px-8">
    <a href="#top" class="flex items-center gap-2 shrink-0">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-icon.png' ); ?>" alt="The Monarch Hotel" class="h-9 w-9">
      <span class="font-serif text-lg font-semibold tracking-wide text-charcoal sm:text-xl">THE MONARCH</span>
    </a>

    <nav class="hidden items-center gap-8 text-sm font-semibold tracking-wide text-charcoal lg:flex">
      <a href="#about" class="hover:text-orange">ОБ ОТЕЛЕ</a>
      <a href="#rooms" class="hover:text-orange">НОМЕРА</a>
      <a href="#gallery" class="hover:text-orange">ГАЛЕРЕЯ</a>
      <a href="#booking" class="hover:text-orange">БРОНИРОВАНИЕ</a>
      <a href="#contacts" class="hover:text-orange">КОНТАКТЫ</a>
    </nav>

    <div class="hidden items-center gap-5 lg:flex">
      <a href="tel:+79999990000" class="text-sm font-bold text-charcoal">+7 (999) 999-00-00</a>
      <a href="tel:+79999990000" class="btn-solid !px-6 !py-2.5">Позвонить</a>
    </div>

    <button id="menu-toggle" class="flex items-center justify-center rounded-md p-2 text-charcoal lg:hidden" aria-label="Открыть меню" aria-expanded="false">
      <svg id="icon-burger" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
      <svg id="icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
  </div>

  <div id="mobile-menu" class="hidden border-t border-charcoal/10 lg:hidden">
    <nav class="flex flex-col gap-1 px-5 py-4 text-sm font-semibold text-charcoal">
      <a href="#about" class="rounded-md px-2 py-2 hover:bg-cream">ОБ ОТЕЛЕ</a>
      <a href="#rooms" class="rounded-md px-2 py-2 hover:bg-cream">НОМЕРА</a>
      <a href="#gallery" class="rounded-md px-2 py-2 hover:bg-cream">ГАЛЕРЕЯ</a>
      <a href="#booking" class="rounded-md px-2 py-2 hover:bg-cream">БРОНИРОВАНИЕ</a>
      <a href="#contacts" class="rounded-md px-2 py-2 hover:bg-cream">КОНТАКТЫ</a>
      <div class="mt-3 flex flex-col gap-3 border-t border-charcoal/10 pt-4">
        <a href="tel:+79999990000" class="text-center text-sm font-bold text-charcoal">+7 (999) 999-00-00</a>
        <a href="tel:+79999990000" class="btn-solid">Позвонить</a>
      </div>
    </nav>
  </div>
</header>
