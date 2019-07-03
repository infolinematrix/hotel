 <template>
 <section>
        <v-layout row wrap justify-center align-center>
          <v-flex xs12 md10 class="text-xs-center mb-4">
            <div class="display-2 font-weight-thin">Travel packages, we offer</div>
            <blockquote
              class="blockquote"
            >Towering into the blue skies , against the enormous mountain ranges ,the massive Buddha statue spreads wonderful serenity on the ambience around it. The mighty kanchanjunga rises behind the statue playing hide and seek with the clouds . The park is enormous.</blockquote>
          </v-flex>

          <v-layout row wrap>
            <v-flex md4 xs12 sm4 v-for="travel in travel_packages" :key="travel">
              <v-card>
                <v-img :src="travel.image" aspect-ratio="1.75"></v-img>

                <v-card-title primary-title class="pb-0">
                  <div>
                    <h3 class="title font-weight-regular">{{ travel.title }}</h3>
                  </div>
                </v-card-title>
                <v-card-text>
                  <div class="text-muted">
                    {{ travel.description }}
                  </div>
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
                    >{{ travel.place_cover }}</div>
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
                    <span class="title red--text font-weight-bold">{{ travel.price }}</span>
                    <span class="font-weight-thin ml-2" style="text-decoration: line-through;">{{ travel.original_price }}</span>
                  </div>
                  <v-spacer></v-spacer>
                  <v-btn depressed color="primary" nuxt to="contact">Book now</v-btn>
                </v-card-actions>
              </v-card>
            </v-flex>
          </v-layout>
        </v-layout>
      </section>
      </template>
      <script>
export default {
  data(){
    return{
      text: 'BCD',
      travel_packages: [],
    }
  },

  mounted() {
    this.$axios.get("packages").then(response => {
      this.travel_packages = response.data;
    });
  }
}
</script>