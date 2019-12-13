<template>
    <div class="wrapper">
        <ResultItem v-for="result in Results" :key="result.id" :Result="result"></ResultItem>
    </div>

</template>

<script>
    import ResultItem from "./ResultItem";

    export default {
        components: {
            ResultItem
        },
        name: "ResultList",
        props: {
            Results: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>
    .wrapper
    {
        position:relative
    }
</style>