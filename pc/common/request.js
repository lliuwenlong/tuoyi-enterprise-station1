import axios from 'axios'
import qs from 'qs'
import app from '../src/main.js'
// import {
// 	Message
// } from 'element-ui';

let loading;

/** **** 创建axios实例 ******/

const service = axios.create({
    // baseURL: 'http://yey.lixianshi.top/Api',
    // baseURL: 'http://192.168.1.24:80/Api',
    // baseURL: 'http://192.168.2.6:8889/Api',
    baseURL: '/Api',
    timeout: 100000 // 请求超时时间
})


service.interceptors.request.use(config => {
    return config;
}, error => {
    return Promise.reject(error)
});


service.interceptors.response.use(response => {
    return response;
}, error => {
    return Promise.reject(error)
});
export default service;
