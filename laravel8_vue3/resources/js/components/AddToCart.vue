<template>
  <li>
    <a href="#" @click.prevent="addProductToCart()"
      ><i class="fa fa-shopping-cart"></i
    ></a>
  </li>
</template>
<script>
export default {
  data() {
    return {};
  },
  props: ["prodId"],
  methods: {
    addProductToCart() {
      // alert(this.prodId);
      axios.post("/cart-items", { product_id: this.prodId }).then((res) => {
        // console.log(res.data);
        if (res.data.success) {
          alert(res.data.msg);
        } else {
          alert(res.data.msg);
          if (res.data.error_login) {
            window.location.href = "/login";
          }
        }
      });
    },
  },
};
</script>
<style>
</style>