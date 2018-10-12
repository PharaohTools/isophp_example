module.exports = {
    context: __dirname,
    entry: './prod_app_webpack.js',
    module: {
        rules: [
            {
                // PHPify transpiles your PHP code to JavaScript,
                // so Webpack can include it in your JS bundle for you
                // and it can be run in the browser.
                test: /\.php$/,
                use: 'transform-loader?phpify'
            },
            {
                // PHPify is (at the moment) a Browserify transform and not
                // a Webpack loader, so we need to extract the source map
                // it generates and apply it to Webpack's for it to work properly.
                test: /\.php/,
                use: 'source-map-loader',
                enforce: 'post'
            },
            {
                // This is the standard Babel setup to enable ES5 support
                test: /\.js$/,
                use: {
                    loader: 'babel-loader?presets=env'
                },
                exclude: [
                    /\bnode_modules\b/,
                    /\bvendor\b/
                ]
            },
            {
                // This is the standard Babel setup to enable ES5 support
                test: /\.css$/,
                use: {
                    loader: 'raw'
                }
            }
        ]
    },
    node: {
        fs: 'empty'
    },
    output: {
        path: __dirname + '/uniter_bundle/',
        filename: 'prod_bundle.js'
    }
};