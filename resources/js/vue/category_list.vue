<template>
    <div class="categories">
        <ul class="poppins">
            <li><a :href="newsUrl">All</a></li>
            <li v-for="category,key in categories">
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
        props:['categories','newsUrl','categoryUrl'],
        methods:{

        }

    }
</script>

<style scoped>

</style>
