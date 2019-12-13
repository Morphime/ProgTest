<template>
    <select v-model="selected" :name="stateselector.name" v-on:change="emitToParent(selected,stateselector.id)">
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
            },
            name: ""
        },data: function () {
            return {
                selected: ".",
            }
        },
        methods: {
            emitToParent(value,id){
                this.$emit('childToParent',value,id);
            }
        }
    }
</script>

<style scoped>

</style>