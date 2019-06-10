<?php include 'includes/header.php'; ?>
<?php
  //Create DB object
  $db = new Database();

  if (isset($_POST['submit'])) {
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
    $query = "INSERT INTO posts (po_title, po_body, po_category, po_author, po_tags)
              VALUES ('$title', '$body', $category, '$author', '$tags')";

    $insert_row = $db->insert($query);
  }

} ?>
<?php
    //*********Categories Query************
    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);
?>
<form role="form" action="add_post.php" method="post">
  <!--Title-->
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title">
  </div>
  <!--Body-->
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
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
              <!--We have to submit category ID so we gotta submit that which is selected-->
              <option selected<?php echo $selected; ?> value="<?php echo $row['ca_id'];?>"><?php echo $row['ca_name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <!--Author-->
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
  </div>
  <!--Tags-->
  <div class="form-group">
    <label>Tags</label>
    <input type="text" name="tags" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-default" />
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
<br>
</form>
<?php include 'includes/footer.php'; ?>
