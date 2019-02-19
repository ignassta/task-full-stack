<template>
    <div>
        <nav class="navbar navbar-expand-sm" id="navbar-holder">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link to="/" class="nav-link">User List</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/create" class="nav-link">Create User</router-link>
                </li>
            </ul>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>

    export default{
    }
</script>
