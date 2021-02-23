<template>
  <div id="app">
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">AlgeCal</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="/videos">Videos</b-nav-item>
          <b-nav-item href="/login" v-if="!this.$store.state.isLoggedIn">Login</b-nav-item>
          <b-nav-item href="#" v-if="this.$store.state.isLoggedIn" v-on:click.prevent="logout">Logout</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <Nuxt />

    <!-- Footer -->
    <mdb-footer color="blue" class="font-small pt-4 mt-4">
      <div class="footer-copyright text-center py-3">
        <mdb-container fluid>
          &copy; {{ new Date().getFullYear() }} Larry Hussey
        </mdb-container>
      </div>
    </mdb-footer>
    <!-- Footer -->
  </div>
</template>
<script>
import { mdbFooter, mdbContainer, mdbRow, mdbCol } from 'mdbvue';

export default {
  components: {
    mdbFooter,
    mdbContainer,
    mdbRow,
    mdbCol
  },

  data () {
    return {
    };
  },
  created () {
    this.$store.state.isLoggedIn = false;
  },
  methods:{
    logout: function () {
      this.$store.state.isLoggedIn = false;
      this.$router.push('login');
    }
  }
}
</script>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');

html, body, div, p {
  font-family: 'Roboto', sans-serif;
}
html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}

.bg-info{
  background-color: #042f25 !important;
}
</style>
