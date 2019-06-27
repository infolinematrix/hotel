<template>
  <v-container grid-list-lg>
    <v-layout row wrap class="mb-5">
      <v-flex md6 xs12>
        <div class="title">{{ getSetting('site_title')}}</div>
        <div class="grey--text mt-2">{{ getSetting('address')}}</div>
        <v-layout row wrap class="mt-3">
          <v-flex class="pb-0 pt-0" v-for="page in this.pages" :key="page.id">
            <nuxt-link :to="{path: '/page/' + page.slug}">{{ page.title}}</nuxt-link>
          </v-flex>
        </v-layout>
      </v-flex>
      <v-flex md2 xs12></v-flex>
      <v-flex md4 xs12>
        <v-card flat class="transparent">
          <v-responsive>
            <v-list two-line class="transparent">
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon color="red">phone</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                  <v-list-tile-title>{{ getSetting('phone')}}</v-list-tile-title>
                  <v-list-tile-sub-title>Help Desk</v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-divider inset></v-divider>
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon color="red">email</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                  <v-list-tile-title>{{ getSetting('email_from_email')}}</v-list-tile-title>
                  <v-list-tile-sub-title>Mail us</v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </v-responsive>
        </v-card>
      </v-flex>
    </v-layout>
    <span>&copy; {{ new Date().getFullYear() }} {{ getSetting('site_title')}} - {{ getSetting('address')}}</span>
  </v-container>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      pages: []
    };
  },
  computed: {
    ...mapGetters({
      settings: "cart/settings"
    })
  },
  methods: {
    getSetting(varible) {
      let filtered = this.settings.filter(m => m.variable === varible);

      if (filtered.length > 0) return filtered[0].value;
    }
  },
  mounted() {
    this.$axios.get("pages").then(response => {
      this.pages = response.data;
    });
    this.$store.dispatch("cart/updateSettings");
  }
};
</script>

