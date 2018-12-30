import Vue from 'vue'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import App from './App.vue'
import router from './router'
Vue.use(VueAwesomeSwiper, /* { default global options } */)
Vue.config.productionTip = false

import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
