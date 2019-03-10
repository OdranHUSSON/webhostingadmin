<template>
    <div class="content">
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="title">Tasks</h4>
                        <p class="category">Tasks List</p>
                    </md-card-header>
                    <md-card-content>
                        <task-table table-header-color="green"></task-table>
                    </md-card-content>
                </md-card>
            </div>

        </div>
    </div>
</template>

<script>
    import { TaskTable, OrderedTable } from "../components";

    export default {
        components: {
            OrderedTable,
            TaskTable
        }
    };
</script>
