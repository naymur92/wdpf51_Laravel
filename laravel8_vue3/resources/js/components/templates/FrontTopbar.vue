<script setup>
import axios from "axios";
</script>
<template>
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="header__top__left">
            <ul>
              <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
              <li>Free Shipping for all Order of $99</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header__top__right">
            <div class="header__top__right__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <div class="header__top__right__language">
              <img src="/front_assets/img/language.png" alt="" />
              <div>English</div>
              <span class="arrow_carrot-down"></span>
              <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
              </ul>
            </div>
            <div v-if="!auth_user.id" class="header__top__right__auth">
              <a href="/login"><i class="fa fa-user"></i> Login</a>
            </div>
            <div v-if="auth_user.id" class="header__top__right__auth">
              <a href="/logout" @click.prevent="logout()"
                ><i class="fa fa-user"></i> Logout</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      auth_user: [],
    };
  },
  mounted() {
    axios.get("/check-auth").then((res) => {
      this.auth_user = res.data;
    });
  },
  methods: {
    logout() {
      axios.post("/logout").then((res) => {
        window.location.reload();
      });
    },
  },
};
</script>
<style>
</style>