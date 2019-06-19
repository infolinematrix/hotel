<template>
    <v-layout row wrap justify-center align-center mt-5>
          <v-flex xs12 sm10 md10>
            <v-layout row wrap>
              <v-flex xs12 md6 v-for="i in 2" :key="i">
                <v-card flat v-for="item in 3" :key="item" class="mb-3">
                  <v-layout>
                    <v-flex xs5>
                      <v-img src="http://lorempixel.com/600/400/abstract/" contain class></v-img>
                    </v-flex>
                    <v-flex xs7>
                      <v-card-title>
                        <div>
                          <div class="font-weight-medium">Places to see at Ravangla, Sikkim</div>
                          <div class="text-muted">{{ text }}</div>
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
      text: 'BCD'
    }
  }
}
</script>
