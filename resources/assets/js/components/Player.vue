<template>
  <div class="form-group">
    <label for="players[]">Player {{this.index}}:</label>
    <div contentEditable="true" class="form-control" v-bind:id="'player' + index" name="players[]" rows="1" style="resize: none" required></div>
  </div>
</template>

<script>
import 'jquery.caret';
import 'at.js';

export default {
  props: ['index'],

  mounted() {
    let id = "#player" + this.index;
    $(id).atwho({
      at: "",
      headerTpl: "<h4>Select a user</h4>",
      insertTpl: "<b>${name}</b>",
      displayTpl: "<li>${name} <small>${email}</small></li>",
      // data:['Peter', 'Tom', 'Anne']
      delay: 750,
      callbacks: {
        remoteFilter: function(query, callback) {
          $.getJSON("/vue/users", {name: query}, function(usernames) {
            callback(usernames)
          });
        }
      }
    });
  }
}
</script>
