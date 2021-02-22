<template>
  <div>
    <b-container>
      <b-row>
        <b-col><h2>Welcome To Our Video Library</h2></b-col>
      </b-row>
    </b-container>
    <div>
      <b-row v-if="!isSelected">
        <b-col class="col col-12">
          <select v-model="category">
            <option value="">-- All --</option>
            <option value="AlgaeCal">AlgaeCal</option>
          </select>
        </b-col>
      </b-row>
      <b-row v-if="!isSelected">
        <b-list-group v-for="video in videos" :key="video.id">
          <b-list-group-item
            v-on:click="showVideo(video.id)"
            v-if="(selectedCategory === '') || (video.category === selectedCategory)"
          >
            <b-container>
              <b-row>
                <b-col>
                  <div>
                    <iframe style="user-focus-pointer: none;"
                            :src="'https://fast.wistia.net/embed/iframe/' + video.video_id"></iframe>
                  </div>
                  <div class="title">{{ video.title }}</div>
                </b-col>
              </b-row>
            </b-container>
          </b-list-group-item>
        </b-list-group>
      </b-row>

      <div v-if="isSelected">
        <VideoSummary
          v-if="isSelected"
          :video_id="currentVideo.video_id"
          :title="currentVideo.title"
          :description="currentVideo.description"
        ></VideoSummary>
        <b-container>
          <b-row>
            <b-col><a href="#" v-on:click="goBack()"><< Back</a></b-col>
          </b-row>
        </b-container>
      </div>
    </div>
  </div>

</template>

<script>
import axios from 'axios';
import VideoSummary from './VideoSummary.vue';

export default {
  name: "VideoList",
  data() {
    var isSelected;
    var category = '';
    var selectedCategory = '';
    var key = '983ff28057d4e92892ff5f20ff3a82de0ee62ff183374b84133f371b0814ab24';
    return {
      videos: [],
      currentVideo: [],
      isSelected,
      category,
      selectedCategory,
      key
    };
  },
  watch: {
    'category': function (newVal, oldVal) {
      this.selectedCategory = newVal;
    }
  },
  beforeMount() {
    if (!this.$store.state.isLoggedIn) {
      this.$router.push('login');
    }
  },
  created() {
    // Get list of videos
    axios.get('http://localhost:8080/videos')
      .then((response) => {
        this.videos = response.data.data;
      });

  },
  components: {
    'current-video-summary': VideoSummary
  },
  methods: {
    onSubmit() {
      console.log('A form was submitted');
    },
    showVideo(id) {
      // Get list of videos
      axios.get('http://localhost:8080/videos/' + id)
        .then((response) => {
          this.currentVideo = response.data.data;
          console.log(response);
          this.isSelected = true;
        });
    },
    goBack() {
      // Get list of videos
      this.$router.push('videos');
      this.isSelected = false;
    },
  }
}
</script>

<style>

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
  font-size: 10px;
  color: #35495e;
  letter-spacing: 1px;
}

div.media iframe {
  width: 200px;
  height: 100px;
}

.list-group-item {
  max-width: 377px;
}
</style>
