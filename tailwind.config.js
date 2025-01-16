import defaultTheme from 'tailwindcss/defaultTheme';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                oswald: ["Oswald", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", ...defaultTheme.fontFamily.serif],
                bitter: ["Bitter", ...defaultTheme.fontFamily.serif],
                poppin: ["Poppins", ...defaultTheme.fontFamily.sans]
            },
            colors: {
                alabaster: "#f4f2ed ",
                warm_yellow: "rgb(226,193,56)",
                royal_blue: "#10195b",
                sunflower_yellow: "#fdcc00",
                pale_beige: "#ede5d0",
                pale_yellow: "#ece0b2",
                light_beige: "#f0ede6",
                warm_gray: "rgb(237, 233, 225)",
                dim_gray: "#323232",
                charcoal_gray: "#444443",
                cyan_blue: "#0b293b",
            },
            keyframes: {
                navAppear: {
                    '0%': { visibility: "hidden", opacity: "0" },
                    '100%': { visibility: "visible", opacity: "1" },
                },
                navDisappear: {
                    '0%': { visibility: "visible", opacity: "1" },
                    '100%': { visibility: "hidden", opacity: "0" },
                },
            },
            animation: {
                navAppear: "navAppear .25s ease-in-out forwards",
                navDisappear: "navDisappear .25s ease-in-out forwards",
            }
        },
    },
    plugins: [],
};
