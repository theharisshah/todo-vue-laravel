<template>
    <div class="container d-flex flex-column flex-sm-columm flex-md-column justify-content-center">
        <h1 class="text-center">Todo List</h1>
        <formTodo></formTodo>
    </div>
</template>

<script>
    import formTodo from './form';

    export default {
        components: {
            formTodo
        }
    }
</script>

<style scoped>
    .container {
        margin-top: 100px;
    }
</style>
