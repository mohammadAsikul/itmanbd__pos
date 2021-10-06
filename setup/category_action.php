<?php
    // get the data
    include '../includes/config.php';
    $fetchCategoryData = "";
    $fetchCategoryDataSql = "SELECT * FROM ipos_category ORDER BY category_id DESC";
    $fetchCategoryDataQuery = mysqli_query($conn, $fetchCategoryDataSql) or die("category get sql problems." . mysqli_error($conn));
    if (mysqli_num_rows($fetchCategoryDataQuery) > 0) {
        while ($row = mysqli_fetch_assoc($fetchCategoryDataQuery)) {
            $fetchCategoryData .= "
            <tr class='table--data'>
                <td class='table--data--items'>$row[category_id]</td>
                <td class='table--data--items'>$row[category_name]</td>
                <td class='table--data--items'>$row[category_stock]</td>
                <td class='table--data--items'><span class='status'>$row[category_status]</span></td>
                <td class='table--data--items table--data--action' data-id=''>
                    <button class='print' id='print' data-id='$row[category_id]'><i class='fas fa-print'></i></button>
                    <button class='update' id='update' data-id='$row[category_id]'><i class='fas fa-edit'></i></button>
                    <button class='delete' id='delete' data-id='$row[category_id]'><i class='fas fa-trash'></i></button>
                </td>
            </tr>
            ";
        }
        echo $fetchCategoryData;
    }
    // send the data
    if (isset($_POST['categoryName'])) {
        include '../includes/config.php';
        $categoryName = $_POST['categoryName'];
        $categoryStock = $_POST['categoryStock'];
        $categoryStatus = $_POST['categoryStatus'];
        $sendCategoryData = "";
        // category name dublicacy check
        $checkCategoryNameDupSql = "SELECT * FROM ipos_category WHERE category_name = '{$categoryName}'";
        $checkCategoryNameDupQuery = mysqli_query($conn, $checkCategoryNameDupSql);
        if (mysqli_num_rows($checkCategoryNameDupQuery) > 0) {
            $sendCategoryData .= "Category Name Exist.";
        } else {
            $categoryInsertSql = "INSERT INTO ipos_category (category_name, category_stock, category_status)
                                    VALUES ('{$categoryName}', '{$categoryStock}', '{$categoryStatus}')";
            if (mysqli_query($conn, $categoryInsertSql)) {
                $sendCategoryData .= "Category Inserted";
            }
        }
        echo $sendCategoryData .= "data has been sended";
    } else {
        echo "Data can't be send";
    }
?>