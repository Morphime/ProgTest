<template>
    <select :name="stateselector.name"selected>
        <option value=".">.</option>
        <option value="x">x</option>
        <option value="o">o</option>
    </select>
</template>

<script>
    export default {
        name: "StateSelector",
        props: {
            stateselector: {
                type: Object,
                require: true
            }
        }
    }
</script>

<style scoped>

</style>