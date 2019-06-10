<?php include 'includes/header.php'; ?>
<?php
//Create DB object
$db = new Database;

//Create query by giving category name too so combin them both using primary and foreign keys
$query = "SELECT posts.*, categories.ca_name FROM posts
          INNER JOIN categories
          ON posts.po_category = categories.ca_id
          ORDER BY posts.po_id DESC";

$posts = $db->select($query);

//Create Query
$query = "SELECT * FROM categories ORDER BY ca_id DESC";
//Run Query
$categories = $db->select($query);
?>
<!--Posts-->
<table class="table table-striped">
  <tr>
    <th>Post ID#</th>
    <th>Post Title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
  </tr>
    <?php while($row = $posts->fetch_assoc()):  ?>
    <!--Put tr in loops-->
    <tr>
      <td><?php echo  $row['po_id'];?></td>
      <td><a href="edit_post.php?id=<?php echo  $row['po_id'];?>"><?php echo  $row['po_title'];?></a></td>
      <td><?php echo  $row['ca_name'];?></td>
      <td><?php echo  $row['po_author'];?></td>
      <td><?php echo  formatDate($row['po_date']);?></td>
    </tr>
    <?php endwhile; ?>
</table>

<!--Categories-->
<table class="table table-striped">
  <tr>
    <th>Category ID#</th>
    <th>Category Title</th>
  </tr>
  <?php while($row = $categories->fetch_assoc()):  ?>
  <!--Put tr in loops-->
  <tr>
    <td><?php echo  $row['ca_id'];?></td>
    <td><a href="edit_category.php?id=<?php echo  $row['ca_id'];?>"><?php echo  $row['ca_name'];?></a></td>
  </tr>
  <?php endwhile; ?>
</table>
<?php include 'includes/footer.php'; ?>
