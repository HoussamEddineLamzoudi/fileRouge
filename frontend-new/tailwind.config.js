/* eslint-disable no-undef */
const path = require("path");

module.exports = {
  content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        p_ry: "#0C5085",
        s_ry: "#268ECE",
        third: "#9AC9E7",
        transparent: "transparent",
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
