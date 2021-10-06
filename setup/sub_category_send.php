<?php
    if (isset($_POST['subCategoryName'])) {
        include '../includes/config.php';
        $sCategoryName = $_POST['sCategoryName'];
        $subCategoryName = $_POST['subCategoryName'];
        $subCategoryStock = $_POST['subCategoryStock'];
        $subSategoryStatus = $_POST['subSategoryStatus'];
        $sendSubCategoryData = "";
        if ($sCategoryName == "" && $subCategoryName = "") {
            $sendSubCategoryData .= "category name and sub category name must be fill.";
        } else {
            // sub category name dublicacy check
            $checkSubCategoryNameDupSql = "SELECT * FROM ipos_sub_category WHERE sub_category_name = '{$subCategoryName}'";
            $checkSubCategoryNameDupQuery = mysqli_query($conn, $checkSubCategoryNameDupSql) or die("sub category action page query problems.");
            if (mysqli_num_rows($checkSubCategoryNameDupQuery) > 0) {
                $sendSubCategoryData .= "Sub Category Name Exist.";
            } else {
                $subCategoryInsertSql = "INSERT INTO ipos_sub_category (category_name, sub_category_name, sub_category_stock, sub_category_status)
                                        VALUES ('{$sCategoryName}', '{$subCategoryName}', '{$subCategoryStock}', '{$subSategoryStatus}')";
                if (mysqli_query($conn, $subCategoryInsertSql)) {
                    $sendSubCategoryData .= "Category Inserted";
                }
            }
        }        
        echo $sendSubCategoryData;
    } else {
        include '../includes/config.php';
        echo "Data can't be send" . mysqli_error($conn);
    }
?>