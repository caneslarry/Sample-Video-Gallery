<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1>ddddWelcome to Our Video Library</h1>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <select v-model="category">
            <option value="">-- All --</option>
            <option value="AlgaeCal">AlgaeCal</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <b-list-group v-for="video in videos" :key="video.id" >
            <b-list-group-item v-on:click="showVideo(video.id)" v-if="(selectedCategory === '') || (video.category === selectedCategory)">{{video.category}} {{ video.title }}</b-list-group-item>
          </b-list-group>
        </div>
      </div>
    </div>
    <VideoSummary
      v-if="isSelected"
      :video_id="currentVideo.video_id"
      :title="currentVideo.title"
      :description="currentVideo.description"
    ></VideoSummary>

  </div>
</template>

<script>
import axios from 'axios';
import VideoSummary from '../../components/VideoSummary.vue';

export default {
  name: "VideoList",
  data() {
    var isSelected = false;
    var category = '';
    var selectedCategory = '';
    return {
      videos: [],
      currentVideo: [],
      isSelected,
      category,
      selectedCategory
    };
  },
  watch: {
    'category': function(newVal, oldVal) {
      this.selectedCategory = newVal;
    }
  },
  beforeMount() {
    if(!this.$store.state.isLoggedIn)
    {
      this.$router.push('login');
    }
  },
  created () {
    // Get list of videos
    axios.get('http://localhost:8080/videos')
      .then((response) => {
        this.videos = response.data.data;
      });
  },
  components: {
    'current-video-summary':VideoSummary
  },
  methods: {
    onSubmit(){
      console.log('A form was submitted');
    },
    showVideo(id){
      alert(id);
      this.currentVideo = ["title","Hello world"];
      // Get list of videos
      axios.get('http://localhost:8080/videos/'+id)
        .then((response) => {
          this.currentVideo = response.data.data;
          console.log(response);
          this.isSelected = true;

        });
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
