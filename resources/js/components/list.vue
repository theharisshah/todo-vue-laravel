<template>
    <div class="container-fluid w-50">
        <ul class="list-group">
            <li v-for="(todo, index) in todos" :key="index" class="list-group-item">
                <item :todo="todo" v-on:reload-todos="getTodos()"></item>
            </li>
        </ul>
    </div>
</template>

<script>
    import item from './item'
    export default {
        data: function () {
            return {
                todos: []
            }
        },
        components : {
            item
        },
        methods : {
            getTodos () {
                axios.get('/v1/todos').then(response => {
                   if(response.status === 200){
                       this.todos = response.data.data;
                   }
                });
            }
        },
        created() {
            this.getTodos();
            this.$parent.$on('reload-todos', this.getTodos);
        }
    }
</script>

<style scoped>

</style>
