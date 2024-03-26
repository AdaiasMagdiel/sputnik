/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/templates/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Montserrat Alternates"', "sans-serif"],
      },
    },
  },
  plugins: [],
};
