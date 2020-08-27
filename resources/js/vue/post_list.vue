<template>
    <div class="news-list-container">
        <div class="row">
            <div v-for="single,index in posts" class="col-lg-6 col-xl-4">
                <article class="news-block">
                    <header class="d-flex justify-content-between px-3 py-2">
                        <div class="date">{{post_date(single)}} </div>
                        <div class="category"><a href="#"> {{post_category(single)}} </a></div>
                    </header>
                    <a :href="permalink(single)">
                        <div class="thumbnail" :style="{ 'background-image': 'url('+post_cover(single) +')' }"></div>
                    </a>
                     <footer>
                            <a :href="permalink(single)">
                                <h3 class="mt-3 mb-1" v-html="single.title.rendered"></h3>
                             </a>
                        <div class="text-right">
                            <a :href="permalink(single)" class="readmore poppins font-weight-bold font-italic mr-1">
                                Readmore
                            </a>
                        </div>
                    </footer>
                </article>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "post_list",
        data(){
            return {

            };
        },
        props:['posts','categories','newsUrl'],
        methods:{
            permalink(single){
                return this.newsUrl+'/'+single.id;
            },
            post_category(single){

                let category = "";
                if(typeof single.categories != "undefined" && single.categories.length > 0){

                    let category_id = single.categories[0];
                    let category_data = this.categories.find(item => item.id == category_id);
                    category = category_data.name;

                }
                return category;
            },
            post_cover(single){
                let thumbnail = "";
                let size = "medium";
                if(typeof single.better_featured_image != "undefined"){
                    if(typeof single.better_featured_image.source_url && single.better_featured_image.source_url){
                        thumbnail = single.better_featured_image.source_url;
                    }
                    if(typeof single["better_featured_image"]["media_details"]["sizes"][size]["source_url"] != "undefined"){
                        thumbnail = single["better_featured_image"]["media_details"]["sizes"][size]["source_url"];
                    }
                }
                return thumbnail;
            },
            post_date(single){
                let _date = new Date(single.date);

                return _date.getFullYear() + "/"+ ( _date.getMonth() + 1)  + "/"+ _date.getDate();;
            },
            // post_title(single){
            //     var txt = document.createElement('textarea');
            //     txt.innerHTML = single.title.rendered;
            //     console.log(txt.value);
            //     return txt.value;
            // }
        }

    }
</script>

<style scoped>

</style>
