<template>
    <div class="ranger-bar">
        <div class="log">{{showing}} / {{max}}</div>
        <input type="range" :step="step" :max="max" :min="min" :value="val" @input="updateValue($event.target.value)">
    </div>
</template>

<script>
    export default {
        name: "range-bar",
        data:function () {

            return {
                // "value": this.default
            }
        },
        computed:{
            display(){
                if(this.value > this.max){
                    return 1;
                }else{
                    return this.value;
                }
            },
            val(){
                return this.showing;
            }
        },
        props:["max","min","step","showing"],
        methods:{
            updateValue(value){
                // console.log(value);
                // this.$emit("input",value);

                if( value > this.max){
                    this.value = 1;
                }else{
                    this.value = value;
                }

                this.$emit("change",value);

                // if( value > this.max){
                //     this.value = 1;
                // }else{
                //     this.value = value;
                // }
                // this.$emit("change",this.display);
            }
        }
    }
</script>

<style scoped lang="scss">
    .ranger-bar{

        width:80%;
        max-width: 1160px;
        margin: auto;
        margin-top:90px;
        position: relative;
    }
    .log{
        position: absolute;
        right: 100%;
        bottom: 7px;
        font-size: 40px;
        width: 100px;
        text-align: right;
        margin-right: 20px;
        line-height: 0;
    }
    input[type=range]{
        height: 1px;
        -webkit-appearance: none;
        width: 100%;
        outline : none;      /* 避免點選會有藍線或虛線 */
        &::-webkit-slider-thumb {
            transition: all 0.5s ease;
            -webkit-appearance: none; /* Override default look */
            appearance: none;
            width: 150px; /* Set a specific slider handle width */
            height: 7px; /* Slider handle height */
            background: linear-gradient(to right, #e74385 0%,  #f4c033 100%); /* Green background */
            cursor: pointer; /* Cursor on hover */
        }
        &::-moz-range-thumb {
            transition: all 0.5s ease;
            width: 150px; /* Set a specific slider handle width */
            height: 7px; /* Slider handle height */
            background: linear-gradient(to right, #e74385 0%,  #f4c033 100%); /* Green background */
            cursor: pointer; /* Cursor on hover */
        }
    }
</style>
