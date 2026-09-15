# THE MONARCH HOTEL

Адаптивный лендинг отеля «THE MONARCH» — вёрстка по готовому UI-макету на HTML5 и Tailwind CSS. Полностью responsive (мобильные, планшеты, десктоп): hero-блок, преимущества, карточки номеров с ценами, фотогалерея, футер с контактами, мобильное меню и кнопка «наверх».

Responsive landing page for THE MONARCH hotel, built pixel-perfect from a UI mockup with HTML5 and Tailwind CSS. Fully adaptive (mobile, tablet, desktop): hero section, amenities, room cards with pricing, photo gallery, footer with contacts, mobile menu and a back-to-top button.

🔗 **[Живой сайт](https://krisratman.github.io/The-Monarch-Hotel/)** · 📄 **[Кейс с разбором проекта](https://krisratman.github.io/The-Monarch-Hotel/case-study/)**

Проект существует в двух версиях:

1. **Статичная вёрстка** (эта директория) — HTML5 + Tailwind CSS, без бэкенда.
2. **[WordPress-тема](wordpress-theme/)** — та же вёрстка, портированная в полноценную WP-тему с системой заявок на бронирование: кастомный тип записи, AJAX-форма с валидацией и защитой от спама, и admin-панель, где заявки проходят путь «На рассмотрении → Подтверждено/Отклонено».

Кейс выше — витрина, форма бронирования и реконструкция админ-панели (статусы заявок, meta box, быстрые действия) с разбором того, как это устроено под капотом.

## Стек / Stack

- HTML5
- Tailwind CSS (сборка через npm / built via npm)

## Запуск локально / Run locally

```bash
npm install
npm run build   # соберёт assets/style.css
```

Затем откройте `index.html` в браузере или поднимите любой статический сервер.

Then open `index.html` in a browser, or serve the folder with any static server.
