<?php
    include '../includes/config.php';
    $fetchOutput = "";
    $fetchUserSql = "SELECT * FROM `ipos_user`";
    $fetchUserQuery = mysqli_query($conn, $fetchUserSql) or die("fetch user page query problems." . mysqli_error($conn));
    if (mysqli_num_rows($fetchUserQuery) > 0) {
        while ($fetchUserRow = mysqli_fetch_assoc($fetchUserQuery)) {
            $fetchOutput .= "
              <tr class='table__data'>
                <td class='table__data--items' data-id='{$fetchUserRow['id']}'>{$fetchUserRow['id']}</td>
                <td class='table__data--items' data-username='{$fetchUserRow['username']}'>{$fetchUserRow['username']}</td>
                <td class='table__data--items' data-designation='{$fetchUserRow['designation']}'>{$fetchUserRow['designation']}</td>
                <td class='table__data--items' data-role='{$fetchUserRow['user_role']}'>{$fetchUserRow['user_role']}</td>
                <td class='table__data--items' data-status='{$fetchUserRow['status']}'>{$fetchUserRow['status']}</td>
                <td class='table--data--items table--data--action' data-btnId='{$fetchUserRow['id']}'>
                    <button class='update' id='update' data-updateId={$fetchUserRow['id']}><i class='fas fa-edit'></i></button>
                    <button class='delete' id='delete' data-deleteId={$fetchUserRow['id']}><i class='fas fa-trash'></i></button>
                </td>
              </tr>
            ";
        }
        echo $fetchOutput;
    }
?>