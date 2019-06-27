<template>
  <v-app>
    <tool-bar></tool-bar>

    <v-content>
      <v-container grid-list-lg :class="{'px-0': $vuetify.breakpoint.xsOnly }">
        <nuxt/>
      </v-container>
    </v-content>

     <v-footer class="footer bg-green">
        <app-footer></app-footer>
      </v-footer>
  </v-app>
</template>

<script>
import ToolBar from "~/components/ToolBar.vue";
import AppFooter from "~/components/Footer.vue"

export default {
  components: {
    ToolBar,
    AppFooter
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
