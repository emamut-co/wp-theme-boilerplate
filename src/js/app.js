import Vue from 'vue';

const app = new Vue({
  el: '#app',
  data: {
    messages: [
      {
        text: 'Column 1',
        bgClass: 'bg-gray-400'
      },
      {
        text: 'Column 2',
        bgClass: 'bg-gray-500'
      }
    ]
  }
});