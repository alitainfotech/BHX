module.exports = {
    content: ["./resources/js/**/*.{vue,js}"],

  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('@headlessui/vue'),
      require('@vue-hero-icons/outline'),
  ],
}
