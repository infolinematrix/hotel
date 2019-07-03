<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md12>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">{{ room.title }}</div>
          <div class="grey--text">{{ room.meta_description }}</div>
        </v-flex>
        <span></span>
        <div>{{ this.no_of_days }}</div>
        <v-flex xs12>
          <v-card flat>
            <v-layout row wrap>
              <v-flex xs12 md8>
                <v-card>
                  <v-carousel hide-delimiters height="400">
                    <v-carousel-item v-for="(item,i) in items" :key="i" :src="item"></v-carousel-item>
                  </v-carousel>
                  <v-card-title primary-title>
                    <div>
                      <h2 class="title mb-3">{{ room.title }}</h2>
                      <div class="grey--text">{{ room.description }}</div>
                    </div>
                  </v-card-title>

                  <v-card-text>
                    <div>
                      <div class="mb-3 body-2">Facilities, we are providing for your comfort..</div>
                    </div>

                    <v-layout row wrap>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">hotel</v-icon>
                          <p>Queen Bed (2+1)</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">live_tv</v-icon>
                          <p>Settelite Tv</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">hot_tub</v-icon>
                          <p>24 hours Hot water</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">kitchen</v-icon>
                          <p>Covered Almirah</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">touch_app</v-icon>
                          <p>Room Service</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">wifi</v-icon>
                          <p>24 Hours Internet</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">free_breakfast</v-icon>
                          <p>Tea Set</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center  pa-2">
                          <v-icon color="red" size="48" v-on="on">fastfood</v-icon>
                          <p>Breakfast</p>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4 class="fixed">
                <v-toolbar flat>
                  <v-toolbar-title>{{ room.title }}</v-toolbar-title>
                  <v-spacer></v-spacer>
                  <v-btn icon>
                    <v-icon>local_hotel</v-icon>
                  </v-btn>
                </v-toolbar>
                <v-card flat>
                  <v-flex xs12 class="text-xs-center pt-4 mb-4">
                    <div class="headline font-weight-bold red--text">
                      &#8377; {{ room.price }}
                      <span class="grey--text body-1">/ Per night</span>
                    </div>
                  </v-flex>
                  <v-divider></v-divider>
                  <v-form v-model="valid">
                    <v-container>
                      <v-layout row wrap>
                        <v-flex xs12 md6>
                          <v-menu
                            ref="from_date_menu"
                            v-model="from_date_menu"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="from_date"
                            lazy
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                          >
                            <template v-slot:activator="{ on }">
                              <v-text-field
                                v-model="from_date"
                                label="Check in"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                              ></v-text-field>
                            </template>
                            <v-date-picker v-model="from_date" no-title scrollable
                            :min="this.from_date"
                            >
                              <v-spacer></v-spacer>
                              <v-btn flat color="primary" @click="from_date_menu = false">Cancel</v-btn>
                              <v-btn
                                flat
                                color="primary"
                                @click="$refs.from_date_menu.save(from_date)"
                              >OK</v-btn>
                            </v-date-picker>
                          </v-menu>
                        </v-flex>

                        <v-flex xs12 md6>
                          <v-menu
                            ref="to_date_menu"
                            v-model="to_date_menu"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="to_date"
                            lazy
                            transition="scale-transition"
                            offset-y
                            full-width
                            min-width="290px"
                          >
                            <template v-slot:activator="{ on }">
                              <v-text-field
                                v-model="to_date"
                                label="Check out"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                              ></v-text-field>
                            </template>
                            <v-date-picker v-model="to_date" no-title scrollable
                            :min="this.from_date"
                            >
                              <v-spacer></v-spacer>
                              <v-btn flat color="primary" @click="to_date_menu = false">Cancel</v-btn>
                              <v-btn
                                flat
                                color="primary"
                                @click="$refs.to_date_menu.save(to_date)"
                              >OK</v-btn>
                            </v-date-picker>
                          </v-menu>
                        </v-flex>

                        <v-flex xs12 md6>
                          <v-select
                            label="Rooms"
                            prepend-icon="local_hotel"
                            v-model="no_room"
                            :items="room.no_of_rooms"
                            @change="selectRoom()"
                          ></v-select>
                        </v-flex>

                        <v-flex>{{ this.$moment(this.to_date).diff(this.$moment(this.from_date), 'days') }} Days</v-flex>

                        <v-flex xs12>
                          <v-btn
                            :disabled="btnDisable"
                            depressed
                            large
                            block
                            @click="checkAvailibility()"
                          >Check availibility</v-btn>
                        </v-flex>

                        <v-flex xs12 v-if="message">
                          <v-alert :type="this.message_type" :value="true">
                            <strong class="title"></strong>
                            {{ message }}
                          </v-alert>

                          <v-btn
                            v-if="this.available"
                            large
                            color="red"
                            dark
                            depressed
                            block
                            @click="addToCart()"
                          >Add to My Rooms</v-btn>
                        </v-flex>
                      </v-layout>
                    </v-container>
                  </v-form>
                </v-card>
              </v-flex>
            </v-layout>
          </v-card>
        </v-flex>
      </v-layout>
    </v-flex>
     <v-footer class="footer bg-green">
        <app-footer></app-footer>
      </v-footer>
  </v-layout>
</template>

<script>

export default {
  components: {},
  async asyncData({ params, $axios }) {
    return await $axios.get(`room/${params.roomtype}`).then(res => {
      return {
        room: res.data.node,
        items: res.data.node.images
      };
    });
  },
  data() {
    return {
      no_room: 1,
      no_rooms: [1, 2, 3, 4, 5, 6, 7],
      btnDisable: false,
      message: null,
      available: null,
      message_type: null,

      cart: {
        room_type: null,
        room_title: null,
        room_tariff: null,
        from_date: null,
        to_date: null,
        no_room: 0
      },
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

      //to_date: new Date().toISOString().substr(0, 10),
      to_date: new Date().toISOString().substr(0, 10),

      to_date_menu: false
    };
  },

  methods: {

 

    selectRoom() {
      this.btnDisable = false;
      (this.message = null), (this.available = null);
    },
    checkAvailibility() {
      let checkData = new FormData();
      checkData.append("type", this.room.id);
      checkData.append("from_date", this.from_date);
      checkData.append("to_date", this.to_date);
      checkData.append("no_room", this.no_room);

      this.$axios.post("/checkavailibulity", checkData).then(response => {
        if (response.data == "yes") {
          this.available = true;
          this.message_type = "info";
          this.message = "Rooms are Available in the date range";

          this.btnDisable = true;
        } else {
          this.message_type = "error";
          this.message = "No Rooms are Available in the date range";
          this.btnDisable = false;
        }
      });
    },
    addToCart() {
      this.cart.room_type = this.room.id;
      this.cart.room_title = this.room.title;
      this.cart.room_tariff = this.room.price;
      this.cart.from_date = this.from_date;
      this.cart.to_date = this.to_date;
      this.cart.no_of_rooms = this.no_room;

      this.cart.no_of_days = this.$moment(this.to_date).diff(
        this.$moment(this.from_date),
        "days"
      );

      this.$store.dispatch("cart/addToCart", this.cart);

      this.$router.push("checkout");
    },
    validateDate() {
      if (this.to_date)
        // as myDate can be null
        // you have to set the this.myDate again, so vue can detect it changed
        // this is not a caveat of this specific solution, but of any binding of dates
        var mydt = new Date(this.from_date.getDate() + 1);

      alert(mydt);
    }
  }
};
</script>
