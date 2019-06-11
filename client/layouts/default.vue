<template>
  <v-app>
    <tool-bar></tool-bar>

    <v-content>
      <v-container grid-list-lg :class="{'px-0': $vuetify.breakpoint.xsOnly }">
        <nuxt/>
      </v-container>
    </v-content>

    <v-footer app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import ToolBar from "~/components/ToolBar.vue";

export default {
  components: {
    ToolBar
  },

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
