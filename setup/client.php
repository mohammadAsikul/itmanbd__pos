<?php require_once '../includes/header.php' ?>
<!-- main section start -->
<main id="main" class="main">
    <div class="container">
        <div class="insert__show--container client__insert__show--container">
            <!-- insert section -->
            <div class="insert">
                <h3>Client Entry</h3>
                <form id="clientInsert" class="insert__form">
                    <!-- client id and client name -->
                    <div class="insert__form--input id name">
                        <input type="hidden" name="id" id="clientId">
                        <input type="text" name="clientName" id="clientName" placeholder="Client Name">
                    </div>
                    <!-- client contact person -->
                    <div class="insert__form--input contact--person">
                        <input type="text" name="contactPerson" id="contactPerson" placeholder="Client Contact Person">
                    </div>
                    <!-- client contact number -->
                    <div class="insert__form--input contact--number">
                        <input type="text" name="contactNumber" id="contactNumber" placeholder="Client Contact Number">
                    </div>
                    <!-- client email -->
                    <div class="insert__form--input email">
                        <input type="email" name="clientEmail" id="clientEmail" placeholder="Client Email">
                    </div>
                    <!-- client address -->
                    <div class="insert__form--input address">
                        <input type="text" name="clientAddress" id="clientAddress" placeholder="Client Address">
                    </div>
                    <div class="insert__form--submit client__submit">
                        <input type="submit" class="submit" id="clientSubmit" value="Submit">
                    </div>
                </form>
            </div>
            <!-- supplier show section -->
            <div class="show__table--container">
                <div class="heading__search--container">
                    <h3>Client List</h3>
                    <div class="search__container">
                        <input type="text" name="supplier__search" id="supplierSearch" placeholder="Search ...">
                    </div>
                </div>
                <table id="clientTable" class="table client__table">
                    <tr class="table__heading">
                        <th class="table__heading--items client__sl">SL</th>
                        <th class="table__heading--items client__name">Name</th>
                        <th class="table__heading--items client__contact--person">Contact Person</th>
                        <th class="table__heading--items client__contact--number">Contact Number</th>
                        <th class="table__heading--items client__email">Email</th>
                        <th class="table__heading--items client__address">Address</th>
                        <th class="table__heading--items client__action action">Actions</th>
                    </tr>
                    <tr class="table--data">
                        <td class="table--data--items 1">01</td>
                        <td class="table--data--items 2">Master Technology</td>
                        <td class="table--data--items 3">Subroto Kumar Saha</td>
                        <td class="table--data--items 4">01958444382</td>
                        <td class="table--data--items 5">master.technology902@gmail.com</td>
                        <td class="table--data--items address">Computer City Center, Shop No- 244-246, Level-2 69-71, New Elephant Road, Dhaka-1205.</td>
                        <td class="table--data--action">
                            <button class="update" id="update"><i class="fas fa-edit"></i></button>
                            <button class="delete" id="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../includes/footer.php' ?>
