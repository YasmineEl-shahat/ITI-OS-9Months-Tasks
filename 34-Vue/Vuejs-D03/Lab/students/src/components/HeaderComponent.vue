<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <slot name="top" />

    <a class="navbar-brand" href="#">My App</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#"
            >Home <span class="sr-only">(current)</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a
            href="#"
            :class="['nav-link', branch.name == 'Alex' ? 'alex' : 'mans']"
            >{{ branch.name }}</a
          >
        </li>
      </ul>
      <!-- <slot /> -->
      <!-- default slot -->
      <slot><span>Html will be injected here</span></slot>
      <slot name="bottom" />
    </div>
  </nav>
</template>

<script>
export default {
  name: "HeaderComponent",
  props: ["branch"],
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.alex {
  color: lightblue;
}
.mans {
  color: lightyellow;
}
</style>
