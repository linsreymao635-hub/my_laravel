<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container">
                <router-link to="/" class="navbar-brand">Category Manager</router-link>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App'
}
</script>