/** @type {import('tailwindcss').Config} */
import  plugin  from "tailwindcss/plugin";
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            animation: {
                'appear': '600ms 1 linear both appear ',
            },
            keyframes: {
                "appear":{

                    '0%':{
                        opacity: 0,
                    },
                    '100%':{
                        opacity: 1
                    }
                }

            }
        },
    },
    plugins: [
        plugin(function ({ addVariant, addComponents }) {
                    addComponents({
                        ".button": { padding: "0.5rem 1rem" },
                    });

                    addVariant("optional", "&:optional");

                    addVariant("hocus", ["&:hover", "&:focus"]);
                    addVariant("dirChildren", ["& > *"]);
                }),
    ],
};
