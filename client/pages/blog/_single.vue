<template>
  <v-layout row wrap justify-center align-center>
    <v-flex xs12 md7>
      <v-layout row wrap>
        <v-flex xs12 class="text-xs-center mb-4">
          <div class="headline font-weight-bold">{{ blog.title }}</div>
        </v-flex>
           <div v-html="blog.description">
           </div>

      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>

export default {
  components: {},
async asyncData({ params, $axios }) {
    return await $axios.get(`blog/${params.single}`).then(res => {
      return {
        blog: res.data.node
      };
    });
  },
data() {
    return {
     
    };
  },
 
};
</script>
