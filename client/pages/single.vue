<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md12>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">Super Delux Room</div>
          <div
            class="grey--text"
          >Buddha Park Residency at Ravangla is having 17 luxury Rooms with modern facilities.</div>
        </v-flex>

        <v-flex xs12>
          <v-card flat>
            <v-layout row wrap>
              <v-flex xs12 md8>
                <v-card>
                  <v-carousel hide-delimiters height="400">
                    <v-carousel-item v-for="(item,i) in items" :key="i" :src="item.src"></v-carousel-item>
                  </v-carousel>
                  <v-card-title primary-title>
                    <div>
                      <h2 class="title mb-3">Kangaroo Valley Safari</h2>
                      <div
                        class="grey--text"
                      >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous. Buddha Park Residency at Ravangla is having 17 luxury Rooms with modern facilities.</div>
                    </div>
                  </v-card-title>

                  <v-card-text>
                    <div>
                      <div class="mb-3 body-2">Facilities, we are providing for your comfort..</div>
                    </div>

                    <v-layout row wrap>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">hotel</v-icon>
                          <p>Queen Bed (2+1)</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">live_tv</v-icon>
                          <p>Settelite Tv</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">hot_tub</v-icon>
                          <p>24 hours Hot water</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">kitchen</v-icon>
                          <p>Covered Almirah</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">touch_app</v-icon>
                          <p>Room Service</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">wifi</v-icon>
                          <p>24 Hours Internet</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">free_breakfast</v-icon>
                          <p>Tea Set</p>
                        </div>
                      </v-flex>
                      <v-flex xs6 md3>
                        <div class="text-xs-center box pa-2">
                          <v-icon color="red" size="48" v-on="on">fastfood</v-icon>
                          <p>Breakfast</p>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4>
                <v-toolbar flat>
                  <v-toolbar-title>Book Room</v-toolbar-title>
                  <v-spacer></v-spacer>
                  <v-btn icon>
                    <v-icon>local_hotel</v-icon>
                  </v-btn>
                </v-toolbar>
                <v-card flat>
                  <v-flex xs12 class="text-xs-center pt-4 mb-4">
                    <div class="headline font-weight-bold red--text">
                      &#8377; 2500
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
                            :close-on-content-click="true"
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
                            <v-date-picker v-model="from_date" no-title scrollable></v-date-picker>
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
                                label="Check in"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                              ></v-text-field>
                            </template>
                            <v-date-picker v-model="to_date" no-title scrollable>
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

                        <v-flex xs12>
                          <v-btn large color="red" dark depressed block>Check availibility</v-btn>
                        </v-flex>

                        <v-flex xs12>
                          <v-alert type="info" :value="true"><strong class="title">8 </strong>Rooms are available in the date range.</v-alert>

                          <v-btn large color="red" dark depressed block>Book now</v-btn>
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

      <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="headline font-weight-bold">About Us</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
            <v-btn large color="green" dark depressed class="mt-3">Read more..</v-btn>
          </v-flex>
        </v-layout>
      </section>
    </v-flex>
  </v-layout>
</template>

<script>
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
      to_date_menu: false
    };
  },
  methods: {
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
