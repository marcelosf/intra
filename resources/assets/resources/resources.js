import axios from 'axios';

export const HTTP = axios.create({

    baseURL: 'http://192.168.10.10:8000/api',

});