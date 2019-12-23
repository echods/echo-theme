const webpack = require('webpack');
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const inProduction = (process.env.NODE_ENV === 'production');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    mode: (process.env.NODE_ENV && process.env.NODE_ENV.trim() === 'production') ? 'production' : 'development',
    entry: {
        app: [
            './resources/assets/js/app.js',
            './resources/assets/sass/app.scss',
        ]
    },
    output: {
        path: path.resolve(__dirname, './assets'),
        filename: 'js/[name].[chunkhash].js',
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
                { loader: MiniCssExtractPlugin.loader},
                { loader: 'css-loader' },
                { loader: 'sass-loader'}
            ]
        },
        {
          test: /\.(gif|png|jpe?g|svg)$/i,
            use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[name].[ext]',
                    outputPath: 'img',
                    publicPath: '../img',
                }
            },
            ],
        },
        {
            test: /\.(eot|ttf|woff|woff2|svg)$/,
            loader: 'file-loader',
            options: {
                name: '[name].[ext]',
                outputPath: 'fonts',
                publicPath: '../fonts',
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

        new CleanWebpackPlugin({
            verbose: true,
        }),

        new CopyPlugin([ { from: './resources/assets/img', to: './img' } ]),
        
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
    console.log("done")
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}
