require("./bootstrap");

window.Vue = require("vue");

Vue.component("test", require("./components/Test.vue").default);
Vue.component("availability", require("./components/Availability.vue").default);

const app = new Vue({
    el: "#app"
});

require("alpinejs");
