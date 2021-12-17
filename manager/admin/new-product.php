<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Adminitstrator - WT")
?>
    <div id="content">
        <h1>Add New Product</h1>

        <form action="new-product.php" method="post" id="new-product" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="font-xlarge">Product Code</td>
                    <td><input type="text" class="border-round border-gray font-xlarge" size="50" name="new-product-code" autofocus required></td>
                </tr>
                <tr>
                    <td class="font-xlarge">Product Name</td>
                    <td><input type="text" class="border-round border-gray font-xlarge" size="50" name="new-product-name" required></td>
                </tr>
                <tr>
                    <td class="font-xlarge">Product Type</td>
                    <td>
                        <select class="border-round border-gray font-xlarge" name="new-product-type" required>
                            <option value="" selected disabled>--SELECT PRODUCT TYPE--</option>
                            <?php
                                $sql = "SELECT * FROM types WHERE type_name != 'DISCOUNT' ORDER BY type_name ASC";
                                $result = prepareSQL($conn, $sql);
                                while($rowResult = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$rowResult["type_id"].'">'.$rowResult["type_name"].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="font-xlarge">Product Image</td>
                    <td><input type="file" class="border-round font-xlarge" name="new-product-image" required></td>
                </tr>
                <tr>
                    <td class="font-xlarge">Product Description</td>
                    <td><textarea class="border-round border-gray" name="new-product-desc" cols="91" rows="10" required></textarea></td>
                </tr>
                <tr>
                   <td style="text-align: right !important;" colspan="2"><input type="submit" class="border-round border-gray font-xlarge" name="new-product" value="Add New Product"></td> 
                </tr>
            </table>
        </form>
    </div>
<?php
    require("../templates/footer.php");

    if(isset($_POST["new-product"])) {
        $img = $_FILES["new-product-image"]["name"];
        $imgTmp = $_FILES["new-product-image"]["tmp_name"];
        $imgExt = pathinfo($img, PATHINFO_EXTENSION);
        $ext = array("gif", "png", "jpg", "jpeg");

        if(in_array($imgExt, $ext)) {
            $rename = 'image_'.date('Y-m-d-H-i-s').'_'.uniqid().'.'.$imgExt;

            move_uploaded_file($img, "../images/product_images/$rename");

            $sql = "INSERT INTO products VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL)";
            prepareSQL($conn, $sql, "ssiss", $_POST["new-product-code"], $_POST["new-product-name"], $_POST["new-product-type"], $_POST["new-product-desc"], $rename);
        }
        else {
            echo '
                <script>
                    alert("Please upload an image file.");
                </script>
            ';
        }
    }