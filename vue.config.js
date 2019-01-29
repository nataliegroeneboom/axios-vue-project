module.exports = {
    devServer: {
        proxy: {
            "/backend": {
                target: 'http://axios-project.ddev.local/',
                changeOrigin: true,
                secure: false,
                pathRewrite: {
                    "/backend" : '/api/'
                }
            }
        }
    }
}