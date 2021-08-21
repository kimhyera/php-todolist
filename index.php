<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="style.css" />

  <title>Todo List App - Pure Coding</title>
</head>

<body>
  <div id="app">
    <div class="wrapper">
      <h2 class="title">Todo List App</h2>
      <div class="inputFields">
        <input type="text" id="taskValue" placeholder="Enter a task." v-model="newTodoItem"
          v-on:keyup.enter="addTodo" />

        <button type="submit" id="addBtn" class="btn" v-on:click="addTodo"><i class="fa fa-plus"></i></button>


      </div>
      <div class="content">
        <ul id="tasks">
          <li v-for="(item, index) in todoItems" v-bind:key="item.title">
            <i class="btn-check fas fa-check" v-on:click="toggleComplete(item)"></i>
            <span class="text">{{ item.title }}</span>

            <i id="removeBtn" class="icon fa fa-trash" v-on:click="removeTodo(item)" v-bind:data-id="item.id"></i>
          </li>
        </ul>
      </div>

      <div class="data">{{ todoItems }}</div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
  var app = new Vue({
    el: '#app',
    data: function() {
      return {
        todoItems: [],
        newTodoItem: '', //동적으로 매핑이 됨 (동기화됨)
      };
    },
    methods: {
      loadTodo: function() {
        axios
          .get('show-tasks.php')
          .then(function(response) {
            app.todoItems = response.data;
            console.log(app.todoItems);
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      addTodo: function(value) {
        console.log('value', value);
        var obj = {
          completed: 0,
          title: this.newTodoItem,
        };

        console.log(obj);
        //obj 를 string 으로 바꿔줘야함.
        //데이터 전송

        axios
          .post('add-tasks.php', {

            completed: 0,
            title: this.newTodoItem,
          })
          .then(function(data) {
            console.log('asdf', data);
          })
          .catch(function(error) {
            console.log(error);
          });

        this.todoItems.push(obj);
      },

      removeTodo: function(item, index) {
        axios.delete('remove-task.php', {
            id: 'asdfafs'
          })
          .then(function(response) {
            // handle success
            console.log(response);
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          })



        this.todoItems.splice(index, 1);
      },


      toggleComplete: function() {

      }
    },

    created: function() {
      this.loadTodo();
    },
  });
  </script>
</body>

</html>