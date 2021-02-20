<template>
  <div class="container">
    <div>
      <b-card>
        aaaasWelcome To Our Video Library, Please Log In

        <b-form @submit="onSubmit">
          <b-form-group
            id="input-group-1"
            label="Username:"
            label-for="input-1"
          >
            <b-form-input
              id="input-1"
              v-model="form.username"
              type="username"
              required
              placeholder="Enter username"
            ></b-form-input>
          </b-form-group>
          <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
      </b-card>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: ''
      },
    };
  },
  methods: {
    onSubmit(){
      //console.log('A form was submitted');
      const nations = this.http.get<Nation[]>( 'assets/data.json' )
        .pipe()
        .subscribe( (nations:Nation[]) => {
          this.nations = nations ? nations : [];
          this.changeDetectorRef.detectChanges();
        } );
    },
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
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
  font-size: 100px;
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
</style>
