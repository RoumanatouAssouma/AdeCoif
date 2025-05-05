/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
      container: {
        center: true,
        padding: '0rem',
        screens: {
          sm: '640px',
          md: '768px',
          lg: '1024px',    // tu peux en ajouter autant que nécessaire
          xl: '1280px',
          '2xl': '1536px',
        },
      },
      extend: {},
    },
    plugins: [],
  }
