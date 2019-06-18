<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md4>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">Payment</div>
          <div class="grey--text">Your Payment Status.</div>
        </v-flex>

        <v-flex xs12>
          <v-card>
                <v-alert :value="true" type="error">Transaction fail.</v-alert>
          </v-card>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>
