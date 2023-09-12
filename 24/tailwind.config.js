/** @type {import('tailwindcss').Config} */
import plugin from "tailwindcss/plugin";
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("daisyui"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/forms"),
        plugin(function ({ addVariant, addComponents }) {
            addComponents({
                ".button": { padding: "0.5rem 1rem" },
            });

            addVariant("optional", "&:optional");

            addVariant("hocus", ["&:hover", "&:focus"]);
            addVariant("dirChildren", ["& > *"]);
            addVariant("group-open", [":merge(.group).open &"]);
            addVariant("peer-open",  [":merge(.peer).open &"]);
        }),
    ],
    daisyui: {
        themes: false, // true: all themes | false: only light + dark | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "dark", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
        prefix: "da-", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    },
};
