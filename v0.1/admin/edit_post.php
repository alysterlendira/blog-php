<?php include 'includes/header.php'; ?>
<?php
    //Get ID from URL
    //Variables
    $id = $_GET['id'];
    //Create DB object
    $db = new Database();

    //************Posts Query**************
    //Create Query
    $query = "SELECT * FROM posts WHERE po_id = ".$id;
    //Run Query
    $post = $db->select($query)->fetch_assoc();

    //*********Categories Query************
    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);
?>
<!--FORM EDIT POST-->
<?php if (isset($_POST['submit'])) {
//Assign Variables With Added Security to avoid harmful text people might submit
$title = mysqli_real_escape_string($db->link,$_POST['title']);
$body = mysqli_real_escape_string($db->link,$_POST['body']);
$category = mysqli_real_escape_string($db->link,$_POST['category']);
$author = mysqli_real_escape_string($db->link,$_POST['author']);
$tags = mysqli_real_escape_string($db->link,$_POST['tags']);
//Simple Validation
if ($title == '' || $body == '' || $category == '' || $author == '') {
  //Set error
  $error = "Please fill in all the blanks";
} else {
  $query = "UPDATE posts
            SET
            po_title = '$title',
            po_body = '$body',
            po_category = '$category',
            po_author = '$author',
            po_tags = '$tags'
            WHERE po_id=".$id;

  $update_row = $db->update($query);
    }
  }
?>
<!--FORM DELETE POST-->
<?php if (isset($_POST['delete'])) {
  $query = "DELETE FROM posts WHERE po_id=".$id;

  $delete_row = $db->delete($query);
  }
?>
<!--If the GET value not in the URL You may add the id customised below in the form action-->
<form role="form" action="edit_post.php?id=<?php echo $id; ?>" method="post">
  <!--Title-->
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $post['po_title'];?>">
  </div>
  <!--Body-->
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body">
      <?php echo $post['po_body']; ?>
    </textarea>
  </div>
  <!--Category Select-->
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category">
      <?php while($row = $categories->fetch_assoc()) : ?>
              <!--Show the category appropriately when edit the post-->
              <?php if($row['ca_id'] == $post['po_category']) {
                  $selected = 'selected';
              } else {
                $selected = '';
              }
              ?>
              <!--echo out the categoy names with selected attribute-->
              <option value="<?php echo $row['ca_id']; ?>" <?php echo $selected; ?>><?php echo $row['ca_name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <!--Author-->
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['po_author'];?>">
  </div>
  <!--Tags-->
  <div class="form-group">
    <label>Tags</label>
    <input type="text" name="tags" class="form-control" placeholder="Enter Tags" value="<?php echo $post['po_tags'];?>">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-default" />
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input type="submit" name="delete" value="Delete" class="btn btn-danger" />
  </div>
<br>
</form>
<?php include 'includes/footer.php'; ?>
