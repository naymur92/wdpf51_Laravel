<script setup>
import axios from "axios";
</script>
<template>
  <div class="header__cart">
    <ul>
      <li>
        <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
      </li>
      <li>
        <a href="#"
          ><i class="fa fa-shopping-bag"></i> <span>{{ cart_count }}</span></a
        >
      </li>
    </ul>
    <div class="header__cart__price">
      item: <span>Tk. {{ total_price }}</span>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      cart_items: [],
      cart_count: 0,
      total_price: 0,
    };
  },
  methods: {
    getCartItems() {
      axios.get("/cart-items").then((res) => {
        // console.log(res.data);
        this.cart_items = res.data;
        this.cart_count = res.data.length;
        this.calculateTotalPrice();
      });
    },
    calculateTotalPrice() {
      this.total_price = this.cart_items.reduce(
        (a, c) => a + c.price * c.quantity,
        0
      );
    },
  },
  mounted() {
    this.getCartItems();
  },
};
</script>
<style>
</style>