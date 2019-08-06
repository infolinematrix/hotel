<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md8>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">{{ page.title }}</div>
        </v-flex>
           <blockquote
              class="blockquote" v-html="page.content">
           </blockquote>

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
        page: res.data
      };
    });
  },
data() {
    return {
     
    };
  },
 
};
</script>
