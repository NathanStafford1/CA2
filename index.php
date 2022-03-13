
<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<br>
<br>
<div class="bg-secondary bg-gradient p-5 text-dark bg-opacity-75">
<?php
include('includes/header.php');
?>
<nav class="navbar navbar-light bg-light fixed-top navbar-dark bg-dark" >
  <div class="container-fluid">
    <a class="navbar-brand navbar-dark bg-dark" href="index.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end navbar-dark bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" href = "index.php" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
          </table>
            <p><a class="btn btn-primary" href="add_record_form.php" >Add Record</a></p>
            <p><a class="btn btn-primary" href="category_list.php">Manage Categories</a></p>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Team stores
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
          
            <?php foreach ($categories as $category) : ?>
            <li><a class="btn" href=".?category_id=<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
                <br>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
          </li>
        </ul>
        </form>
      </div>
    </div>
  </div>
</nav>

<aside>
<!-- display a list of categories -->
</aside>

<section>
<table class="table table-striped table-bordered caption-top table-responsive sm shadow p-3 mb-5 bg-body rounded">
<caption><?php echo $category_name; ?></caption>
<tr>
<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Delete</th>
<th>Edit</th>
</tr>
<?php foreach ($records as $record) : ?>
<tr>
<td><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $record['name']; ?></td>
<td class="right"><?php echo $record['price']; ?></td>
<td class="right"><?php echo $record['quantity']; ?></td>
<td><form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<input type="submit" value="Delete" class="btn btn-danger" disabled>
</form></td>
<td><form action="edit_record_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<input type="submit" value="Edit" class="btn btn-success">
</form></td>
</tr>
<?php endforeach; ?>
</table>
</section>
<?php
include('includes/footer.php');
?>
