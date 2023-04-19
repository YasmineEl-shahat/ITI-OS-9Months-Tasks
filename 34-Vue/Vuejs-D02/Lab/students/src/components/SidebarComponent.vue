<template>
  <nav class="col-3 sidebar">
    <ul>
      <li>
        <a href="/">Home</a>
      </li>
      <li>
        <a href="/contact">Contact</a>
      </li>
      <li>
        <a href="/about">About</a>
      </li>
      <li>
        <a href="/gallery">Gallery</a>
      </li>
    </ul>
  </nav>
</template>
<script>
export default {
  name: "SidebarComponent",
};
</script>

<style>
.sidebar {
  background-color: #f8f9fa;
  padding: 10px;
  border-radius: 5px;
  margin-left: 0.7rem;
}
.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.sidebar a {
  display: block;
  padding: 10px;
  color: #333;
  text-decoration: none;
  transition: background-color 0.3s ease;
  border-bottom: 1px solid #dee2e6;
}

.sidebar a:last-child {
  border-bottom: none;
}

.sidebar a:hover {
  background-color: #e9ecef;
}
</style>
