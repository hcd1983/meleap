<template>
    <div>
        <slot name="category" :currentCategory="currentCategory" :categories="categories" :posts="posts" :totalPage="totalPage" :totalPost="totalPost" :categoryLoaded="categoryLoaded" :newsLoaded="newsLoaded"></slot>
    </div>
</template>

<script>
    export default {
        name: "news-list",
        data(){
            return {
                categories:[],
                posts:[],
                totalPage: 0,
                totalPost : 0,
                categoryLoaded:0,
                newsLoaded:0,
            }
        },
        mounted() {

            this.getCategories();
            // this.getPosts();
        },
        props:["postApi","categoryApi","newsUrl","categoryUrl","categorySlug","currentCategory","search"],
        methods:{

            getCategories(){
                let self = this;
                this.$axios.get(this.categoryApi)
                    .then(function (response) {
                        // handle success
                        self.categories = response.data;
                        self.categoryLoaded = 1;

                        console.log(response);
                    })
                    .catch(function (error) {
                        // handle error
                        self.categories = [];
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                        self.getPosts();
                    });

            },
            getPosts(){
                let axios_opts = {
                    params:{}
                };
                let self = this;
                let categorySlug = this.categorySlug;
                let search = this.search;

                if(categorySlug){
                   let res = this.getCategoryIdbySlug(categorySlug);

                   if(typeof res != "undefined"){

                       axios_opts.params.categories = res.id

                   }else{
                       self.posts = [];
                       self.newsLoaded = 1;
                       return;
                   }
                }


                if(search){
                    axios_opts.params.search = search;
                    console.log(axios_opts);
                }

                this.$axios.get(this.postApi, axios_opts)
                    .then(function (response) {
                        // handle success
                        self.posts = response.data;
                        self.totalPost = response.headers["x-wp-total"];
                        self.totalPage = response.headers["x-wp-totalpages"];
                        self.newsLoaded = 1;
                        console.log(response);
                    })
                    .catch(function (error) {
                        // handle error
                        self.posts = [];
                        self.newsLoaded = 1;
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            getCategoryIdbySlug(slug){
                let categories = this.categories;
                let res = categories.find(item => item.slug == slug);
                return res;
            }
        }
    }
</script>

<style scoped>

</style>
