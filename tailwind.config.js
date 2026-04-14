// Author: MEMORA solutions, https://memora.solutions ; info@memora.ca
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "Modules/Auth/resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    corePlugins: {
        preflight: true,
    },
    plugins: [],
}
