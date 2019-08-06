<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md8>
      <v-layout row wrap justify-center align-center class="mt-5">
        <v-flex xs12 md10 class="text-xs-center">
          <div class="display-1 font-weight-thin">{{ page.title }}</div>
        </v-flex>
      </v-layout>

      <v-layout row wrap>
        <blockquote class="blockquote" v-html="page.content"></blockquote>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  components: {},
  async asyncData({ params, $axios }) {
    return await $axios.get(`page/${params.single}`).then(res => {
      return {
        page: res.data,
        d: res.data
      };
    });
  },

  data() {
    return {
      d: []
    };
  },

  head: {
    title: "Buddha Park Residency, Ravangla",
    meta: [
      // hid is used as unique identifier. Do not use `vmid` for it as it will not work
      {
        hid: "description",
        name: "description",
        content:
          "Buddha Park Residency at Ravangla is having 17 luxury Rooms with modern facilities."
      }
    ]
  }
};
</script>
