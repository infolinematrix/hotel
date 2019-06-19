<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md7>
      <v-layout row wrap>
          <v-flex xs12 class="text-xs-center mb-4">
            <div class="headline font-weight-bold">Confirm your booking</div>
            <div class="grey--text">Confirm your booking.</div>
          </v-flex>

          <v-flex xs12>
            <v-card flat>
              <v-toolbar flat>
                <v-toolbar-title class="title">My Rooms ( {{ cart_counter }} )</v-toolbar-title>
                <v-spacer></v-spacer>
                <span class="body-2 mr-2">{{ total_amount }}</span>
                INR
              </v-toolbar>

              <v-list two-line>
                <v-list-tile v-for="cart in this.carts" :key="cart" avatar>
                  <v-list-tile-content>
                    <v-list-tile-title>{{ cart.room_title}}</v-list-tile-title>
                    <v-list-tile-sub-title>{{ cart.from_date }} - {{ cart.to_date }}</v-list-tile-sub-title>
                  </v-list-tile-content>

                  <v-list-tile-action>{{ cart.no_of_rooms }} Rooms @ ₹ {{ cart.room_tariff }}</v-list-tile-action>

                  <v-list-tile-action class="ml-4" style="width:50px"></v-list-tile-action>

                  <v-list-tile-action>
                    <strong>₹ {{ cart.room_tariff * cart.no_of_rooms * cart.no_of_days}}</strong>
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

          <v-flex xs12>
            <v-sheet class="d-flex" height="150">
              <v-layout justify-center align-center row fill-height>
                <v-flex md8 xs12>
                  <v-card flat>
                    <v-card-text>Do you want more room? click on Add Now button, we will assit you to choose best room for you.</v-card-text>
                    <v-card-footer>
                      <v-btn large depressed color="default" class="text-capitalize" nuxt to="rooms">Add Now</v-btn>
                    </v-card-footer>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-sheet>
          </v-flex>

          <v-flex xs12 v-if="cart_counter > 0">
            <v-divider inset></v-divider>
            <v-card flat>
              <v-toolbar flat dense>
                <v-toolbar-title class="title">Guest Information</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>

              <v-form v-model="valid" @submit.prevent="confirm_booking">
                <v-container>
                  <v-layout row wrap>
                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="cart.firstname"
                        label="First name"
                        v-validate="'required'"
                        :error-messages="errors.collect('First Name')"
                        data-vv-name="First Name"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="cart.lastname"
                        label="Last name"
                        v-validate="'required'"
                        :error-messages="errors.collect('Last Name')"
                        data-vv-name="Last Name"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="cart.email"
                        label="Email"
                        v-validate="'required|email'"
                        :error-messages="errors.collect('Email')"
                        data-vv-name="Email"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="cart.phone"
                        label="Phone"
                        v-validate="'required'"
                        :error-messages="errors.collect('Phone')"
                        data-vv-name="Phone"
                        required
                      ></v-text-field>
                    </v-flex>

                    <div class="text-xs-center">
                      <v-dialog v-model="dialog" hide-overlay persistent width="300">
                        <v-card color="primary" dark>
                          <v-card-text>
                            Please stand by
                            <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
                          </v-card-text>
                        </v-card>
                      </v-dialog>
                    </div>

                    <v-flex xs12>
                      <v-btn
                        type="submit"
                        large
                        color="red"
                        depressed
                        block
                        dark
                      >Confirm Booking &amp; Checkout</v-btn>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-form>
            </v-card>
          </v-flex>

      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";
import VeeValidate from "vee-validate";
import swal from "sweetalert2";
export default {
  components: {},
  data() {
    return {
      dialog: false,
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
        firstname: "Subha Sundar",
        lastname: "Das",
        email: "subha@gmail.com",
        phone: "9832893116",
        carts: []
      }
    };
  },
  computed: {
    ...mapGetters({
      carts: "cart/carts",
      cart_counter: "cart/cart_counter"
    }),

    total_amount() {
      var total = 0;

      this.carts.forEach(row => {
        total = Number(total) + Number(row.room_tariff);
      });

      return total;
    }
  },
  methods: {
    addToCart() {
      this.$store.dispatch("cart/addToCart", this.cart);
    },

    deleteCartItem(event) {
      this.$store.dispatch("cart/deleteFromCart", event);
    },

    confirm_booking() {
      this.dialog = true,
      this.cart.carts = this.carts;
      this.$validator.validateAll().then(result => {
        if (result) {
          this.$axios.post("/checkout/instamojo", this.cart).then(response => {
          
          
            if(response.data.error){
              alert("Something went wrong in Payment!")
            }

            
            window.location.replace(response.data.longurl)
            
            
           
            

          });
        } else {
          this.dialog = false;
        }
      });
    }
  }
};
</script>
