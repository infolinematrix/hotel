<template>
  <v-layout row>
    <v-container fluid grid-list-lg :class="{'px-0': $vuetify.breakpoint.xsOnly }">
      <v-flex>
        <v-card>
          <v-toolbar flat>
            <v-toolbar-title class="title">Travel package Name</v-toolbar-title>
          </v-toolbar>

          <v-card-text>
            <v-layout row wrap>
              <v-flex xs12 md6>
                <v-menu
                  v-model="menu2_dt"
                  :close-on-content-click="false"
                  full-width
                  max-width="290"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      :value="computedDateFormattedDatefns_dt"
                      clearable
                      label="Checkin"
                      readonly
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="date_dt" @change="menu2_dt = false"></v-date-picker>
                </v-menu>
              </v-flex>
            </v-layout>

            <v-layout row>
              <v-flex xs6 md6>
                <v-text-field label="Adult" required></v-text-field>
              </v-flex>
              <v-flex xs6 md6>
                <v-text-field label="Child ( < 10 years)" required></v-text-field>
              </v-flex>
            </v-layout>

            <v-layout row>
              <v-flex>
                <v-text-field label="Select Type" required></v-text-field>
              </v-flex>
            </v-layout>

            <v-layout row>
              <v-flex xs12 md6>
               
              </v-flex>
              <v-flex xs12 md6>
                <v-btn large color="primary" depressed>Submit Requrest</v-btn>
              </v-flex>
            </v-layout>
          </v-card-text>

          <v-divider></v-divider>
        </v-card>
      </v-flex>
    </v-container>
  </v-layout>
</template>
<script>
import moment from "moment";
export default {
  layout: "empty",

  data: () => ({
    date_dt: new Date().toISOString().substr(0, 10),
    menu2_dt: false
  }),

  computed: {
    computedDateFormattedDatefns_dt() {
      return this.date_dt ? moment(this.date_dt).format("DD/MM/YYYY") : "";
    }
  }
};
</script>
