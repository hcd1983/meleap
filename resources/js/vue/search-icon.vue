<template>
    <svg version="1.1" id="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="40.896px" height="40.896px" viewBox="0 0 40.896 40.896" enable-background="new 0 0 40.896 40.896" xml:space="preserve" :class="{active}" @mouseenter="active=true" @mouseleave="active=false" >
        <path  d="M18.712,13.206c-3.128,0-5.673,2.546-5.673,5.674c0,3.128,2.545,5.673,5.673,5.673s5.673-2.545,5.673-5.673
            C24.385,15.752,21.84,13.206,18.712,13.206"  />
        <path  d="M20.447,0C9.154,0,0,9.154,0,20.448c0,11.293,9.154,20.448,20.447,20.448
            c11.294,0,20.448-9.155,20.448-20.448C40.896,9.154,31.741,0,20.447,0 M18.712,27.553c-4.782,0-8.673-3.892-8.673-8.673
            c0-4.782,3.891-8.674,8.673-8.674s8.673,3.892,8.673,8.674C27.385,23.661,23.494,27.553,18.712,27.553 M28.168,33.044l-4.179-5.422
            l2.377-1.831l4.179,5.423L28.168,33.044z" />
    </svg>
</template>

<script>
    export default {
        name: "search-icon",
        data(){
            return {
                active:true,
            }
        }
    }
</script>

<style scoped lang="scss">
    svg{
        cursor: pointer;
        width: 30px;
        height: 30px;
    }
    path{
        fill:#efefef;
    }
    .active{
        path{
            fill:#FFF;
        }
    }
</style>
