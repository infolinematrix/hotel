<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md7>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">Contact Us</div>
        </v-flex>
        <v-form @submit.prevent="contact">
                <v-container>
                  <v-layout row wrap>
                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="form.firstname"
                        label="First name"
                        v-validate="'required'"
                        :error-messages="errors.collect('First Name')"
                        data-vv-name="First Name"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="form.lastname"
                        label="Last name"
                        v-validate="'required'"
                        :error-messages="errors.collect('Last Name')"
                        data-vv-name="Last Name"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="form.email"
                        label="Email"
                        v-validate="'required|email'"
                        :error-messages="errors.collect('Email')"
                        data-vv-name="Email"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md6>
                      <v-text-field
                        v-model="form.phone"
                        label="Phone"
                        v-validate="'required'"
                        :error-messages="errors.collect('Phone')"
                        data-vv-name="Phone"
                        required
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md12>
                      <v-text-field
                        textarea
                        rows="5"
                        v-model="form.message"
                        label="Message"
                        v-validate="'required'"
                        :error-messages="errors.collect('Message')"
                        data-vv-name="Message"
                        required
                      ></v-text-field>
                    </v-flex>

                    <div class="text-xs-center">
                      <v-dialog v-model="dialog" hide-overlay persistent width="300">
                        <v-card color="primary" dark>
                          <v-card-text>
                            Please stand by
                            <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
                          </v-card-text>
                        </v-card>
                      </v-dialog>
                    </div>

                    <v-flex xs12>
                      <v-btn
                        type="submit"
                        large
                        color="red"
                        depressed
                        block
                        dark
                      >Submit</v-btn>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-form>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import Form from "vform";
import VeeValidate from "vee-validate";
import swal from "sweetalert2";
export default {
  components: {},
  data() {
    return {
      dialog: false,
      valid: true,
      form: new Form({
       firstname: null,
       lastname: null,
       email: null,
       phone: null,
       message: null
    }),
    };
  },

  methods: {

      contact() {
      this.dialog = true,
      this.$validator.validateAll().then(result => {
        if (result) {
          this.$axios.post("/contact", this.form).then(response => {
          swal.fire({
                    title: "Thank you for contact us. As early as possible  we will contact you",
                    type: "success",
                    animation: true,
                    showCloseButton: true
             })
          });

          this.dialog = false;
        } else {
          this.dialog = false;
        }
      });

      }
  }
 
 
};
</script>
