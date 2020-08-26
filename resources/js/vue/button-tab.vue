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
        <div class="form-display" :class="{'active':show}">
            <div v-for="tab,index in tabs" v-show="current && current.slug == tab.slug" :class="{'form-active':current && current.slug == tab.slug}">
                <slot :name="tab.slug" >
                    {{tab.slug}}
                </slot>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "button-tab",
        data:function(){
            let data = {};
            let locale = this.locale;

            data.current = null;

            data.show = false;

            data.FormData = {
                place:[],
                budget:'特に決まってない・不明',
                whereknow:[]
            }

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
            }
        },
        methods:{
            active(tab){
                let tabs = this.tabs;
                let self =this;
                this.show = false;
                this.current = tab;
                this.FormData.action = tab.slug;
                setTimeout(function () {
                    self.show = true;
                },1800)
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



</style>
