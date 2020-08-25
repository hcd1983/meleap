<template>
    <div>
        <form @submit="submit" class="contact-form">

            <div class="form-group required">
                <label>お名前</label>
                <input type="text" class="form-control" v-model="data.name" required>
            </div>
            <div class="form-group required">
                <label>メールアドレス</label>
                <input type="email" class="form-control" v-model="data.email" required>
            </div>
            <div class="form-group required">
                <label>会社名</label>
                <input type="text" class="form-control" v-model="data.company" required>
            </div>
            <div class="form-group required">
                <label>電話番号</label>
                <input type="text" class="form-control" v-model="data.tel" required>
            </div>
            <div class="form-group required">
                <label>お問い合わせ内容</label>
                <textarea class="form-control" v-model="data.message" required></textarea>
            </div>

            <slot name="befor_submit_button"></slot>

            <div>
                <button class="btn btn-submit" type="submit" >送信內容確認 <i class="fas fa-chevron-right"></i></button>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        name: "form-events",
        data:function(){
          return {
            data:{}
          }
        },
        watch:{
          data:{
              handler(val){
                  // do stuff
              },
              deep: true
          }
        },
        props:{
          FormData:{
              type:Object,
              default:function(){
                  return {};
              }
          }
        },
        mounted() {
            this.data = this.FormData;
        },
        methods:{
            submit(){
                console.log("SS");
                let formData = new FormData( document.querySelector(".contact-form") );
                this.$emit("submit",this.data);

            }
        }
    }
</script>

<style scoped>

</style>
