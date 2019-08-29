 
require('./bootstrap');

window.Vue = require('vue');

 

Vue.component('order-progress', require('./components/OrderProgress.vue').default);
Vue.component('order-alert', require('./components/OrderAlert.vue').default);
Vue.component('order-notifications', require('./components/OrderNotifications.vue').default);

 

const app = new Vue({
    el: '#app',
    mounted() {
      Echo.channel('pizza-tracker')
      .listen('OrderStatusChanged', (e) => {
        console.log('omgggg realtime bro')
      });
    }
});
