<?php


$title = 'Product List';
require($_SERVER['DOCUMENT_ROOT'] . '/header.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/DVD_discProduct.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/BookProduct.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/FurnitureProduct.php');
?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>Product List</h1>
                    </div>
                    <div class="col-auto">
                        <div class="buttons">
                            <a href="/add_product/"><button id="add">ADD</button></a>
                            <button type="submit" form="form" id="mass_delete">MASS DELETE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12">
                <form action="action.php" method="POST" id="form">
                    <div class="row">
                        <?php
                        $database = new database();

                        $sql = 'SELECT * FROM `products`';

                        $result = mysqli_query($database->link, $sql);

                        ?><pre><?print_r(mysqli_fetch_all($result));?></pre><?

                        while ($row = mysqli_fetch_assoc($result)):
                        ?>
                            <div class="col-3 mb-5">
                                <div class="product">
                                    <input type="checkbox" name="<?php echo $row['ID']; ?>" value="<?php echo $row['ID']; ?>">
                                    <?php foreach($row as $field): ?>
                                        <?php if($field !== NULL): ?>
                                            <p><?php echo $field; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
?>