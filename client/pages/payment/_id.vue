<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md5>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">Payment</div>
          <div class="grey--text">Your Payment Status.</div>
        </v-flex>

        <v-flex xs12>
          <v-card>
            <v-alert :value="true" type="info">Transaction Successful.</v-alert>

            <v-card-text>
              <v-layout row fill-height justify-center align-center>
                <v-flex>Payment ID :</v-flex>
                <v-flex class="text-md-right body-2">{{ this.txn.payment_id}}</v-flex>
              </v-layout>

              <v-layout row wrap>
                <v-flex>Request ID :</v-flex>
                <v-flex class="text-md-right body-2">{{ this.txn.request_id}}</v-flex>
              </v-layout>
              <v-layout row wrap>
                <v-flex>Booking ID :</v-flex>
                <v-flex class="text-md-right body-2">{{ this.txn.id}}</v-flex>
              </v-layout>
            </v-card-text>

            <v-card-text>
              <v-btn large outline nuxt to="/">Go Home</v-btn>
            </v-card-text>
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
      txn: {
        id: '',
        payment_id: '',
        request_id: '',
      }
    };
  },

  mounted() {
    //$payment_request_id = this.$route.params.id;

    //alert(this.$route.params.id)
    
    this.$axios.get("/checkout/transaction/" + this.$route.params.id).then(txn => {
      //alert(txn.data.txn_id);
      this.txn.id = txn.data.booking_id, 
      this.txn.request_id = txn.data.payment_request_id, 
      this.txn.payment_id = txn.data.txn_id
    });
    
  }
};
</script>
