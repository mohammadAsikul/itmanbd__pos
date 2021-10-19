<?php
    if (isset($_POST['supplierEditId'])) {
        include '../includes/config.php';
        $supplierUpdateOutput = "";
        $supplierUpdateId = $_POST['supplierEditId'];
        $supplierUpdateSql = "SELECT * FROM `ipos_supplier` WHERE supplier_id = {$supplierUpdateId}";
        $supplierUpdateQuery = mysqli_query($conn, $supplierUpdateSql) or die("Supplier Update page select query problems." . mysqli_error($conn));
        if (mysqli_num_rows($supplierUpdateQuery) > 0) {
            while ($supplierUpdateRow = mysqli_fetch_assoc($supplierUpdateQuery)) {
                $supplierUpdateOutput = "
                        <div class='supplier__dialog' id='supplierDialog'>
                            <div class='supplier__dialog--heading'>
                                <h3>Supplier Update</h3>
                            </div>
                            <div class='form__group'>
                                <label for='idName'>Supplier Name *</label>
                                <span id='errorSupplierName' class='error--msg'></span>
                                <input type='hidden' name='supplierUpdateId' id='supplierUpdateId' value='{$supplierUpdateRow['supplier_id']}'>
                                <input type='text' name='supplierUpdateName' id='supplierUpdateName' value='{$supplierUpdateRow['supplier_name']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierContactPerson'>Contact Person *</label>
                                <span id='errorContactPerson' class='error--msg'></span>
                                <input type='text' name='supplierUpdateContPerson' id='supplierUpdateContPerson' value='{$supplierUpdateRow['supplier_cont_person']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierContactNumber'>Contact Number *</label>
                                <span id='errorContactNumber' class='error--msg'></span>
                                <input type='text' name='supplierUpdateContNumber' id='supplierUpdateContNumber' value='{$supplierUpdateRow['supplier_cont_number']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierEmail'>Email</label>
                                <span id='errorEmail' class='error--msg'></span>
                                <input type='text' name='supplierUpdateEmail' id='supplierUpdateEmail' value='{$supplierUpdateRow['supplier_email_address']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierWhatsapp'>Whatsapp</label>
                                <span id='errorWhatsapp' class='error--msg'></span>
                                <input type='text' name='supplierUpdateWhatsapp' id='supplierUpdateWhatsapp'  value='{$supplierUpdateRow['supplier_whatsapp']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierAddress'>Address *</label>
                                <span id='errorAddress' class='error--msg'></span>
                                <input type='text' name='supplierUpdateAddress' id='supplierUpdateAddress' value='{$supplierUpdateRow['supplier_address']}'>
                            </div>
                            <div class='form__group'>
                                <label for='supplierStatus'>Supplier Status</label>
                                <select name='supplierUpdateStatus' id='supplierUpdateStatus'>
                                    <option value='Active' selected disabled>{$supplierUpdateRow['supplier_status']}</option>
                                    <option value='Active'>Active</option>
                                    <option value='Deactive'>Deactive</option>
                                </select>
                            </div>
                            <div class='form__group'>
                                <button type='button' name='supplierUpdate' id='supplierUpdate' class='save--btn'>Update</button>
                            </div>
                        </div>
                ";
            }
        }
        echo $supplierUpdateOutput;
    }
    // send update data to database
    if (isset($_POST['supplierUpdateId'])) {
        include '../includes/config.php';
        
    }
?>