<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md6>
      <v-layout row wrap>
        <div v-if="carts">
          <v-flex xs12 class="text-xs-center mb-4">
            <div class="headline font-weight-bold">Checkout</div>
            <div class="grey--text">Confirm your booking.</div>
          </v-flex>

          <v-flex xs12>
            <v-card flat>
              <v-toolbar flat>
                <v-toolbar-title class="title">Booking List</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon>1200</v-btn>
                <v-btn small flat @click="addToCart()">Add to Cart</v-btn>
              </v-toolbar>

              <v-list two-line>
                <v-list-tile v-for="cart in this.carts" :key="cart" avatar>
                  <v-list-tile-content>
                    <v-list-tile-title>Super Delux Room</v-list-tile-title>
                    <v-list-tile-sub-title>12/04/2019 - 18/04/2019</v-list-tile-sub-title>
                  </v-list-tile-content>

                  <v-list-tile-action class="mr-4">3 Days @ 1200</v-list-tile-action>

                  <v-list-tile-action>
                    <strong>₹3600.00</strong>
                  </v-list-tile-action>

                  <v-list-tile-action class="ml-4">
                    <v-btn icon ripple @click="deleteCartItem(event)">
                      <v-icon color="grey lighten-1">close</v-icon>
                    </v-btn>
                  </v-list-tile-action>
                </v-list-tile>
              </v-list>
            </v-card>
          </v-flex>
          <v-divider inset></v-divider>
          <v-flex xs12>
            <v-card flat>
              <v-toolbar flat dense>
                <v-toolbar-title class="title">Booking Info</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>

              <v-form v-model="valid">
                <v-container>
                  <v-layout row wrap>
                    <v-flex xs12 md6>
                      <v-text-field v-model="firstname" label="First name" required></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field v-model="lastname" label="Last name" required></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field v-model="firstname" label="Email" required></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field v-model="lastname" label="Phone" required></v-text-field>
                    </v-flex>

                    <v-flex xs12 md4></v-flex>
                  </v-layout>
                </v-container>
              </v-form>
            </v-card>
          </v-flex>
        </div>

        <v-flex xs12 class="text-xs-center mb-4" v-else>
          <div class="headline font-weight-bold grey--text">Sorry!</div>
          <div class="grey--text">You did not add any room.</div>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  components: {},
  data() {
    return {
      valid: true,
      items: [
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg"
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/sky.jpg"
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/bird.jpg"
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/planet.jpg"
        }
      ],
      from_date: new Date().toISOString().substr(0, 10),
      from_date_menu: false,

      to_date: new Date().toISOString().substr(0, 10),
      to_date_menu: false,
      cart: {
        room_type: 1,
        room_title: "Super Delux Room",
        room_tariff: 1250.0,
        no_of_days: 3
      }
    };
  },
  computed: {
    ...mapGetters({
      carts: "cart/carts"
    })
  },
  methods: {
    addToCart() {
      this.$store.dispatch("cart/addToCart", this.cart);
    },

    deleteCartItem(event){
      this.$store.dispatch("cart/deleteFromCart", event);
    }
  }
};
</script>
