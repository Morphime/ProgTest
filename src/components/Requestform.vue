<template>
    <div class="maindiv">
        <div class="listwrapper">
            <h3>Demande</h3>
            <h4>Cases</h4>
            <div>
                <select v-model="selectedcase" v-on:change="generateSelectors(selectedcase)" >
                    <option  value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <h4>États</h4>
            <div>
                <StateSelector v-for="stateselector in stateselectors" :key="stateselector.id" :stateselector="stateselector" v-on:childToParent="onChildClick"></StateSelector>
            </div>
            <button @click="sendAPIrequest()">Envoyer</button>
        </div>
        <div class="listwrapper">
            <h3>Résultats</h3>
            <ResultList v-for="result in apiresult" :key="result.id" :Results="result"></ResultList>
        </div>
    </div>
</template>

<script>

    import StateSelector from "./StateSelector";
    import ResultList from "./ResultList";

    window.axios = require('axios');

    export default {
        components: {
            StateSelector,
            ResultList
        },
        name: "Requestform",
        data: function () {
            return {
                selectedcase: "3",
                test: "",
                stateselectors: [
                    {
                        id: 0,
                        name: 'states[0]',
                        selected: ".",
                    },
                    {
                        id: 1,
                        name: 'states[1]',
                        selected: ".",
                    },
                    {
                        id: 2,
                        name: 'states[2]',
                        selected: ".",
                    }
                ],
                apiresult: ""
            }
        },
        methods: {
            generateSelectors (selected) {
                //Ici on valide si on doit enlever ou rajouter des select
                var selectorscount = this.stateselectors.length;

                if(selected>selectorscount){
                    var i;
                    for(i=selectorscount; i<selected; i++){
                        var current_index = i;
                        current_index.toString();
                        this.stateselectors.push({
                            id: i,
                            name: "states["+ current_index +"]",
                            selected: ".",
                        });
                    }
                }else if(selectorscount>selected){
                    this.stateselectors = this.stateselectors.filter(stateselector => {
                        return stateselector.id <selected
                    });
                }
            },

            sendAPIrequest(){
                var urlparams ="";
                this.stateselectors.forEach(function(item){
                    if(urlparams===""){
                        urlparams = "?";
                    }else{
                        urlparams = urlparams+"&";
                    }
                    urlparams =urlparams + item.name.toString()+"="+item.selected.toString();

                });
                axios.get('./permutations'+urlparams.toString(), {

                }).then(function(response){
                        this.apiresult = response.data;
                    }.bind(this));

            },
            onChildClick (value,id) {
                this.stateselectors[id].selected =value
            }
        }
    }
</script>

<style scoped>
    .maindiv
    {
        display:flex;
    }
    .listwrapper
    {
        width: 10%;
    }
</style>