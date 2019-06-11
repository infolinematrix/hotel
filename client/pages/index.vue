<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md12>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">Our Fevourite Rooms</div>
          <div
            class="grey--text"
          >Buddha Park Residency at Ravangla is having 17 luxury Rooms with modern facilities.</div>
        </v-flex>

        <v-flex xs12 md4 sm6 v-for="i in 3" :key="i">
          <v-card>
            <v-img src="room1.jpg" aspect-ratio="1.75"></v-img>
            <v-card-title primary-title>
              <h3 class="pa-0">
                <nuxt-link to="#" class="title">Super delux Room</nuxt-link>
              </h3>
            </v-card-title>
            <v-card-text class="pt-0">
              <div
                class="grey--text"
              >Large sized Room with twin/triple bed, chairs, intercom telephone, wardrobe, TV with Set top box, free WiFi.</div>
            </v-card-text>

            <v-card-actions>
              <v-list-tile class="grow">
                <v-list-tile-content>
                  <v-list-tile-title class="title red--text font-weight-bold">
                    <span class="mr-1 title black--text">&#8377;</span>2500
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>

              <v-btn color="red" class="white--text" depressed>
                Book Now
                <v-icon right dark>local_hotel</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>

      <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="headline font-weight-bold">About Us</div>
            <blockquote class="blockquote">Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
            <v-btn large color="red" dark depressed class="mt-3">Read more..</v-btn>
          </v-flex>

        </v-layout>
      </section>
    </v-flex>
  </v-layout>
</template>

<script>

export default {

  layout: "home",
 data() {
    return {
      nodes:[]
    };
  },

mounted() {
    this.$axios.get("roomtypes").then(response => {
      this.nodes = response.data;

      console.log(this.nodes);

    });
  }
};
</script>
