<?php
$title = 'Product Add';
require($_SERVER['DOCUMENT_ROOT'] . '/header.php');


require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Category.php');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Product Add</h1>
                </div>
                <div class="col-auto">
                    <div class="buttons">
                        <button type="submit" form="form" id="save">SAVE</button>
                        <a href="/"><button id="cancel">CANCEL</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12">
            <form action="action.php" method="POST" class="needs-validation" id="form" novalidate>
                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="productType" class="form-label">Type switcher</label>
                    <select class="form-select" id="productType" name="category_id" required>
                        <option selected disabled></option>
                        <?php
                        // получаем соединение с базой данных
                        $database = new database();
                        $link = $database->getConnection();

                        $category = new Category($link);

                        // читаем категории товаров из базы данных
                        $stmt = $category->read();

                        // помещаем их в выпадающий список
                        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_category);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                        <!--
                        <option value="DVD_discProduct">DVD-disc</option>
                        <option value="BookProduct">Book</option>
                        <option value="FurnitureProduct">Furniture</option>
                        -->
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3 product-type product-type-DVD_discProduct collapse">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" class="form-control" id="size" name="size">
                </div>
                <div class="mb-3 product-type product-type-BookProduct collapse">
                    <label for="size" class="form-label">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
                <div class="mb-3 product-type product-type-FurnitureProduct collapse">
                    <label for="length" class="form-label">Length</label>
                    <input type="text" class="form-control" id="length" name="length">
                </div>
                <div class="mb-3 product-type product-type-FurnitureProduct collapse">
                    <label for="width" class="form-label">Width</label>
                    <input type="text" class="form-control" id="width" name="width">
                </div>
                <div class="mb-3 product-type product-type-FurnitureProduct collapse">
                    <label for="height" class="form-label">Height</label>
                    <input type="text" class="form-control" id="height" name="height">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
?>