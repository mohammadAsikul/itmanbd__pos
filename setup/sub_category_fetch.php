<?php
    include '../includes/config.php';
    $fetchSubCategoryData = "";
    $fetchSubCategoryDataSql = "SELECT * FROM ipos_sub_category ORDER BY sub_category_id DESC";
    $fetchSubCategoryDataQuery = mysqli_query($conn, $fetchSubCategoryDataSql) or die("sub category get sql problems." . mysqli_error($conn));
    if (mysqli_num_rows($fetchSubCategoryDataQuery) > 0) {
        while ($rowSub = mysqli_fetch_assoc($fetchSubCategoryDataQuery)) {
            $fetchSubCategoryData .= "
            <tr class='table--data'>
                <td class='table--data--items'>$rowSub[sub_category_id]</td>
                <td class='table--data--items'>$rowSub[category_name]</td>
                <td class='table--data--items'>$rowSub[sub_category_name]</td>
                <td class='table--data--items'>$rowSub[sub_category_stock]</td>
                <td class='table--data--items'><span class='status'>$rowSub[sub_category_status]</span></td>
                <td class='table--data--items table--data--action' data-id=''>
                    <button class='print' id='print' data-id='$rowSub[sub_category_id]'><i class='fas fa-print'></i></button>
                    <button class='update' id='update' data-id='$rowSub[sub_category_id]'><i class='fas fa-edit'></i></button>
                    <button class='delete' id='delete' data-id='$rowSub[sub_category_id]'><i class='fas fa-trash'></i></button>
                </td>
            </tr>
            ";
        }
        echo $fetchSubCategoryData;
    } else {
        echo "Data can't show at this moment.";
    }
?>