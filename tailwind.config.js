/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                geologica: ["Geologica", "sans-serif"],
                lato: ["Lato", "sans-serif"],
                playfair: ["Playfair Display", "serif"],
            },

            backgroundImage: {
                "hero-slide-1":
                    "linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../../public/images/bg-slider-1.webp')",
                "hero-slide-2": "url('../../public/images/bg-slider-2.webp')",
                "hero-slide-3":
                    "linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),url('../../public/images/bg-slider-3.webp')",
            },

            fontSize: {
                xxs: ".5rem",
            },
        },
    },
    plugins: [],
};
