<template>
    <div class="container" id="edit-form-holder">
        <h1>Edit User</h1>
        <form @submit.prevent="updateUser">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="edit-name">Name:</label>
                        <input type="text" class="form-control" id="edit-name" v-model="user.name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="edit-email">Email:</label>
                        <input type="text" class="form-control" id="edit-email" v-model="user.email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="edit-phone">Phone:</label>
                        <input type="text" class="form-control" id="edit-phone" v-model="user.phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
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

        data() {
            return {
                user: {},
                errors: []
            }
        },
        created() {
            let uri = `/api/user/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.user = response.data;
            });
        },
        methods: {
            updateUser() {
                let uri = `/api/user/update/${this.$route.params.id}`;
                this.axios.post(uri, this.user).then((response) => {
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
