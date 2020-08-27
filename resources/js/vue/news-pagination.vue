<template>
    <nav v-if="totalPage > 1" aria-label="Page navigation example" class="d-inline-block">
        <ul class="pagination">

            <li class="page-item"  :class="{disabled:current == 1}">
                <a class="page-link" :href="PageLink(current -1 )">Previous</a>
            </li>
            <li v-for="p in PageRange()" class="page-item" :class="{active:current == p}">
                <a class="page-link" :href="PageLink(p)"> {{p}} </a>
            </li>

            <li class="page-item" :class="{disabled:current == totalPage}">
                <a class="page-link" :href="PageLink(current + 1 )">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "news-pagination",
        data(){
            return {
                start:1,
                end:1
            };
        },
        updated() {
            // console.log(this.current);
            let total_page = this.totalPage;
            let offset = this.offset;
            let start = this.start;
            let end = this.end;
            let current_page = this.current;

            if(total_page <= 1 + (2 * offset)){
                start = 1;
                end = total_page;
            }else{

                if(current_page <= offset){
                    start = 1;
                    end = 1 + (2 * offset);
                }else{
                    start = current_page - offset;
                    end = current_page + offset;
                }

                if(end >= total_page){
                    start = total_page - (2 * offset);
                    end = total_page;
                }
            }

            this.start = start;
            this.end = end;
        },
        computed:{

        },
        props:['current','totalPage','totalPost','offset','newsUrl'],
        methods:{
            PageLink(page){
                return this.newsUrl + "?page=" + page;
            },
            PageRange(){
                let range = [];
                for(let i = this.start; i <= this.end; i ++){
                    range.push(i)
                }

                return range;
            }
        }

    }
</script>

<style scoped>

</style>
