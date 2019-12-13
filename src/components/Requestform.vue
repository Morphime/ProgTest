<template>
    <div>
        <h3>Demande</h3>
        <h4>Cases</h4>
        <div>
            <select name="case_selector" v-model="selected" v-on:change="generateSelectors(selected)" >
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <h4>États</h4>
        <div>
            <StateSelector v-for="stateselector in stateselectors" :key="stateselector.id" :stateselector="stateselector"></StateSelector>
        </div>
        <button name="send_api_request">Envoyer</button>
    </div>
</template>

<script>

    import StateSelector from "./StateSelector";

    export default {
        components: {
            StateSelector
        },
        name: "Requestform",
        data: function () {
            return {
                selected: "",
                stateselectors: [
                    {
                        id: 0,
                        name: 'state[0]',
                    },
                    {
                        id: 1,
                        name: 'state[1]',
                    },
                    {
                        id: 2,
                        name: 'state[2]',
                    },
                    {
                        id: 3,
                        name: 'state[3]',
                    },
                    {
                        id: 4,
                        name: 'state[4]',
                    },

                ]
            }
        },
        methods: {
            generateSelectors (selected) {
                //Ici on valide si on doit enlever ou rajouter des select
                var selectorscount = this.stateselectors.length;

                if(selected>selectorscount){
                    var i;
                    for(i=selectorscount; i<selected; i++){
                        var current_index = i-1;
                        current_index.toString();
                        this.stateselectors.push({
                            id: i-1,
                            name: "state["+ current_index +"]"
                        });
                    }
                }else if(selectorscount>selected){
                    this.stateselectors = this.stateselectors.filter(stateselector => {
                        console .log(stateselector.id);
                        return stateselector.id <selected
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>