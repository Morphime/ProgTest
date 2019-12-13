import Vue from 'vue';
import Requestform from "./components/Requestform";

window.axios = require('axios');

new Vue({
    el: '#app',

    components:{
      Requestform,
    }
});
