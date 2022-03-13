<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
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
        <h1 class="text-decoration-underline">Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data" class="form-control"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $records['categoryID']; ?>" >
            <br>

            <label class="input-group mb-3">Name:</label>
            <input type="input" name="name"
                   value="<?php echo $records['name']; ?>" id="userid" onBlur="userid_validation();"/><span id="uid_err"></span>
            <br>

            <label class="input-group mb-3">List Price:</label>
            <input type="input" name="price"
                   value="<?php echo $records['price']; ?>" id="passid" onBlur="passwd_validation();"><span id="passwd_err"></span>
            <br>

            <label class="input-group mb-3">Quantity:</label>
            <input type="input" name="quantity"
                   value="<?php echo $records['quantity']; ?>"  id="quantity" onBlur="quantity_validation();"><span id="quantity_err"></span>
            <br>

            <label class="input-group mb-3">Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="btn btn-success">
            <br>
        </form>
        <p><a href="index.php" class="btn btn-success">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>