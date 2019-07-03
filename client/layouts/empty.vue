<template>
  <v-app style="background-color:white">
      <v-toolbar flat color="transparent">
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn flat>Go Home</v-btn>
    </v-toolbar-items>
  </v-toolbar>
    <v-content>
      <v-container fluid fill-height >
        <v-layout align-center justify-center column>
          <v-flex xs12 sm8 md6>
            <nuxt />
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  components: {},

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
