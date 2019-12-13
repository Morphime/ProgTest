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
        padding: 4px;
        text-align: center;
        margin-left: 10px;
        border-style: solid;
        border-width: 2px;
        display:inline-block;
    }
</style>