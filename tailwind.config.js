import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        container: {
            center: true,
            padding: "1rem",
            screens: {
                sm: "100%", // biar full di layar kecil
                md: "100%",
                lg: "100%",
                xl: "1280px", // sama dengan max-w-7xl
                "2xl": "1280px", // jangan lebih lebar dari 7xl
            },
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
