/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        fontFamily: {
            montserrat: ["Montserrat", "Arial", "sans-serif"],
        },
        extend: {
            colors: {
                primary: "#3b82f6",
            },
        },
    },
    plugins: [],
};
