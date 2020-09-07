<template>
    <div :class="{global:locale != 'jp'}">
        <div class="tabs">
            <div  v-for="tab,index in tabs" class="btn text-left poppins" :class="{active:current == tab}" @click="active(tab)">{{tab.text}}</div>
        </div>
        <div v-if="!this.show" class="loading poppins">
            <div>
                <span>L</span>
                <span>O</span>
                <span>A</span>
                <span>D</span>
                <span>I</span>
                <span>N</span>
                <span>G</span>
                <span>.</span>
                <span>.</span>
                <span>.</span>
            </div>
        </div>

        <div class="message poppins" v-if="error">
            Something goes wrong. Please try again later.
            <div class="mt-4"><a class="hollow-btn" href="javascript:void(0)" @click="success=null;error=null">OK</a></div>
        </div>

        <div class="success poppins" v-if="success">
            Message have been sent.<br>
            <div class="mt-4"><a class="hollow-btn" href="javascript:void(0)" @click="success=null;error=null">OK</a></div>
        </div>


        <div class="form-display" :class="{'active':show}">
            <div v-for="tab,index in tabs"  :class="{'form-active':current && current.slug == tab.slug}">
                <form id="contact-form" class="contact-form" @submit.prevent="FormSubmit" v-if="!sending && !error && !success">
                    <slot :name="tab.slug" v-if="current && current.slug == tab.slug" :sending="sending">
                        {{tab.slug}}
                    </slot>
                </form>

            </div>
            <loading text="SENDING..." v-if="sending"></loading>
        </div>
    </div>
</template>

<script>
    import loading from "./loading";
    export default {
        name: "button-tab",
        components:{loading},
        data:function(){
            let data = {};
            let locale = this.locale;

            data.current = null;

            data.show = false;
            data.sending = false;
            data.error = null;
            data.success = null;



            return data;
        },
        mounted() {
            let tabs = this.tabs;
            this.active(tabs[0]);
        },
        props:{
            tabs:{
                type:Array,
                default:function(){
                    return [];
                }
            },
            locale:{
                type:String,
                default:"jp"
            },
            action:{
                type:String,
                default:null
            }
        },
        methods:{
            active(tab){
                let tabs = this.tabs;
                let self =this;
                this.show = false;
                this.current = tab;
                // this.FormData.action = tab.slug;
                setTimeout(function () {
                    self.show = true;
                },1800)
            },
            FormSubmit(){
                this.success = null;
                this.error = null;
                let action =this.action;
                // console.log(this.$refs.contactForm);
                //
                // return;
                let self = this;
                let _data = {};

                _data.title = jQuery( ".tabs .active" ).text();
                _data.data = jQuery( ".form-active form" ).serializeArray();
                _data.pass = [];
                jQuery(".form-active label").each(function(){

                    let key = $(this).data("label");
                    if(typeof key == "undefined"){
                        return;
                    }

                    let label = $(this).text();
                    let param = _data.data.filter( item => item.name == key );
                    _data.pass.push(
                        {
                            key: key,
                            label: label,
                            param:param
                        }
                    )

                    if(key == "email"){
                        _data.email = param[0].value;
                    }

                    if(key == "name"){
                        _data.name = param[0].value;
                    }

                    if(key == "company"){
                        _data.company = param[0].value;
                    }

                    if(key == "locale"){
                        _data.locale = param[0].value;
                    }


                });

                if(!action){
                    console.log("fail")
                }
                // jQuery("form").hide();
                self.sending = true;

                axios.post(action,_data)
                    .then(function (response) {

                        self.success = true;
                        // jQuery("form").show();
                    })
                    .catch(function (error) {
                        console.log(error);
                        self.error = error;

                    }).then(function () {
                    self.sending = false;

                });

            }
        }
    }
</script>

<style scoped lang="scss">


    $pink-color:#ff408f;
    $gray-color:#c8c9ca;
    $deep-color:#131623;

    @keyframes splash{
        0%{
            color: #FFF;
        }
        50%{
            color: #ff408f;
        }
        100%{
            color: #FFF;
        }
    }



    .message,.success {
        text-align: center;
        font-size: 22px;
        /* color: red; */
        margin: 20px 0;
    }

    .success{
        color:#FFF;
    }

    .tabs{
        margin-top:90px;
        padding:0 40px;
        @media (max-width:1470px) and (min-width:1200px){
            padding:0 10px;
        }
    }
    .btn{
        color:#FFF;
        background-color:$gray-color;
        border-radius:0;
        display: inline-block;
        margin-right: 15px;
        margin-bottom: 20px;
        font-size: 22px;
        @media (max-width:1366px) and (min-width:1200px){
            font-size: 16px;
            margin-right: 5px;
        }
        @media (max-width:1600px) and (min-width:1367px){
            font-size: 18px;
        }
        &:hover,&.active{
            color:$gray-color;
            background-color:$pink-color;
        }
    }
    .form-display{
        margin-top: 60px;
        opacity: 0;
        transition: all .8s ease;
        > div{
            opacity: 0;
        }
        &.active{
            opacity: 1;
            > div{
                opacity: 1;
            }
        }

        .hidden{
            display: none;
        }
    }
    .loading{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100px;
        margin-top: 60px;
        span{
            animation:splash .8s ease infinite;
        }
        @for $i from 1 through 20 {
            span:nth-child( #{$i}) {
                //background-color: lighten($base-color, $i * 5%);
                animation-delay: $i * .05 + .5s;
            }
        }
    }

    .global{
        .form-display::v-deep{
            .required{
                > label:after{
                    content:" *";
                }

            }
        }
    }
    .form-display::v-deep{
        .form-group{
            margin-bottom: 60px;
            > label{
                margin-bottom: 20px;
                font-size: 20px;
            }
        }

        .required{
            > label:after{
                content:" (必須)";
                color:$pink-color;
            }

        }

        select{
            background: $deep-color;
            border-radius: 0;
            color:#FFF;
        }

        input{
            &[type=text],&[type=email]{
                background: $deep-color;
                border-radius: 0;
                color:#FFF;
                height: 50px;
                &:focus{
                    background: $deep-color;
                    color:#FFF;
                }
            }
        }

        textarea{
            background: $deep-color;
            color:#FFF;
            min-height: 200px;
            border-radius: 0;
            &:focus{
                background: $deep-color;
                color:#FFF;
            }
        }

        .btn.btn-submit{
            color: #FFF;
            background: linear-gradient(90deg,#faed00 0%,#cb6e9f 100%);
            border-radius: 0;
            border: none;
            font-size: 22px;
            padding: 10px 30px;
            display: table;
            margin:auto;
            i{
                font-size: 10px;
                vertical-align: middle;
                margin-left: 10px;
            }
        }

        h4{
            font-size: 20px;
        }

        ul{
            margin-top:15px;
            padding-left: 20px;
            list-style: disc;
            margin-bottom:60px;
        }

    }

    @media (max-width: 991.98px){

        .tabs{
            margin-top: 12px;
            padding:0 20px;
            .btn{
                padding: 3px 8px;
                font-size: 12px;
                margin-right: 0;
                color:#FFF;
                vertical-align: top;
                margin-right: 5px;
                &.active{
                    color:#FFF;
                }
                &:last-child{
                    margin-bottom: 0;
                }
            }
        }
        .form-display::v-deep{
            margin-top: 40px;
            padding:0 20px;
            h4{
                font-size: 12px;
            }
            ul{
                margin-bottom: 30px;
                li{
                    font-size: 12px;
                }
            }
            .form-group{
                margin-bottom: 15px;
                > label{
                    font-size: 12px;
                    margin-bottom: 10px;
                }
                input{
                    &[type=text],&[type=email]{
                        height: 25px;
                        font-size: 16px;
                    }
                }
            }

            .form-check{
                font-size: 12px;
                margin-bottom:8px;
                align-items: flex-start;
                display: flex;
            }

            select{
                font-size: 12px;
                width: 50%;
            }
            .btn.btn-submit{
                font-size: 14px;
                padding:10px 20px;
                margin: 0;
                i{
                    display: none;
                }
            }
        }

    }

    @media (max-width: 767.98px){
        .tabs{

            .btn{
                display: block;
            }
        }
    }



</style>
