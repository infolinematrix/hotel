<template>
  <v-toolbar fixed app class="elevation-1">
      <v-toolbar-side-icon>
        <v-icon size="35" color='red'>brightness_high</v-icon>
      </v-toolbar-side-icon>
      <v-toolbar-title class='font-weight-bold' v-text="title"/>
      <v-spacer/>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat nuxt to="/">Home</v-btn>
        <v-btn flat nuxt to="single">Rooms</v-btn>
        <v-btn flat nuxt to="checkout">Checkout</v-btn>
        <v-btn flat>Contact</v-btn>
      </v-toolbar-items>
    </v-toolbar>
</template>

