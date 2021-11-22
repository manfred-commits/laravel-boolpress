<template>
    <main>
        <h2>Posts Titles</h2>
        <ul>
            <li v-for="post in postsList" :key="post.id">
                {{post.title}}
            </li>
        </ul>
    </main>
</template>

<script>
    export default {
        name: 'Main',
        data(){
            return{
                postsList: [],

            }
        },
        mounted(){
            axios.get('api/posts')
            .then((response) => {
                this.postsList=response.data.data;
                // console.log(response);
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
</script>