import jQuery from "jquery";
import Vue from "vue";
import vword from "./vue/vword.vue";
import grid_bg from "./vue/grid-bg.vue";
import button_tab from "./vue/button-tab.vue";
import range_bar from "./vue/range-bar.vue";
import top_search_block from "./vue/top-search-block.vue";
import category_list from "./vue/category_list";
import post_list from "./vue/post_list";
import news_list from "./vue/news-list";
import news_pagination from "./vue/news-pagination";
import rellax from "rellax";
import inView from "in-view";
import loading from "./vue/loading";
require('./bootstrap');

Vue.prototype.$axios = axios;

window.Rellax = rellax;
window.jQuery = window.$ = jQuery;
window.Vue = Vue;
window.inView = inView;
// window.vword = vword;

let app = new Vue({
    el:"#wrap",
    data:function(){
      return {
          gallery:1,
          showing:1,
      }
    },
    components: {
        'vword': vword,
        'grid-bg': grid_bg,
        'button-tab': button_tab,
        'range-bar':range_bar,
        'top-search-block':top_search_block,
        'news-list':news_list,
        'category-list':category_list,
        'post-list':post_list,
        'news-pagination':news_pagination,
        'loading':loading,
    },
    watch:{
      owl_slider(newValue){
          // owlscrollto(newValue)
      }
    },
    methods:{
        OwlSliderTo(val){
           // this.owl_slider = val;
           // this.gallery = val;
           owlscrollto(val);
        }
    }
})

window.app = app;


