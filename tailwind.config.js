import defaultTheme from 'tailwindcss/defaultTheme';
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flyonui/dist/js/*.js',
        './node_modules/flatpickr/**/*.js', 
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],

            },
            colors: {
                'rasya' : '#f7eedd',
                'biru' : '#008DDA',
                'toska':'#41C9E2',
               },
        },
    },

    flyonui: {
        vendors: true // Enable vendor-specific CSS generation
      },

    
    plugins: [
        require('flyonui'), 
        require('flyonui/plugin'),
        [forms],

    ],
};
 


