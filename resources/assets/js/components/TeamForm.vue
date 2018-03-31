<template lang="html">
  <div class="card">
    <div class="card-body">
      <h3>Create a your Team</h3>
      <form v-bind:action="'/tournaments/' + tournament.sport.slug + '/' + tournament.id" method="post">
        <div class="form-group">
          <label for="name">Team name:</label>
          <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>

        <div class="form-group">
          <label for="players[]">Player 1:</label>
          <div id="player1">
            <div class="playerBadge badge badge-info">
              <img v-bind:src="this.user.avatar_path" width="30" height="30">
              <div>{{ this.user.name }}</div>
            </div>
          </div>
          <input type="hidden" name="playersId[]" v-model="this.user.id" required/>
          <input type="hidden" name="players[]" v-model="this.user.name" required/>
        </div>

        <h5>You can use <code>@</code> to find your friends</h5>

        <div v-for="n in this.tournament.teamSize-1" class="form-group">
          <player :index="n+1"></player>
          <!-- <label for="players[]">Player {{ n+1 }}:</label>
          <div contenteditable="true" class="form-control" id="player1"></div>
          <input type="text" name="playersId[]" required/>
          <input type="text" name="players[]" required/> -->
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Player from './Player.vue';

export default {
  props: [
    'tournament',
    'user'
  ],

  components: { Player },

  mounted() {
    console.log(this.tournament);
  }
}
</script>

<style lang="css">
</style>
