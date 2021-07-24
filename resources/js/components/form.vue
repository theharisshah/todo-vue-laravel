<template>
    <div>
        <div class="input-group mb-3 w-50 mt-3 mx-auto">
            <input type="text" class="form-control" placeholder="New Todo" v-model="todo.item">
            <div class="input-group-append">
                <button class="btn btn-outline-success btn-sm" type="button" @click="addTodo()">Add</button>
            </div>
        </div>
        <list></list>
    </div>
</template>

<script>
import list from './list';

export default {
    data: function () {
        return {
            todo: {
                item: ""
            }
        }
    },
    methods: {
        addTodo() {
            if (this.todo.item !== '') {
                axios.post('/v1/todos/store', {
                    item: this.todo.item
                }).then(response => {
                    if (response.status >= 200 && response.status < 300) {
                        this.todo.item = "";
                        this.$emit('reload-todos');
                    }
                });
            }
        }
    },
    components: {
        list
    }
}
</script>

<style scoped>

</style>
