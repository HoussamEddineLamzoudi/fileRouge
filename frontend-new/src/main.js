import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import { store } from "./store";


const app = createApp(App);

app.use(router);
app.use(store);


import LitepieDatepicker from "litepie-datepicker";
app.use(LitepieDatepicker);


import Datepicker from "flowbite-datepicker/Datepicker";

import "./index.css";
import "flowbite";


/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret)
app.component('font-awesome-icon', FontAwesomeIcon)



//PrimeVue
import PrimeVue from 'primevue/config';
import Dialog from 'primevue/dialog';
import ToastService from 'primevue/toastservice';

app.use(PrimeVue);
app.component('Dialog', Dialog);
app.use(ToastService);







app.mount("#app");

app.provide("URLAPI", "http://localhost/my_php/fileRouge/backend");
