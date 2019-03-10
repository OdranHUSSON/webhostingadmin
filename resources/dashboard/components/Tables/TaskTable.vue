<template>
    <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
            <md-card-header data-background-color="red">
                <h4 class="title">Tasks</h4>
                <p class="category">Tasks List</p>
            </md-card-header>
            <md-card-content>
                <div>
                    <md-table v-model="tasks" :table-header-color="tableHeaderColor">
                        <md-table-row slot="md-table-row" slot-scope="{ item }">
                            <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
                            <md-table-cell md-label="Description">{{ item.description }}</md-table-cell>
                            <md-table-cell md-label="Updated_at">{{ item.updated_at }}</md-table-cell>
                        </md-table-row>
                    </md-table>
                </div>
            </md-card-content>
        </md-card>
        <div class="pager">
            <a href="#" v-for="n in pager" v-on:click="updateData(n)">
                {{ n }}
            </a>
        </div>
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
                ],
                pager: 1
            };
        },
        mounted() {
            this.updateData(1);
        },
        methods : {
            updateData(page) {
                var self = this;
                axios.get('/api/tasks?page='+page)
                    .then(function (response) {
                        response = response.data;
                        console.log(response);
                        self.tasks = response.data;
                        self.pager = response.last_page;
                    })
                    .catch(error => console.log(error))
            }
        }
    };
</script>
