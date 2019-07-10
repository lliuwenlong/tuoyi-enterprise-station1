module.exports = {
    root: true,
    env: {
        node: true
    },
    'extends': [
        'plugin:vue/essential',
        '@vue/standard'
    ],
    rules: {
        'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        'indent': [2, 4],
        'semi': [2, 'always'],
        'object-curly-spacing': ['error', 'never']
    },
    parserOptions: {
        parser: 'babel-eslint'
    }
};