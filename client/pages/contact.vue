<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md10>
      <v-layout row wrap justify-center align-center class="mt-5">
        <v-flex xs12 md10 class="text-xs-center">
          <div class="display-1 font-weight-thin">Reach us</div>
          <blockquote
            class="blockquote"
          >Our experienced team of chefs prepare all of the dishes in our restaurants daily from scratch, using carefully sourced ingredients. We pride ourselves on our food, our service and our people.</blockquote>
        </v-flex>
      </v-layout>

      <v-layout row wrap>
        <v-flex xs12 md7>
          <v-card>
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
                  <v-btn type="submit" large color="red" depressed block dark>Submit</v-btn>
                </v-flex>
              </v-layout>
            </v-container>
          </v-form>
          </v-card>
        </v-flex>
        <v-flex xs12 md5 class="pa-5">
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
          
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import Form from "vform";
import VeeValidate from "vee-validate";
import swal from "sweetalert2";
import { mapGetters } from "vuex";
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
      })
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
    },
    contact() {
      (this.dialog = true),
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$axios.post("/contact", this.form).then(response => {
              swal.fire({
                title:
                  "Thank you for contact us. As early as possible  we will contact you",
                type: "success",
                animation: true,
                showCloseButton: true
              });
            });

            this.dialog = false;
          } else {
            this.dialog = false;
          }
        });
    }
  },
  head: {
    title: "Contact Us | Buddha Park Residency, Ravangla",
    meta: [
      // hid is used as unique identifier. Do not use `vmid` for it as it will not work
      {
        hid: "description",
        name: "description",
        content:
          "Contact Buddha Park Residency at Ravangla, Sikkim"
      }
    ]
  }
};
</script>
