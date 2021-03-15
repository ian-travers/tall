module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'nfsu-brand': '#003548'
        },
        backgroundImage: theme => ({
            'nfsu-map': "url('/storage/map-d50.png');",
        })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}
