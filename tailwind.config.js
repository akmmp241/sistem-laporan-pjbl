import defaultTheme from "tailwindcss/defaultTheme.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                'jakarta' : ['Plus Jakarta Sans', 'sans']
            },
            blur: {
                'main' : '2px'
            },
            colors: {
                'primary' : '#4260EB'
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
