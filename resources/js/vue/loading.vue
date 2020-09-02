<template>
    <div class="loading">
        <div>
            <span v-for="letter,key in textArray">{{letter}} </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "loading",
        props:{
            text:{
                type:String,
                default:"LOADING...",
            }
        },
        computed:{
            textArray(){
                let text = this.text;
                return  text.split("");
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
</style>
