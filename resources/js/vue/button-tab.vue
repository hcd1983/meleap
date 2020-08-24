<template>
    <div>
        <div class="tabs">
            <div  v-for="tab,index in tabs" class="btn text-left" :class="{active:current == tab}" @click="active(tab)">{{tab.text}}</div>
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
            <form-events v-if="current && current.slug == 'events'" :form-data="FormData">
                <template slot="befor_submit_button" >
                    <h4>＜お問い合わせへのご回答について＞</h4>
                    <ul>
                        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
                        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
                    </ul>
                </template>
            </form-events>
            <form-media v-if="current && current.slug == 'media'" :form-data="FormData">
                <template slot="befor_submit_button" >
                    <h4>＜お問い合わせへのご回答について＞</h4>
                    <ul>
                        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
                        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
                    </ul>
                </template>
            </form-media>
            <form-play v-if="current && current.slug == 'play'" :form-data="FormData">
                <template slot="befor_submit_button" >
                    <h4>＜お問い合わせへのご回答について＞</h4>
                    <ul>
                        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
                        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
                    </ul>
                </template>
            </form-play>
            <form-query v-if="current && current.slug == 'query'" :form-data="FormData">
                <template slot="befor_submit_button" >
                    <h4>＜お問い合わせへのご回答について＞</h4>
                    <ul>
                        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
                        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
                    </ul>
                </template>
            </form-query>
<!--            {{FormData}}-->
        </div>
    </div>
</template>

<script>
    import form_events from "./form-events.vue";
    import form_media from "./form-media.vue";
    import form_play from "./form-play.vue";

    export default {
        name: "button-tab",
        components:{
            "form-events":form_events,
            "form-media":form_media,
            "form-play":form_play,
            "form-query":form_play,
        },
        data:function(){
            let data = {};
            let locale = this.locale;
            if(locale == "en"){
                data.tabs = [
                    {
                        text:"Business Inquiry",
                        active:false,
                        slug:"events",
                    },
                    {
                        text:"Press or Media Inquiry",
                        active:false,
                        slug:"media",
                    },
                    {
                        text:"Player Inquiry",
                        active:false,
                        slug:"play",
                    },
                    // {
                    //     text:"その他のお問合せの方はこちら",
                    //     active:false,
                    //     slug:"query",
                    // }
                ];
            }else{
                data.tabs = [
                    {
                        text:"導入またはイベントでの活用をご検討されている方",
                        active:false,
                        slug:"events",
                    },
                    {
                        text:"プレス・メディアの方はこちら",
                        active:false,
                        slug:"media",
                    },
                    {
                        text:"プレイヤーの方はこちら",
                        active:false,
                        slug:"play",
                    },
                    {
                        text:"その他のお問合せの方はこちら",
                        active:false,
                        slug:"query",
                    }
                ];

            }

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
            PropTabs:{
                type:Array,
                default:function(){
                    return [];
                }
            },
            locale:{
                type:String,
                default:function(){
                    return "jp";
                }
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
        &.active{
            opacity: 1;
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
