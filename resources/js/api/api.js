const axios = require("axios");
import { authHeader } from "./auth-header";
import { url } from '../config/config';
function kebabCaseToCamel(str) {
    return str.replace(/(\-\w)/g, matches => matches[1].toUpperCase());
}

class API {
    constructor() {
        this.url = url;
        this.endpoints = {};
    }

    getAll(resourceURL, { ...params }) {
        return new Promise((resolve, reject) => {
            axios.get(`${this.url}/${resourceURL}`, {
                params: params
            }).then(resp => {
                resolve(resp.data);
            }).catch(err => {
                const res = err.response;
                reject(err.response);
            });
        });
    }

    getOne(resourceURL, { id }) {
        return new Promise((resolve, reject) => {
            axios.get(`${this.url}/${resourceURL}/${id}`)
                .then(resp => {
                   resolve(resp.data);
                }).catch(err => {
                    const res = err.response;
                    reject(err.response);
            })
        })
    }

    post(resourceURL, data) {
        return new Promise((resolve, reject) => {
            axios.post(`${this.url}/${resourceURL}`, data).then(res => {
                resolve(res.data);
            }).catch(err => {
                reject(err.response);
            });
        })
    }

    put(resourceURL, data) {
        return axios.put(`${this.url}/${resourceURL}/${data.id}`, data, {
            headers: config
        });
    }
    patch(resourceURL, { id }, data) {
        return axios.patch(`${this.url}/${resourceURL}/${id}`, data);
    }

    delete(resourceURL, { id }) {
        return axios.delete(`${this.url}/${resourceURL}/${id}`, {
            headers: config
        });
    }
}

export default API;
