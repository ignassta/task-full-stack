<template>
    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addUser">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control" v-model="user.phone">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" class="form-control" v-model="user.address">
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
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user:{}
            }
        },
        methods: {
            addUser(){
                let uri = 'http://127.0.0.1:8000/api/user/create';
                this.axios.post(uri, this.user).then((response) => {
                    this.$router.push({name: 'users'});
                });
            }
        }
    }
</script>
