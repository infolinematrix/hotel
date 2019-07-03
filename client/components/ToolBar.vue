<template>
  <v-toolbar fixed app class="elevation-1">
    <v-toolbar-side-icon>
      <v-icon size="35" color="red">brightness_high</v-icon>
    </v-toolbar-side-icon>

    <v-img src="/logo.png" max-width="300"></v-img>

    <v-spacer />
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn flat nuxt to="/">Home</v-btn>
      <v-btn flat nuxt to="/rooms">Rooms</v-btn>
      <v-btn flat nuxt to="/contact">Contact</v-btn>
    </v-toolbar-items>

    <nuxt-link to="checkout">
      <v-badge right overlap>
        <template v-slot:badge>
          <span class="body-2">{{ cart_counter }}</span>
        </template>
        
        <v-icon color="grey lighten-1">shopping_cart</v-icon>
      </v-badge>
    </nuxt-link>
  </v-toolbar>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      cart_counter: "cart/cart_counter"
    })
  }
};
</script>


