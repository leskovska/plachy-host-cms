/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
      backgroundImage: {
          'main': "url('../../public/images/background.jpg')",
      },
  },
  plugins: [],
}

