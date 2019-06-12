<template>
  <v-toolbar fixed app class="elevation-1">
      <v-toolbar-side-icon>
        <v-icon size="35" color='red'>brightness_high</v-icon>
      </v-toolbar-side-icon>
      
        <v-img src="logo.png" max-width="300"></v-img>
      
      <v-spacer/>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat nuxt to="/">Home</v-btn>
        <v-btn flat nuxt to="rooms">Book Room</v-btn>
        <v-btn flat nuxt to="checkout">Checkout</v-btn>
        <v-btn flat>Contact</v-btn>
      </v-toolbar-items>
    </v-toolbar>
</template>

