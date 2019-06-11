<template>
  <v-app>

    <v-toolbar fixed app class="elevation-1">
      <v-toolbar-side-icon>
        <v-icon size="35" color='red'>brightness_high</v-icon>
      </v-toolbar-side-icon>
      <v-toolbar-title class='font-weight-bold' v-text="title"/>
      <v-spacer/>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat>Home</v-btn>
        <v-btn flat nuxt to="single">Rooms</v-btn>
        <v-btn flat>Contact</v-btn>
      </v-toolbar-items>
    </v-toolbar>
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

    <v-footer app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
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
