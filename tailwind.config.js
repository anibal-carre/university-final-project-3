/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,php}"],
  theme: {
    extend: {
      colors: {
        light: "#fbf4d4",
        dark: "#353a40",
        lightgray: "#f5f6fa",
        myblue: "#6ea9d7",
      },
      margin: {
        13: "52px",
      },
      translate: {
        500: "-100%",
      },
      width: {
        200: "600px",
      },
      maxHeight: {
        800: "800px",
      },
    },
  },
  plugins: [],
};
