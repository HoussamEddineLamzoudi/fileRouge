import Vue, { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "./assets/tailwind.css";
import "bootstrap/dist/css/bootstrap.css";

const app = createApp(App);
app.use(router);
// app.use(BootstrapVue);

app.mount("#app");
