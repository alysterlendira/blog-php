<?php include 'includes/header.php'; ?>
<?php
    //Create DB object
    $db = new Database();

    //************Posts Query**************
    //Create Query
    $query = "SELECT * FROM posts ORDER BY po_id DESC";
    //Run Query
    $posts = $db->select($query);

    //*********Categories Query************
    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);
?>
<?php if ($posts) : ?>
  <?php while ($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['po_title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['po_date']); ?> by <?php echo $row['po_author']; ?></p>
            <?php echo shortenText($row['po_body']); ?>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['po_id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
  <?php endwhile; ?>
<?php else : ?>
  <p>There are no posts yet</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
