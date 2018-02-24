<template>
  <div class="form-group">
    <label>Player {{this.index}}:</label>
    <div v-bind:id="'player' + index + 'container'">

    </div>
    <div v-bind:id="'player' + index + 'group'" class="input-group">
      <div contentEditable="true" class="form-control" v-bind:id="'player' + index" name="players[]"></div>
      <div class="input-group-append">
        <button v-on:click="addGuest" class="btn btn-outline-secondary" type="button">Add</button>
      </div>
    </div>
    <!-- <div contentEditable="true" class="form-control" id="inputor"></div> -->

    <input type="text" name="playersId[]" v-bind:id="'player' + index + 'id'" required/>
    <input type="text" name="players[]" v-bind:id="'player' + index + 'name'" required/>
  </div>
</template>

<script>
import 'jquery.caret';
import 'at.js';

export default {
  props: ['index'],

  data() {
    return {

    }
  },

  mounted() {
    let id = "#player" + this.index;
    $(id + "container").hide();
    this.linkAt();
  },

  methods: {
    hideInput() {
      console.log("hideInput");
      let id = "#player" + this.index
      $(id + "group").hide();
      $(id + "container").show();
    },

    showInput() {
      console.log("showInput");
      let id = "#player" + this.index
      $(id).html('');
      $(id + "id").val("");
      $(id + "name").val("");
      $(id + "container").hide();
      $(id + "group").show();
    },

    addGuest() {
      console.log("addGuest");

      let id = "#player" + this.index;
      let self = this;

      let div = document.createElement("div");
      div.className = "playerBadge badge badge-success";
      let img = document.createElement("img");
      img.src = '/img/avatars/default.png';
      img.width = 30;
      img.height = 30;
      div.appendChild(img);
      let small = document.createElement("small");
      small.innerHTML = "(GUEST)";
      div.appendChild(small);
      let span = document.createElement("div");
      span.innerHTML = $(id).html();
      div.appendChild(span);
      let i = document.createElement("i");
      i.className = "fas fa-times";
      i.onclick = function() {
        console.log("close");
        self.showInput();
      }
      div.appendChild(i);

      $(id + "container").html(div);

      this.hideInput();
    },

    linkAt() {
      console.log("linkAt");
      let id = "#player" + this.index;
      let self = this;
      $(id).atwho({
        at: "@",
        headerTpl: "<h4>Select a user</h4>",
        insertTpl: "${id},${name},${avatar_path}",
        displayTpl: '<li><img src="${avatar_path}" width="30" height="30">${name}</li>',
        // data:['Peter', 'Tom', 'Anne']
        delay: 750,
        callbacks: {
          remoteFilter: function(query, callback) {
            $.getJSON("/vue/users", {name: query}, function(usernames) {
              callback(usernames)
            });
          },
          beforeInsert: function(value, $li) {
            console.log(this.id);
            let values = value.split(",");

            let div = document.createElement("div");
            div.className = "playerBadge badge badge-info";
            let img = document.createElement("img");
            img.src = values[2];
            img.width = 30;
            img.height = 30;
            div.appendChild(img);
            let span = document.createElement("div");
            span.innerHTML = values[1];
            div.appendChild(span);
            let i = document.createElement("i");
            i.className = "fas fa-times";
            i.onclick = function() {
              console.log("close");
              self.showInput();
            }
            div.appendChild(i);

            $("#" + this.id + "container").html(div);

            self.hideInput();

            let name = '';
            $("#" + this.id + "id").val(values[0]);
            $("#" + this.id + "name").val(values[1]);
            // $("#" + this.id).blur();
            // $("#" + this.id).attr("contenteditable", false);
            return name;
          }
        }
      });
    }
  }
}
</script>
