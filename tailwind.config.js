/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.foil.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  // enable dark mode via class strategy
  darkMode: 'class',

  plugins: [
  ],

  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
      },
    },
  },

  safelist: [
  ],

  variants: {
    extend: {
      backgroundColor: ['active'],
      textColor: ['active'],
    }
  },
}