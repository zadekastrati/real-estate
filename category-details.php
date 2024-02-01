<?php
session_start();
require_once('config.php');

$sql = "SELECT * FROM properties";
$properties = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>
<?php include_once('includes/header.php');?>

<!-- Properties Section -->
<div class="properties padding-lr-100">
    <div class="title">
        <h1>Recent Properties</h1>
    </div>


    <?php
    foreach ($properties as $property) { ?>
        <div class="property w-33">
            <div class="image">
                <img src="uploads/<?php echo $property['photo']; ?>" alt="">
            </div>
            <div class="content">

                <a href="property.php" class="title">
                    <?php echo $property['title']; ?>
                </a>
                <div class="price">
                    <?php echo $property['price']; ?> &euro;
                </div>
                <div class="description">
                    <?php echo $property['description']; ?>
                </div>
                <i class="fa-regular fa-heart add-to-cart" style="cursor: pointer;"
                    data-product-id="<?php echo $property['id']; ?>"></i>
            </div>
            <div class="footer"></div>
        </div>
    <?php } ?>
</div>
<script src="assets/js/script.js"></script>

<?php include_once('includes/footer.php'); ?>