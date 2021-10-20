<?php
    if (isset($_POST['clientUpdateId'])) {
        include '../includes/config.php';
        $clientUpdateOutput = "";
        $clientUpdateId = $_POST['clientUpdateId'];
        $clientUpdateSql = "SELECT * FROM `ipos_client` WHERE client_id = {$clientUpdateId}";
        $clientUpdateQuery = mysqli_query($conn, $clientUpdateSql) or die("client update page query problems. " . mysqli_error($conn));
        if (mysqli_num_rows($clientUpdateQuery) > 0) {
            while ($clientUpdateRow = mysqli_fetch_assoc($clientUpdateQuery)) {
                $clientUpdateOutput = "
                                        <span class='client__submit__form--close'>
                                            <i class='fas fa-window-close'></i>
                                        </span>
                                        <div class='supplier__dialog' id='supplierDialog'>
                                            <div class='supplier__dialog--heading'>
                                                <h3>Client Update</h3>
                                            </div>
                                            <div class='form__group'>
                                                <label for='idName'>Client Name *</label>
                                                <span id='errorClientName' class='error--msg'></span>
                                                <input type='hidden' name='clientUpdateId' id='clientUpdateId' value='{$clientUpdateRow["client_id"]}'>
                                                <input type='text' name='clientUpdateName' id='clientUpdateName' value='{$clientUpdateRow["client_name"]}'>
                                            </div>
                                            <div class='form__group'>
                                                <label for='contactPerson'>Contact Person</label>
                                                <span id='errorContactPerson' class='error--msg'></span>
                                                <input type='text' name='clientUpdateContPerson' id='clientUpdateContPerson' value='{$clientUpdateRow["client_cont_person"]}'>
                                            </div>
                                            <div class='form__group'>
                                                <label for='contactNumber'>Contact Number *</label>
                                                <span id='errorContactNumber' class='error--msg'></span>
                                                <input type='text' name='clientUpdateContNumber' id='clientUpdateContNumber' value='{$clientUpdateRow["client_cont_number"]}'>
                                            </div>
                                            <div class='form__group'>
                                                <label for='clientEmail'>Email</label>
                                                <span id='errorEmail' class='error--msg'></span>
                                                <input type='text' name='clientUpdateEmail' id='clientUpdateEmail' value='{$clientUpdateRow["client_email"]}'>
                                            </div>
                                            <div class='form__group'>
                                                <label for='clientAddress'>Address *</label>
                                                <span id='errorClientAddress' class='error--msg'></span>
                                                <input type='text' name='clientUpdateAddress' id='clientUpdateAddress' value='{$clientUpdateRow["client_address"]}'>
                                            </div>
                                            <div class='form__group'>
                                                <label for='clientStatus'>Client Status</label>
                                                <select name='clientUpdateStatus' id='clientUpdateStatus'>
                                                    <option value='Active' selected>'{$clientUpdateRow["client_status"]}'</option>
                                                    <option value='Active'>Active</option>
                                                    <option value='Deactive'>Deactive</option>
                                                </select>
                                            </div>
                                            <div class='form__group'>
                                                <button type='button' name='clientUpdate' id='clientUpdate' class='save--btn'>Update</button>
                                            </div>
                                        </div>
        ";
            }
        }
    echo $clientUpdateOutput;
    }
?>