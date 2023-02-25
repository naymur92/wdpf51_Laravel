<template>
  <div>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="hero__categories">
              <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span>All departments</span>
              </div>
              <ul>
                <li><a href="#">Fresh Meat</a></li>
                <li><a href="#">Vegetables</a></li>
                <li><a href="#">Fruit & Nut Gifts</a></li>
                <li><a href="#">Fresh Berries</a></li>
                <li><a href="#">Ocean Foods</a></li>
                <li><a href="#">Butter & Eggs</a></li>
                <li><a href="#">Fastfood</a></li>
                <li><a href="#">Fresh Onion</a></li>
                <li><a href="#">Papayaya & Crisps</a></li>
                <li><a href="#">Oatmeal</a></li>
                <li><a href="#">Fresh Bananas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="#">
                  <div class="hero__search__categories">
                    All Categories
                    <span class="arrow_carrot-down"></span>
                  </div>
                  <input type="text" placeholder="What do yo u need?" />
                  <button type="submit" class="site-btn">SEARCH</button>
                </form>
              </div>
              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>+65 11.188.888</h5>
                  <span>support 24/7 time</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section
      class="breadcrumb-section set-bg"
      data-setbg="/front_assets/img/breadcrumb.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Shopping Cart</h2>
              <div class="breadcrumb__option">
                <router-link to="/">Home</router-link>
                <span>Shopping Cart</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__table">
              <table>
                <thead>
                  <tr>
                    <th class="shoping__product">Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in cart_items" :key="item.id">
                    <td class="shoping__cart__item">
                      <img
                        :src="
                          '/assets/img/products/' + item.product.product_image
                        "
                        alt=""
                        class="cart-img"
                      />
                      <h5>{{ item.product.product_name }}</h5>
                    </td>
                    <td class="shoping__cart__price">Tk. {{ item.price }}</td>
                    <td class="shoping__cart__quantity">
                      <div class="quantity">
                        <div class="pro-qty">
                          <input type="text" :value="item.quantity" />
                        </div>
                      </div>
                    </td>
                    <td class="shoping__cart__total">
                      Tk. {{ item.price * item.quantity }}
                    </td>
                    <td class="shoping__cart__item__close">
                      <span class="icon_close"></span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__btns">
              <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
              <a href="#" class="primary-btn cart-btn cart-btn-right"
                ><span class="icon_loading"></span> Upadate Cart</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="shoping__continue">
              <div class="shoping__discount">
                <h5>Discount Codes</h5>
                <form action="#">
                  <input type="text" placeholder="Enter your coupon code" />
                  <button type="submit" class="site-btn">APPLY COUPON</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="shoping__checkout">
              <h5>Cart Total</h5>
              <ul>
                <li>
                  Subtotal <span>Tk. {{ subtotal }}</span>
                </li>
                <li>
                  Total <span>Tk. {{ total_price }}</span>
                </li>
              </ul>
              <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shoping Cart Section End -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      cart_items: [],
      cart_count: 0,
      subtotal: 0,
      discount: 0,
      total_price: 0,
    };
  },
  methods: {
    getCartItems() {
      axios.get("/cart-items").then((res) => {
        // console.log(res.data);
        this.cart_items = res.data;
        this.cart_count = res.data.length;
        this.calculateSubtotal();
        this.calculateTotalPrice();
      });
    },
    calculateSubtotal() {
      this.subtotal = this.cart_items.reduce(
        (a, c) => a + c.price * c.quantity,
        0
      );
    },
    calculateTotalPrice() {
      this.total_price = this.subtotal - this.discount;
    },
  },
  mounted() {
    this.getCartItems();
  },
};
</script>
<style>
.cart-img {
  width: 100px;
}
</style>