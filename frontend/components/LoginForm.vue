<template>
  <div class="container">
    <div>
      <b-card class="title">
        Welcome To Our Video Library, Please Log In
        <b-form>
          <b-form-group
            id="input-group-1"
            label="Username:"
            label-for="input-1"
          >
            <b-form-input
              id="username"
              v-model="form.username"
              type="text"
              required
              placeholder="Enter username"
              v-on:keyup="validateUsername()"
            ></b-form-input>
            <div id="username-live-feedback" class="invalid-feedback">Sorry, that username is not found.</div>
          </b-form-group>
          <b-button id="primary-button" v-on:click.prevent="onSubmit" type="submit" variant="primary" disabled>Login to
            View Videos
          </b-button>
        </b-form>
      </b-card>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name: "LoginForm",

  data() {
    return {
      form: {
        username: ''
      },
    };
  },
  created() {
  },
  methods: {
    validateUsername() {
      var element = document.getElementById("primary-button");
      if (this.form.username.length > 2) {
        element.disabled = false;
        element.classList.remove("disabled");
      } else {
        element.disabled = true;
        element.classList.add("disabled");
      }
    },
    onSubmit() {
      axios.get('http://localhost:8080/users')
        .then((response) => {
          var userExists = false;
          for (var i = 0; i < response.data.data.length; i++) {
            if (response.data.data[i].username === this.form.username) {
              userExists = true;
              this.$store.state.isLoggedIn = true;
              break;
            }
          }
          if (userExists) {
            //Take to videos
            this.$router.push('videos');
          } else {
            //Show message
            var element = document.getElementById("username");
            element.classList.add("is-invalid");
          }
        });
    },
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand',
  'Source Sans Pro',
  -apple-system,
  BlinkMacSystemFont,
  'Segoe UI',
  Roboto,
  'Helvetica Neue',
  Arial,
  sans-serif;
  display: block;
  font-weight: 300;
  font-size: 14px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

.btn-primary {
  background-color: #042E24;
  border-color: #042E24;
}

.btn-primary:hover {
  background-color: #042E24;
  border-color: #042E24;
}

.btn-primary.disabled, .btn-primary:disabled {
  background-color: #042E24;
  border-color: #042E24;
}
</style>
