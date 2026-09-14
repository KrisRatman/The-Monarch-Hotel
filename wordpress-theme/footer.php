<!-- FOOTER -->
<footer id="contacts" class="bg-charcoal px-5 py-14 text-cream-light lg:px-8">
  <div class="mx-auto flex max-w-6xl flex-col gap-12 md:flex-row md:justify-between">

    <div class="flex items-center gap-4">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-crest-footer.png' ); ?>" alt="The Monarch Hotel" class="h-20 w-20 shrink-0 sm:h-24 sm:w-24">
      <p class="font-serif text-lg font-bold tracking-wide text-cream-light whitespace-nowrap sm:text-2xl lg:text-3xl">THE MONARCH</p>
    </div>

    <div class="grid grid-cols-2 gap-10 sm:gap-16">
      <div>
        <h4 class="text-sm font-bold tracking-wide text-cream-light">О КОМПАНИИ</h4>
        <ul class="mt-4 space-y-2.5 text-sm text-cream-light/70">
          <li><a href="#about" class="hover:text-gold">Об отеле</a></li>
          <li><a href="#rooms" class="hover:text-gold">Номера</a></li>
          <li><a href="#" class="hover:text-gold">Политика конфиденциальности</a></li>
          <li><a href="#" class="hover:text-gold">Согласие на обработку персональных данных</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-sm font-bold tracking-wide text-cream-light">КОНТАКТЫ</h4>
        <ul class="mt-4 space-y-2.5 text-sm text-cream-light/70">
          <li><a href="tel:+79999990000" class="hover:text-gold">+7 (999) 999-00-00</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="mx-auto mt-12 max-w-6xl border-t border-cream-light/10 pt-6 text-center text-xs text-cream-light/40">
    &copy; <?php echo esc_html( date( 'Y' ) ); ?> THE MONARCH HOTEL. Все права защищены.
  </div>
</footer>

<button id="back-to-top" aria-label="Наверх" class="fixed bottom-6 right-5 z-40 flex h-12 w-12 translate-y-4 items-center justify-center rounded-full bg-orange text-cream-light opacity-0 shadow-lg pointer-events-none transition-all duration-300 hover:bg-orange-dark sm:bottom-8 sm:right-8 sm:h-14 sm:w-14">
  <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
  </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
