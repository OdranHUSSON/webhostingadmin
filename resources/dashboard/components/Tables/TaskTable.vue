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
            axios
                .get('/api/tasks')
                .then(response => (this.tasks = response.data.data))
                .catch(error => console.log(error))
        }
    };
</script>
