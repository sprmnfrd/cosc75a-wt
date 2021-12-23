<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "New Product - Administrator");
?>
    <div class="container mt-3">
        <h1>Add New Product</h1>
        <form class="mt-4" action="./new-product.php" method="POST" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-light" name="new-product"><strong>Add New Product</strong></button>
                </div>
            </div>
        </form>
    </div>
<?php
    require("../templates/footer.php");

    if(isset($_POST["new-product"])) {
        $img = $_FILES["new-product-image"]["name"];
        $imgTmp = $_FILES["new-product-image"]["tmp_name"];
        $imgExt = pathinfo($img, PATHINFO_EXTENSION);
        $ext = array("gif", "png", "jpg", "jpeg");

        if(!isset($_POST["new-product-type"])) {
            echo '
                <script>
                    alert("Please select a product type.");
                </script>
            ';
        } else {
            if(!in_array($imgExt, $ext)) {
                echo '
                    <script>
                        alert("Please upload an image file.");
                    </script>
                ';
            } else {
                if($_POST["new-product-price"] == 0) {
                echo '
                    <script>
                        alert("Please set a price.");
                    </script>
                ';
                } else {
                    $duplicate = false;

                    $sql = "SELECT product_code, product_name FROM products";
                    $result = prepareSQL($conn, $sql);
                    while($resultRow = mysqli_fetch_array($result)) {
                        if($resultRow["product_code"] === $_POST["new-product-code"]) {
                            $duplicate = true;

                            echo '
                                <script>
                                    alert("Please enter a unique product code.");
                                </script>
                            ';

                            break;
                        }
                    }

                    if(!$duplicate) {
                        $rename = date('YmdHis').'_'.uniqid().'.'.$imgExt;
        
                        move_uploaded_file($imgTmp, "../../images/product_images/$rename");
                
                        $sql = "INSERT INTO products VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL)";
                        prepareSQL($conn, $sql, "ssiss", $_POST["new-product-code"], $_POST["new-product-name"], $_POST["new-product-type"], $_POST["new-product-desc"], $rename);
                
                        echo '
                            <script>
                                window.location.replace("dashboard.php");
                            </script>
                        ';
                    }
                }
            }
        }
    }