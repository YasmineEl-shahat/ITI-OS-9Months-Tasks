<template>
  <nav class="navbar navbar-expand-lg bg-dark p-3 mb-5">
    <div class="container-fluid">
      <a class="text-light"><router-link to="/">Books</router-link></a>
      <a class="text-light">
        <router-link to="/watch-list">Watch List</router-link>
      </a>
    </div>
  </nav>
  <router-view></router-view>
</template>
<script>
export default {
  name: "NavBarComponent",
};
</script>
