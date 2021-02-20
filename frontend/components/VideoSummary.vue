<template>
  <div>
      <div>title: {{this.title}}</div>
      <div>description: {{this.description}}</div>
      <div><iframe :src="'https://fast.wistia.net/embed/iframe/' + this.video_id"></iframe></div>
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
    // Get details of video
    this.videoSrc = "https://fast.wistia.net/embed/iframe/" + this.$props.video_id;
  }
}
</script>

<style scoped>

</style>
