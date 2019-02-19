<template>
    <div class="container" id="user-list-holder">
        <div class="row">
            <div class="col">
                <h1>User List</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.phone }}</td>
                        <td><router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-edit">Edit</router-link></td>
                        <td><button class="btn" @click.prevent="deleteUser(user.id)">Delete</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        created() {
            let uri = '/api';
            this.axios.get(uri).then(response => {
                this.users = response.data.data;
            });
        },
        methods: {
            deleteUser(id)
            {
                let uri = `/api/user/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.users.splice(this.users.indexOf(id), 1);
                });
            },
        }
    }
</script>
