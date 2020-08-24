<template>
    <div class="grid-bg" :style="bg_style"><slot></slot></div>
</template>

<script>
    export default {
        name: "grid-bg",
        computed:{
            bg_style(){

                let img = this.bg_canvas();
                return {
                    "background-image": `url(${img})`,
                }
            }
        },
        props:{
            ShadowColor:{
                type:String,
                default:"",
            },
            PatternWidth:{
                type:Number,
                default:480,
            },
            PatternHeight:{
                type:Number,
                default:230,
            },
            StrokeStyle:{
                type:String,
                default:"#FFF",
            },
            LineWidth:{
                type:Number,
                default:.25,
            },
            GlobalAlpha:{
                type:Number,
                default:.2,
            }
        },
        methods:{
            bg_canvas(){
                const patternCanvas =  document.createElement("canvas");
                const patternContext = patternCanvas.getContext('2d');
                // Give the pattern a width and height of 50
                patternCanvas.width = this.PatternWidth;
                patternCanvas.height = this.PatternHeight;

                patternContext.globalAlpha = this.GlobalAlpha;

                if(this.ShadowColor){
                    patternContext.shadowOffsetX = 0;
                    patternContext.shadowOffsetY = 0;
                    patternContext.shadowBlur = 1;
                    patternContext.shadowColor = this.ShadowColor;
                }


                patternContext.strokeStyle = this.StrokeStyle;
                patternContext.lineWidth   = this.LineWidth;
                patternContext.strokeRect(0,0, patternCanvas.width,patternCanvas.height);

                patternContext.stroke();


                console.log(this.GlobalAlpha);
                // let url = canvas.toDataURL();
                let url = patternCanvas.toDataURL();

                return url;
                // $("#bg-grid-overlay").css("background-image","url("+url+")");
            }
        }
    }
</script>

<style scoped>

</style>
