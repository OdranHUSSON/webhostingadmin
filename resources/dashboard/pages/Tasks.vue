<template>
    <task-table table-header-color="red"></task-table>
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
