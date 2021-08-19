<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" type="text/css" href="style.css" />

  <title>Todo List App - Pure Coding</title>
</head>

<body>
  <div class="wrapper">
    <h2 class="title">Todo List App</h2>
    <div class="inputFields">
      <input type="text" id="taskValue" placeholder="Enter a task." />
      <button type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>
    </div>
    <div class="content">
      <ul id="tasks"></ul>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
  $(document).ready(function() {
    // Show Tasks
    function showData() {
      $.ajax({
        url: 'show-tasks.php',
        type: 'post',
        success: function(result) {
          $("#tasks").html(result);
        }
      });
    }
    showData();
    // Add Task

    $("#addBtn").on("click", function(e) {
      e.preventDefault();
      var title = $("#taskValue").val();

      console.log(title);

      $.ajax({
        url: 'add-tasks.php',
        type: 'post',
        data: {
          title: title,
          completed: 0
        },
        success: function(result) {
          showData();
          if (result == 1) {
            $("#taskValue").val('');
            alert("Todo List Added Successfully.");

          } else {
            console.log(result);
          }
        }
      });
    });


    // Remove Task


    $(document).on("click", "#removeBtn", function() {
      id = $(this).data("id");
      element = $(this);

      $.ajax({
        url: 'remove-task.php',
        type: 'post',
        data: {
          id: id
        },
        success: function(result) {
          if (result == 1) {
            showData();
          }
        }
      });
    });
  });
  </script>
</body>

</html>