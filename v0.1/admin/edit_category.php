<?php include 'includes/header.php'; ?>
<?php
    //Get ID from URL
    //Variables
    $id = $_GET['id'];
    //Create DB object
    $db = new Database();

    //************Posts Query**************
    //Create Query
    $query = "SELECT * FROM categories WHERE ca_id = ".$id;
    //Run Query
    $category = $db->select($query)->fetch_assoc();

    //*********Categories Query************
    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);
?>
<!--FORM EDIT CATEGORY-->
<?php if (isset($_POST['submit'])) {
//Assign Variables With Added Security to avoid harmful text people might submit
$name = mysqli_real_escape_string($db->link,$_POST['name']);
//Simple Validation
if ($name == '') {
  //Set error
  $error = "Please fill in all the blanks";
} else {
  $query = "UPDATE categories
            SET
            ca_name = '$name'
            WHERE ca_id=".$id;

  $update_row = $db->update($query);
    }
  }
?>
<!--FORM DELETE CATEGORY-->
<?php if (isset($_POST['delete'])) {
  $query = "DELETE FROM categories WHERE ca_id=".$id;

  $delete_row = $db->delete($query);
  }
?>
<form role="form" action="edit_category.php?id=<?php echo $id; ?>" method="post">
  <!--Title-->
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Category" value="<?php echo $category['ca_name']; ?>">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-default" />
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input type="submit" name="delete" value="Delete" class="btn btn-danger" />
  </div>
<br>
</form>
<?php include 'includes/footer.php'; ?>
