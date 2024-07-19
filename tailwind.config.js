/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.foil.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  // enable dark mode via class strategy
  darkMode: 'class',

  plugins: [
    require('@tailwindcss/forms'),
  ],

  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
        figtree: ['Figtree', 'sans-serif']
      },
      transitionProperty: {
        'width': 'width'
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