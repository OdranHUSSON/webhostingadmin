<template>
    <div>
        <md-table v-model="tasks" :table-header-color="tableHeaderColor">
            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
                <md-table-cell md-label="Description">{{ item.description }}</md-table-cell>
                <md-table-cell md-label="Updated_at">{{ item.updated_at }}</md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    export default {
        name: "task-table",
        props: {
            tableHeaderColor: {
                type: String,
                default: ""
            }
        },
        data() {
            return {
                selected: [],
                tasks: [
                    {
                        name: "Loading",
                        description: "",
                        updated_at: ""
                    }
                ]
            };
        },
        mounted () {
            var self = this;
            axios
                .get('/api/tasks')
                .then(function(response) {
                    response = response.data;
                    console.log(response);
                    self.tasks = response.data;


                })
                .catch(error => console.log(error))
        }
    };
</script>
