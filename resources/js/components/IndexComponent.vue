<template>
    <div>
        <h1>Users</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
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
                <td>{{ user.address }}</td>
                <td><router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-primary">Edit</router-link></td>
                <td><button class="btn btn-danger" @click.prevent="deletePost(user.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
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
            let uri = 'http://127.0.0.1:8000/api';
            this.axios.get(uri).then(response => {
                this.users = response.data.data;
            });
        },
        methods: {
            deletePost(id)
            {
                let uri = `http://127.0.0.1:8000/api/user/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.users.splice(this.users.indexOf(id), 1);
                });
            }
        }
    }
</script>
