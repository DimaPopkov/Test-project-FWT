import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Laravel = {
    csrfToken: document.querySelector('meta[name="csrf-token"]').content
};