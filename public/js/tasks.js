var app = new Vue({
    el: '#taskslist',
    data () {
        return {
            tasks: null,
            loading: true,
            errored: false
        }
    },
    mounted () {
        axios
            .get('/api/tasks')
            .then(response => {
                this.tasks = response.data.data
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
    }
})