<template>
    <div class="align-serie">
        {{ Result }}
    </div>
</template>

<script>
    export default {
        name: "ResultItem",
        props: {
            Result: {
                type: String,
                required: true
            }
        },
    }
</script>

<style scoped>
    .align-serie
    {
        float: left;
    }
</style>