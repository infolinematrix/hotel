<template>
  <v-app>
    <tool-bar></tool-bar>

    <template>
      <v-parallax src="image2.jpg" height="600" class="hidden-xs-only">
        <v-layout align-end column justify-center>
          <div class="pr-5">
            <h1 class="display-2 font-weight-bold mb-0">Budhha Park Residency</h1>
            <h4 class="subheading">Budhha Park, Ravangla, Sikkim</h4>

            <div class="mt-5">
              <v-layout align-center justify-center row>
                <div class="ml-5 text-md-center font-weight-bold subheading">
                  <v-icon color="red" size="50">local_hotel</v-icon>
                  <p>Accomodation</p>
                </div>
                <div class="ml-5 text-md-center font-weight-bold subheading">
                  <v-icon color="red" size="50">restaurant</v-icon>
                  <p>Fooding</p>
                </div>
                <div class="ml-5 text-md-center font-weight-bold subheading">
                  <v-icon color="red" size="50">live_help</v-icon>
                  <p>Travel Desk</p>
                </div>
              </v-layout>
            </div>
          </div>
        </v-layout>
      </v-parallax>
    </template>

    <v-content>
      <v-container grid-list-lg>
        <nuxt/>
      </v-container>
    </v-content>

      

      <v-footer class="footer bg-green">
        <app-footer></app-footer>
      </v-footer>

  </v-app>
</template>

<script>
import ToolBar from "~/components/ToolBar.vue"
import AppFooter from "~/components/Footer.vue"
export default {
  components: {
    ToolBar, 
    AppFooter
  },
  data() {
    return {
      text: 'BCD',
      items: [
        {
          icon: "apps",
          title: "Welcome",
          to: "/"
        },
        {
          icon: "bubble_chart",
          title: "Inspire",
          to: "/inspire"
        }
      ],
      title: "BUDDHA PARK RESIDENCY"
    };
  }
};
</script>
