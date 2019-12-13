import Vue from 'vue';
import Requestform from "./components/Requestform";


new Vue({
    el: '#app',

    components:{
      Requestform,
    },
    data: {
        thing:""
    }
});

// new Vue({
//     el: '#app',
//
//     components:{
//       Accordion,
//     },
//
//     data: function () {
//         return {
//             items: [
//                 {id: 1, title: 'Title 1', description: 'description 1'},
//                 {id: 2, title: 'Title 2', description: 'description 2'},
//                 {id: 3, title: 'Title 3', description: 'description 3'}
//             ]
//         }
//
//     }
// });