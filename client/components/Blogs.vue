<template>
    <v-layout row wrap justify-center align-center mt-5>
          <v-flex xs12 sm10 md10>
            <v-layout row wrap>
              <v-flex xs12 md6 v-for="blog in blogs" :key="blog">
                <v-card flat class="mb-3">
                  <v-layout>
                    <v-flex xs5>
                    <v-img :src="blog.image" contain class></v-img>
                    
                    </v-flex>
                    <v-flex xs7>
                      <v-card-title>
                        <div>
                          <div class="font-weight-medium" >
                            <nuxt-link :to="{path: '/blog/' + blog.slug}" class="title">{{ blog.title }}</nuxt-link>
                            </div>
                          <div class="text-muted">{{ blog.description }}</div>
                        </div>
                      </v-card-title>
                    </v-flex>
                  </v-layout>
                </v-card>
              </v-flex>
            </v-layout>
          </v-flex>
        </v-layout>
</template>

<script>
export default {
  data(){
    return{
      text: 'BCD',
      blogs: []
    }
  },

  mounted() {
    this.$axios.get("blogs").then(response => {
      this.blogs = response.data;
    });
  }
}
</script>
