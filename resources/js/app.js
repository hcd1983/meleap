import jQuery from "jquery";
import Vue from "vue";
import vword from "./vue/vword.vue";
import grid_bg from "./vue/grid-bg.vue";
import button_tab from "./vue/button-tab.vue";
import range_bar from "./vue/range-bar.vue";
import top_search_block from "./vue/top-search-block.vue";
import rellax from "rellax";
import inView from "in-view";
require('./bootstrap');

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
        'top-search-block':top_search_block
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
        },
        FormSubmit(action=null,data=null){

            // console.log(this.$refs.contactForm);
            //
            // return;
            let _data = jQuery( ".form-active form" ).serializeArray();
            console.log(_data);
            return;
            if(!action || !data){
                console.log("fail")
            }
            console.log(action,data);
            axios.post(action, {
                firstName: 'Fred',
                lastName: 'Flintstone'
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });

        }
    }
})

window.app = app;


