<template>
    <div class="container col-md-12 col-sm-12 col-lg-6">
        <ul class="list-group">
            <li v-for="todo in todos.data" :key="todo.id" class="list-group-item">
                <item :todo="todo" v-on:reload-todos="getTodos(page)"></item>
            </li>
        </ul>
        <div class="mt-2">
            <pagination align="center" :data="todos" @pagination-change-page="getTodos"></pagination>
        </div>
    </div>
</template>

<script>
    import item from './item';
    import pagination from 'laravel-vue-pagination';
    export default {
        data: function () {
            return {
                todos: {},
                page : 1,
            }
        },
        components : {
            item,
            pagination
        },
        methods : {
            getTodos (page) {
               this.page = page;
               let url = `/v1/todos`;
                if(typeof this.page !== 'undefined'){
                    url = `/v1/todos?page=${page}`;
                }
                 axios.get(url).then(response => {
                   if(response.status === 200){
                       if(response.data.data.length > 0){
                           this.todos = response.data;
                       }else{
                           if(typeof this.page !== 'undefined'){
                               if(this.page > 1){
                                   this.page--;
                                   this.getTodos(this.page)
                               }else {
                                   this.todos = {}
                               }
                           }else{
                               this.todos = {}
                           }
                       }
                   }
                });
            }
        },
        created() {
            this.getTodos();
            this.$parent.$on('reload-todos', () => {this.getTodos(this.page)});
        }
    }
</script>

<style scoped>

</style>
