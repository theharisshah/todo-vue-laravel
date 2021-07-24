<template>
    <div>
        <div class="d-flex justify-content-between align-items-center" v-if="notInput">
            <input type="checkbox" class="custom-checkbox " v-model="todo.is_completed" :value="todo.id"
                   @change="todoCheck($event)">
            <del v-if="todo.is_completed"><h6 class="mt-1">{{ todo.item }}</h6></del>
            <h6 v-else class="mt-1" @click="changeToInput()">{{ todo.item }}</h6>
            <button class="btn btn-sm btn-danger" :data-value="todo.id" @click="deleteTodo($event)">D</button>
        </div>
        <div class="d-flex" v-else>
            <input type="text" class="form-control" v-model="todo.item" @click="changeToInput()">
            <button class="btn btn-sm btn-secondary ml-2" :data-id="todo.id" @click="updateTodo($event)">Update</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['todo'],
    data: function () {
        return {
            notInput: true,
            clicks: 0,
        }
    },
    methods: {
        changeToInput() {
            this.clicks++;
            if (this.clicks === 2) {
                this.notInput = !this.notInput;
                this.clicks = 0;
            }
        },

        todoCheck($event) {
            axios.post('/v1/todos/mark-complete', {
                id: $event.target.value
            }).then(response => {
                if (response.status === 200) {

                }
            });
        },

        updateTodo($event) {
            axios.post('/v1/todos/update', {
                id: $event.target.getAttribute('data-id'),
                item: this.todo.item
            }).then(response => {
                if (response.status === 200) {
                    this.notInput = true;
                }
            });
        },

        deleteTodo($event) {
            axios.post('/v1/todos/delete', {
                id: $event.target.getAttribute('data-value')
            }).then(response => {
                if (response.status === 200) {
                    this.$emit('reload-todos');
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
