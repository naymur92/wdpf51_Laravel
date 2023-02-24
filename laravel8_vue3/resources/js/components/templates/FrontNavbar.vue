<script setup>
import Cart from "../Cart.vue";
</script>
<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="header__logo">
          <router-link to="/"
            ><img src="/front_assets/img/logo.png" alt=""
          /></router-link>
        </div>
      </div>
      <div class="col-lg-6">
        <nav class="header__menu">
          <ul>
            <li>
              <router-link to="/">Home</router-link>
            </li>
            <li>
              <router-link to="/shop">Shop</router-link>
            </li>
            <li>
              <router-link to="/blog">Blog</router-link>
            </li>
            <li>
              <router-link to="/contact">Contact</router-link>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3">
        <Cart />
      </div>
    </div>
    <div class="humberger__open">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style>
</style>