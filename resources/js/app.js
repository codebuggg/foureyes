import Vue from "vue";
import VueTailwind from 'vue-tailwind'
import App from "./views/App";

import router from "./routes";
import store from "./store";

import {
  TDropdown,
  TModal,
  TDatepicker
} from 'vue-tailwind/dist/components';

Vue.use(VueTailwind, {TDropdown, TModal, TDatepicker});

const jsonFetch = (path, options = { }) => {
  return fetch(`/api/${path}`, {
    ...options,
    headers: {
      "Content-type": "application/json",
      "Accept": "application/json",
      ...options.headers,
    },
    body: JSON.stringify(options.body)
  });
}

const authFetch = (path, options = { }) => {
  const token = localStorage.getItem("token", "");
  return jsonFetch(path, {
    ...options,
    headers: {
      "Authorization": `Bearer ${token}`,
      ...options.headers
    }
  })
}

window.authFetch = authFetch;
window.jsonFetch = jsonFetch;

const app = new Vue({
    el: '#app',
    components: {
      App
    },
    router,
    store,
});

export default app;
