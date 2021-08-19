<?php
  include 'config.php';

  $sql = "SELECT * FROM tasks";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<li>
  <p><?php echo $row['title']; ?></p> <button id="delete" data-id="<?php echo $row['id']; ?>"><i
      class="fa fa-trash"></i></button>
</li>

<?php } }else { echo "<div style='text-align:center;'>Hooray, no task here.</div>"; } ?>