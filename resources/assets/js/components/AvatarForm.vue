<template>
  <div>
    <div class="avatarContainer">
      <img :src="avatar" width="200" height="200">
      <form v-if="canUpdate" method="post" enctype="multipart/form-data">
        <label for="avatar" v-on:click="openDialog"><i class="fas fa-upload"></i>Change picture</label>
        <image-upload id="fileInput" name="avatar" @loaded="onLoad"></image-upload>
      </form>
    </div>

    <h1 v-text="user.name"></h1>

  </div>
</template>

<script>
import ImageUpload from './ImageUpload.vue';

export default {
  props: ['user'],

  components: { ImageUpload },

  data() {
    return {
      avatar: this.user.avatar_path
    };
  },

  computed: {
    canUpdate() {
      return this.authorize(user => user.id === this.user.id)
    }
  },

  methods: {
    openDialog() {
      $('#fileInput').trigger('click');
    },

    onLoad(avatar) {
      this.avatar = avatar.src;
      this.persist(avatar.file);
    },

    persist(avatar) {
      let data = new FormData();

      data.append('avatar', avatar);

      axios.post(`/users/${this.user.id}/avatar`, data)
           .then(() => flash('Picture uploaded!'));
    }
  }
}
</script>
