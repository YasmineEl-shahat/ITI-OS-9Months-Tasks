<template>
  <div class="container my-2">
    <div class="row g-0">
      <h4>Landing Component</h4>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/contact">Contact</router-link></li>
        <li><router-link to="/about">About</router-link></li>
        <li><router-link to="/dynamic">Dynamic</router-link></li>
      </ul>
    </div>
    <div class="row g-0">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
import "bootstrap/dist/css/bootstrap.css";
import Popper from "popper.js";
window.Popper = Popper;
import "bootstrap/dist/js/bootstrap.js";
export default {};
</script>
