<template>
    <div class="search-bar">
        <form class="search-form-header" :class="{open}" :action="action">
            <div class="search-trigger-btn" :class="btnClass" @click="open = !open" @mouseenter="active=true" @mouseleave="active=false">
                <svg version="1.1" id="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="40.896px" height="40.896px" viewBox="0 0 40.896 40.896" enable-background="new 0 0 40.896 40.896" xml:space="preserve" >
                    <path  d="M18.712,13.206c-3.128,0-5.673,2.546-5.673,5.674c0,3.128,2.545,5.673,5.673,5.673s5.673-2.545,5.673-5.673
                        C24.385,15.752,21.84,13.206,18.712,13.206"  />
                        <path  d="M20.447,0C9.154,0,0,9.154,0,20.448c0,11.293,9.154,20.448,20.447,20.448
                        c11.294,0,20.448-9.155,20.448-20.448C40.896,9.154,31.741,0,20.447,0 M18.712,27.553c-4.782,0-8.673-3.892-8.673-8.673
                        c0-4.782,3.891-8.674,8.673-8.674s8.673,3.892,8.673,8.674C27.385,23.661,23.494,27.553,18.712,27.553 M28.168,33.044l-4.179-5.422
                        l2.377-1.831l4.179,5.423L28.168,33.044z" />
                </svg>
            </div>
            <input type="text" placeholder="Search" name="s">
            <button type="submit">Search</button>
        </form>
    </div>

</template>

<script>
    export default {
        name: "search-icon",
        data(){
            return {
                active:true,
                open:false,
            }
        },
        computed:{
          btnClass(){
              let active = this.active;
              let open = this.open;
              return {
                  active:active,
                  open:open
              }
            }
        },
        props:["action"]
    }
</script>

<style scoped lang="scss">


.search-bar{
    height: 40px;
    display: flex;
    .search-trigger-btn{
        display: flex;
        background: 100%;
        width: 40px;
        height: 40px;
        align-items: center;
        justify-content: center;
    }
    .search-form-header{
        display: flex;
        width: 40px;
        overflow: hidden;
        transition: all .5s ease;
        position: relative;

        &.open{
            width: 200px;
            input{
                opacity: 1;
            }
        }

        input{
            opacity: 0;
            transition: all .3s ease;
            background: transparent;
            border-color: #FFF;
            border-style: solid;
            width: 200px;
            border-width: 1px;
            border-radius: 25px;
            outline: none;
            padding-left:40px;
            color:#FFF;
            &::placeholder {
                color: #999;
            }
        }
    }

    .search-trigger-btn{
        position: absolute;
        z-index: 9;
        svg{
            cursor: pointer;
            width: 30px;
            height: 30px;
        }
        path{
            fill:#efefef;
        }
        &.active,&.open{
            path{
                fill:#FFF;
            }
        }
    }

    @media (max-width:992px){
        height: 50px;
        .search-trigger-btn{
            svg{
                width: 50px;
                height: 50px;
                position: relative;
                top: 5px;
                left: 5px;
            }
        }

        .search-form-header{
            display: block;
            width: 50px;
            &.open{
                width: 300px;
                overflow-y:visible;
            }
            input{
                padding-left: 50px;
                width: 300px;
                height: 50px;
            }
            button{
                display:none;
            }
        }

    }

}
</style>
