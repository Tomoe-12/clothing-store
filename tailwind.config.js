/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors : {
        primary : '#2563EB',
        secondary : '#4A25EB',
        third : '#25C6EB',
      },
      border : {
        primary : '#2563EB',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('flowbite/plugin')({
      datatables: true,
  }),
  ],
}

