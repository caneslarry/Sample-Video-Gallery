<template>
  <div>
    <b-container><b-row><b-col><h2>{{this.title}}</h2></b-col></b-row></b-container>
    <b-container><b-row><b-col><h3>{{this.description}}</h3></b-col></b-row></b-container>
      <b-container><b-row><b-col> <iframe width="600px" height="300px" :src="'https://fast.wistia.net/embed/iframe/' + this.video_id"></iframe></b-col></b-row></b-container>
  </div>
</template>

<script>
export default {
  data () {
    var videoSrc = '';
    return {
      videoSrc
    };
  },
  name: "VideoSummary",
  props:['video_id', 'title', 'description'],
  created () {
  }
}
</script>

<style scoped>
div.media iframe {

}
</style>
