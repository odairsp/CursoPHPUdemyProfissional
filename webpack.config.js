const path = require("path");

module.exports = {
  mode: process.env.NODE_ENV,
  devtool: process.env.NODE_ENV == "development" ? "source-map" : "eval",
  entry: {
    app: ["./public/assets/js/app.js"],
  },
  output: {
    path: path.resolve(__dirname, "public"),
    filename: "[name].js",
  },

  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
};
