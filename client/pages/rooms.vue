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

        <v-flex xs12 md4 sm6 v-for="node in this.nodes" :key="node.id">
          <v-card>
            <v-img src="room1.jpg" aspect-ratio="1.75"></v-img>
            <v-card-title primary-title>
              <h3 class="pa-0">
                <nuxt-link :to="node.slug" class="title">{{ node.title }}</nuxt-link>
              </h3>
            </v-card-title>
            <v-card-text class="pt-0">
              <div
                class="grey--text"
              >{{ node.description }}</div>
            </v-card-text>

            <v-card-actions>
              <v-list-tile class="grow">
                <v-list-tile-content>
                  <v-list-tile-title class="title red--text font-weight-bold">
                    <span class="mr-1 title black--text">&#8377;</span>{{ node.price }}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>

              <v-btn color="red" class="white--text" depressed nuxt :to="node.slug">
                Book Now
                <v-icon right dark>local_hotel</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>

     
    </v-flex>
  </v-layout>
</template>

<script>

export default {

 data() {
    return {
      nodes:[]
    };
  },

mounted() {
    this.$axios.get("roomtypes").then(response => {
      this.nodes = response.data;
    });
  }
};
</script>
