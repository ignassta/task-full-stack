<template>
    <div class="container" id="create-form-holder">
        <h1>Create User</h1>
        <form @submit.prevent="addUser">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="create-name">Name:</label>
                        <input type="text" class="form-control" id="create-name" v-model="user.name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="create-email">Email:</label>
                        <input type="text" class="form-control" id="create-email" v-model="user.email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="create-phone">Phone:</label>
                        <input type="text" class="form-control" id="create-phone" v-model="user.phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
            <div v-if="errors.length > 0">
                <ul>
                    <li v-for="error in errors"><span class="badge badge-danger">{{ error }}</span></li>
                </ul>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user:{},
                errors:[]
            }
        },
        methods: {
            addUser(){
                let uri = '/api/user/create';
                this.axios.post(uri, this.user)
                    .then((response) => {
                    this.$router
                        .push({name: 'users'})
                })
                .catch(error => {
                    this.errors = [];
                    if (error.response.data.errors.name) {
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if (error.response.data.errors.email) {
                        this.errors.push(error.response.data.errors.email[0]);
                    }
                    if (error.response.data.errors.phone) {
                        this.errors.push(error.response.data.errors.phone[0]);
                    }
                })
            }
        }
    }
</script>
