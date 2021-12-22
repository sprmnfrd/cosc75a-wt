<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Administrator - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);
?>
    <div class="container">
        <h1>Products</h1>
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th class="inline-center">Code</th>
                    <th class="inline-center">Name</th>
                    <th class="inline-center">Type</th>
                    <th class="inline-center">Image</th>
                    <th class="inline-center">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT p.product_code, p.product_name, t.type_name AS product_type, p.product_image, p.product_description FROM products AS p, types AS t WHERE p.product_type=t.type_id AND product_end_timestamp IS NULL;";
                    $result = prepareSQL($conn, $sql);
                    if(mysqli_num_rows($result) < 1) {
                        echo '
                                <tr>
                                    <td class="inline-center" colspan=5>There are no products to show</td>
                                </tr>
                            ';
                    } else {
                        while($resultRow = mysqli_fetch_array($result)) {
                            echo '
                                <tr>
                                    <td class="inline-center">'.$resultRow["product_code"].'</td>
                                    <td class="inline-center">'.$resultRow["product_name"].'</td>
                                    <td class="inline-center">'.$resultRow["product_type"].'</td>
                                    <td class="inline-center"><a href="../../images/product_images/'.$resultRow["product_image"].'" target="blank">View Image</a></td>
                                    <td>'.$resultRow["product_description"].'</td>
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
<?php
    require("../templates/footer.php");