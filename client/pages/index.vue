<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md12>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="display-2 font-weight-thin">Our Fevourite Rooms</div>
          <blockquote
              class="blockquote"
            >Buddha Park Residency at Ravangla is offering a splendid view of the snow-capped Kanchenjunga & Buddha Park. 
            With various classifications of rooms, the hotel caters to the luxurious traveller and to the ones seeking value for none.
            </blockquote>
        </v-flex>

        <v-flex xs12 md4 sm6 v-for="node in this.nodes" :key="node.id">
          <v-card height="425">
            <v-img :src="node.image" aspect-ratio="1.75"></v-img>
            <v-card-title primary-title>
              <h3 class="pa-0">
                <nuxt-link :to="node.slug" class="title">{{ node.title }}</nuxt-link>
              </h3>
            </v-card-title>
            <v-card-text class="pt-0">
              <div class="grey--text">{{ node.description }}</div>
            </v-card-text>

            <v-card-actions>
              <v-list-tile class="grow">
                <v-list-tile-content>
                  <v-list-tile-title class="title red--text font-weight-bold">
                    <span class="mr-1 title black--text">&#8377;</span>
                    {{ node.price }}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>

              <v-btn color="red" class="white--text text-capitalize" depressed nuxt :to="node.slug">
                View
                <v-icon right dark>local_hotel</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>

      <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="display-2 font-weight-thin">About Us</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
            <v-btn large color="red" dark depressed class="mt-3">Read more..</v-btn>
          </v-flex>
        </v-layout>
      </section>

      <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="display-2 font-weight-thin">Travel packages, we offer</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
          </v-flex>

          <v-layout row wrap>
            <v-flex md4 xs12 sm4 v-for="i in 3" :key="i">
              <v-card>
                <v-img src="https://cdn.vuetifyjs.com/images/cards/desert.jpg" aspect-ratio="1.75"></v-img>

                <v-card-title primary-title class="pb-0">
                  <div>
                    <h3 class="title font-weight-regular">{{ i }} Night Package tour</h3>
                  </div>
                </v-card-title>
                <v-card-text>
                  <div class="text-muted">Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</div>
                </v-card-text>

                <v-divider class="mb-3"></v-divider>

                <v-layout row wrap class="pl-3">
                  <v-flex md2 sm2>
                    <v-icon color="primary" size="35">location_on</v-icon>
                  </v-flex>
                  <v-flex md10 sm10>
                    <div class="title-2">Place cover</div>
                    <div
                      class="text-muted"
                    >Buddhya Park, XX monstry, Kuchipuri lake, Chardham templa</div>
                  </v-flex>
                </v-layout>

                <v-layout row wrap class="pl-3">
                  <v-flex md2 sm2>
                    <v-icon color="primary" size="35">directions_car</v-icon>
                  </v-flex>
                  <v-flex md10 sm10>
                    <div class="title-2">Car for your comfort</div>
                    <div
                      class="text-muted"
                    >Wognar, Bolero, Inova</div>
                  </v-flex>
                </v-layout>

                <v-card-actions class="pb-3">
                  <div class="pl-3">
                    <span class="title red--text font-weight-bold">1,250</span>
                    <span class="font-weight-thin ml-2" style="text-decoration: line-through;">2,250</span>
                  </div>
                  <v-spacer></v-spacer>
                  <v-btn depressed color="primary" nuxt to="contact">Book now</v-btn>
                </v-card-actions>
              </v-card>
            </v-flex>
          </v-layout>
        </v-layout>
      </section>

      <section>
        <v-layout row wrap justify-center align-center>
        <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="display-2 font-weight-thin">From our blog</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
          </v-flex>
        <blogs></blogs>
        </v-layout>
      </section>
    </v-flex>
  </v-layout>
</template>

<script>
import Blogs from "~/components/Blogs.vue";
export default {
  layout: "home",

  components: {
    Blogs
  },
  data() {
    return {
      text: "BCD",
      nodes: []
    };
  },

  mounted() {
    this.$axios.get("roomtypes").then(response => {
      this.nodes = response.data;
    });
  },

  head: {
    title: 'Buddha Park Residency | Best Hotel in Ravangla',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },

      // hid is used as unique identifier. Do not use `vmid` for it as it will not work
      { hid: 'description', name: 'description', content: 'Buddha Park Residency at Ravangla is offering a splendid view of the snow-capped Kanchenjunga & Buddha Park. With various classifications of rooms, the hotel caters to the luxurious traveller and to the ones seeking value for none.' }
    ]
  }
};
</script>
