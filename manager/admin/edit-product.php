<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Adminitstrator - WT");
?>
    <div class="container mt-3">
        <h1>Update Product</h1>
        <form class="mt-4" action="./edit-product.php" method="get">
            <div class="row">
                <div class="col-10">
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
                <div class="col">
                    <button type="submit" class="btn btn-light" name="search-product" value="search">Search</button>
                </div>
            </div>
        </form>
    </div>
<?php
    require("../templates/footer.php");