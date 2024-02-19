import { createApp } from 'vue';
import router from './router';
import App from './components/App.vue';
import './bootstrap';
const app = createApp({});
app.component("App",App);
app.use(router);
app.mount('#app');


