import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./app/**/*.php",
        './resources/**/*.blade.php',
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.php",
        './storage/framework/views/*.php',
        "./vendor/filament/*.blade.php",
        './vendor/filament/**/*.blade.php',
        "./vendor/filament/**/*.blade.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./vendor/suleymanozev/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                logo: '#2871c1',
                section_blue: '#163E69',
                section_brown: '#694A16'
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                raleway: ['Raleway', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
