import Vue from 'vue'
import Vuex from 'vuex'
import SecureLS from "secure-ls";
let ls = new SecureLS({ isCompression: false });

import API from '../api/api';
const api = new API();
Vue.use(Vuex);

export const store = new Vuex.Store({
    plugins: [],
    state: {},
    mutations: {},
    actions: {
        inquiry({commit}, inquiry) {
            return new Promise((resolve, reject) => {
                api.post('inquiry', inquiry)
                    .then(resp => {
                        resolve(resp);
                    })
                    .catch(err => {
                        commit('auth_error');
                        reject(err);
                    })
            });
        }
    },
    getters : {}

});
