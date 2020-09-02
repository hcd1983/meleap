<template>
    <div class="categories">
        <ul class="poppins">
            <li :class="{current:current==''}"><a :href="newsUrl">All</a></li>
            <li v-for="category,key in categories" :class="{current:current==category.slug}">
                <a :href="categoryUrl + '/' + category.slug">{{ category.name}}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "category_list",
        data(){
            return {

            };
        },
        props:['categories','newsUrl','categoryUrl','current'],
        methods:{

        }

    }
</script>

<style scoped lang="scss">
    .categories{
        li.current{
           a{
               color:#999;
           }
        }
    }
</style>
