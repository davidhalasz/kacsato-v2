import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                georgia: ["Georgia", "serif"],
            },
            colors: {
                darkGreen: '#0C362F',
                greenText: '#006608',
                lightGreen: '#47645F',
                btnGreen: '#00AD0E',
            },
        },
    },

    plugins: [forms],
};
