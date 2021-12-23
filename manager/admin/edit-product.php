<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Adminitstrator - WT");
?>
    <div class="container mt-3">
        <h1>Update Product</h1>
        <form class="mt-4" action="./edit-product.php" method="get">
            <div class="row">
                <div class="col-11">
                    <input class="form-control"type="text" name="update-search" list="product-list" placeholder="Search Product">
                    <datalist id="product-list">
                        <?php
                            $sql = "SELECT p.product_code AS product_code, p.product_name AS product_name FROM products AS p WHERE product_end_timestamp IS NULL AND p.product_type != 4";
                            $result = prepareSQL($conn, $sql);
                            while($resultRow = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="'.$resultRow["product_code"].'">'.$resultRow["product_name"].'</option>
                                ';
                            }
                        ?>
                    </datalist>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-light" name="search-product" value="search">Search</button>
                </div>
            </div>
        </form>
        <form class="mt-4" action="./edit-product.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-code"><h4>Product Code</h4></label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="new-product-code" id="new-product-code" autofocus required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-name"><h4>Product Name</h4></label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="new-product-name" id="new-product-name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-type"><h4>Product Type</h4></label>
                </div>
                <div class="col">
                    <select class="form-select" name="new-product-type" id="new-product-type" required>
                        <option selected disabled>--SELECT PRODUCT TYPE--</option>
                        <?php
                            $sql = "SELECT * FROM types WHERE type_name != 'DISCOUNT' ORDER BY type_name ASC";
                            $result = prepareSQL($conn, $sql);
                            while($rowResult = mysqli_fetch_array($result)) {
                                echo '<option value="'.$rowResult["type_id"].'">'.$rowResult["type_name"].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-image"><h4>Product Image</h4></label>
                </div>
                <div class="col">
                    <input type="file" class="form-control" name="new-product-image" id="new-product-image" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-price"><h4>Product Price</h4></label>
                </div>
                <div class="col">
                    <input type="number" class="form-control" name="new-product-price" id="new-product-price" min="0" value="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="col-form-label" for="new-product-desc"><h4>Product Description</h4></label>
                </div>
                <div class="col">
                    <textarea class="form-control" name="new-product-desc" id="new-product-desc"></textarea>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col inline-right">
                    <button type="submit" class="btn btn-light" name="new-product"><strong>Update Product</strong></button>
                </div>
            </div>
        </form>
    </div>
<?php
    require("../templates/footer.php");