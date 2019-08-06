<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md12>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="display-1 font-weight-thin">Our Fevourite Rooms</div>
          <blockquote class="blockquote">
            Buddha Park Residency at Ravangla is offering a splendid view of the snow-capped Kanchenjunga & Buddha Park.
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
            <div class="display-1 font-weight-thin">About Us</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
            <v-btn large color="red" dark depressed class="mt-3">Read more..</v-btn>
          </v-flex>
        </v-layout>
      </section>
<v-divider></v-divider>

      <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center">
            <div class="display-1 font-weight-thin">From our blog</div>
            <blockquote
              class="blockquote"
            >Explore our blog for impactful resources, insightful articles, personal reflections and ideas that inspire action on the topics you care about.</blockquote>
          </v-flex>
          <blogs></blogs>
        </v-layout>
      </section>
<v-divider></v-divider>

      <section>
        
        <v-layout row wrap justify-center align-center class="mt-5">
          <v-flex xs12 md10 class="text-xs-center">
            <div class="display-1 font-weight-thin">Our Restaurant</div>
            <blockquote
              class="blockquote"
            >Our experienced team of chefs prepare all of the dishes in our restaurants daily from scratch, using carefully sourced ingredients. We pride ourselves on our food, our service and our people.</blockquote>
          </v-flex>
        </v-layout>
        <v-layout row wrap justify-center align-center class="mt-3">
          <v-flex xs12 md10>
            <v-layout row wrap>
              <v-flex xs12 md7>
                <v-img src="/restaurant.jpg" alt></v-img>
              </v-flex>
              <v-flex xs12 md5>
                <div class="blockquote">
                  Welcome to the
                  <strong>Bonolata Restaurant</strong>
                  . We have been the premier destination for delicious Indian dining in Rabangla, Sikkim.
                  Since its opening, restaurant India has been constantly evolving, so it is no wonder that the place serving the most exotic dishes in town.
                  We specialize in TANDOOR (clay oven), Chainees, Continental, Bengali dishes.
                  We have over 50 dishes to chose from whether you are vegetarian or non-vegetarian. So come on in and enjoy our fresh, flavorful, and delicious dishes today !!!

                  <p>
                    <strong>“Be happy – food is happiness“ </strong>
                  </p>
                </div>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-layout>
      </section>
    </v-flex>
  </v-layout>
</template>

<script>
import Blogs from "~/components/Blogs.vue";
import TravelPackage from "~/components/TravelPackage.vue";
export default {
  layout: "home",

  components: {
    Blogs,
    TravelPackage
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
    title: "Buddha Park Residency | Best Hotel in Ravangla",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },

      // hid is used as unique identifier. Do not use `vmid` for it as it will not work
      {
        hid: "description",
        name: "description",
        content:
          "Buddha Park Residency at Ravangla is offering a splendid view of the snow-capped Kanchenjunga & Buddha Park. With various classifications of rooms, the hotel caters to the luxurious traveller and to the ones seeking value for none."
      }
    ]
  }
};
</script>
