<template>
    <div>

        <div class="" style="writing-mode: vertical-rl;max-width: 100%" :style="{height: h +'px'}">
            <span v-if="done.length > 0" v-for="words,index in done" style="display: inline-block">
                {{ words }}
            </span>
        </div>
        <div v-if="working.length" style="writing-mode: vertical-rl;" ref="infoBox">{{ working }}</div>
    </div>
</template>

<script>
    export default {
        name: "vword",
        data:function(){
            return {
                text:"",
                h:300,
                working:"",
                done:[],
            };
        },
        mounted:function() {
            console.log("mounted");
            this.text = this.paragraph;
            this.working = this.text;
        },
        updated(){
            if(this.working.length == 0){
                return;
            }
            let heightString = this.$refs.infoBox.clientHeight;
            if(heightString > this.h){
                this.working = (this.working).slice(0, -1);
            }else if( this.text.trim().length > 0 ){

                console.log(this.working);
                this.done.push(this.working);
                this.text = this.text.replace(this.working,"");
                this.working = this.text;
            }

        },
        props:{
            paragraph:{
              type:String,
              default:""
            }
        },

    }
</script>

<style scoped>

</style>
