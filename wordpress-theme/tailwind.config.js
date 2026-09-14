/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./assets/*.js"],
  theme: {
    extend: {
      colors: {
        cream: "#EAE6DF",
        "cream-light": "#F5F2ED",
        brown: {
          DEFAULT: "#795C4D",
          dark: "#5F4A3E",
        },
        charcoal: "#332A25",
        gold: "#C9A24B",
        navy: "#1B2A4A",
        orange: {
          DEFAULT: "#E06900",
          dark: "#C25C00",
        },
      },
      fontFamily: {
        serif: ["'Playfair Display'", "Georgia", "serif"],
        sans: ["'Manrope'", "Arial", "sans-serif"],
      },
    },
  },
  plugins: [],
};
