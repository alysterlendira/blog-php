<?php include 'includes/header.php'; ?>
<?php
  //Create DB object
  $db = new Database();

  if (isset($_POST['submit'])) {
  //Assign Variables With Added Security to avoid harmful text people might submit
  $name = mysqli_real_escape_string($db->link,$_POST['name']);
  //Simple Validation
  if ($name == '') {
    //Set error
    $error = "Please fill in all the blanks";
  } else {
    $query = "INSERT INTO categories (ca_name) VALUES ('$name')";

    $update_row = $db->update($query);
  }

} ?>
<form role="form" action="add_category.php" method="post">
  <!--Title-->
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Category">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-default" />
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
<br>
</form>
<?php include 'includes/footer.php'; ?>
