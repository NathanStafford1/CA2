<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
     <br>
<?php
include('includes/header.php');
?>

<nav class="navbar navbar-light bg-light fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
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
              Team Stores
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
          
            <?php foreach ($categories as $category) : ?>
            <li><a class="btn btn-dark" href=".?category_id=<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
                <br>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
          </li>
        </ul>
        
      </div>
    </div>
  </div>
</nav>
        <h1>Add Jersey</h1>
        <form name='registration' action="add_record.php" method="post" enctype="multipart/form-data" class="row mb-3 form-control"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id" >
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label class="col-sm-2 col-form-label" for="userid">Name:</label>
            <input type="input" name="userid" id="userid" size="12" onBlur="userid_validation();"/><span id="uid_err"></span>
            <br>

            <label class="col-sm-2 col-form-label">List Price:</label>
            <input type="input" name="price">
            <br>
            
            <label class="col-sm-2 col-form-label">Quantity:</label>
            <input type="input" name="quantity">
            <br>
            
            <label class="col-sm-2 col-form-label">Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <br>
            <input  type="submit" value="Add Record" class="btn btn-success">
            <br>
        </form>
        
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>