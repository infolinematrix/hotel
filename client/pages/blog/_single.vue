<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md8>
      <v-card class="mx-auto">
        

        <v-card-text>
          <v-card-title class="title">{{ blog.title }}</v-card-title>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  
  data() {
    return {
      blog: null
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
  },

  mounted() {
    this.$axios.get("blog/" + this.$route.params.single).then(response => {
      this.blog = response.data.node;
      console.log(this.blog.title);
    });

    
  }
};
</script>
