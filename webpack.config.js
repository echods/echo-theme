let webpack = require('webpack');
let path = require('path');
let glob = require('glob');
let PurifyCSSPlugin = require('purifycss-webpack');
let { CleanWebpackPlugin } = require('clean-webpack-plugin');
var inProduction = (process.env.NODE_ENV === 'production');
let MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        app: [
            './resources/assets/js/main.js',
            './resources/assets/sass/app.scss',
        ]
    },
    output: {
        path: path.resolve(__dirname, './assets'),
        filename: 'js/[name].[chunkhash].js',
        publicPath: './../'
    },
    devtool: 'source-map',
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.s[ac]ss$/,
            use: [
                {
                    loader: MiniCssExtractPlugin.loader,
                    options: {
                        // you can specify a publicPath here
                        // by default it uses publicPath in webpackOptions.output
                        publicPath: '../',
                        hmr: process.env.NODE_ENV === 'development',
                    },
                },
                { loader: 'css-loader', options: { sourceMap: true, importLoaders: 1 } },
                { loader: 'sass-loader', options: { sourceMap: true } },
            ]
        },
        {
          test: /\.(png|je?pg|gif)$/,
          use: [
            'file-loader',
            {
              loader: 'image-webpack-loader',
              options: {
                bypassOnDebug: true,
                disable: true,
              },
            }
          ]
        },
        {
            test: /\.(eot|ttf|woff|woff2|svg)$/,
            loader: 'file-loader',
            options: {
                name: 'fonts/[name].[ext]'
            }
        }]
    },

    plugins: [

        new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // all options are optional
            filename: 'css/[name].[chunkhash].css',
            ignoreOrder: false, // Enable to remove warnings about conflicting order
        }),

        new webpack.LoaderOptionsPlugin({
            minimize: inProduction
        }),

        new PurifyCSSPlugin({
            // Give paths to parse for rules. These should be absolute!
            paths: glob.sync(path.join(__dirname, '**/*.php')),
            // minimize: inProduction
        }),

        new CleanWebpackPlugin({
            verbose: true,
        }),

        function() {
            this.plugin('done', stats => {
                require('fs').writeFileSync(
                    path.join(__dirname, 'assets/manifest.json'),
            JSON.stringify(stats.toJson().assetsByChunkName)
                )
            })
        }
    ]

}

/* Run for production only */
if (inProduction) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}
