var app = new Vue({
    el: '#tasks',
    data () {
        return {
            tasks: null,
            loading: true,
            errored: false,
            log : null,
            name: null,
            description: null
        }
    },
    mounted () {
        this.fetchTasks();
    },
    methods: {
        submitTask: function(event){
            event.preventDefault();
            this.log = "Loading";
            axios.post('/api/tasks', {
                name : this.name,
                description : this.description
            })
            .then(response => {
                this.log = response.data
                this.fetchTasks();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        fetchTasks : function() {
            axios.get('/api/tasks')
            .then(response => {
                this.tasks = response.data.data
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
})