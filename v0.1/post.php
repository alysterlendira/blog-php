<?php include 'includes/header.php'; ?>
<?php
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
  <div class="blog-post">
    <h2 class="blog-post-title"><?php echo $post['po_title']; ?></h2>
    <p class="blog-post-meta"><?php echo formatDate($post['po_date']); ?> by <?php echo $post['po_author']; ?></p>
      <?php echo $post['po_body']; ?>
  </div><!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>
