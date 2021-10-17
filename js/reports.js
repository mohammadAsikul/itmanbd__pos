$(document).ready(function () {
    function fetchStockReport() {
        $.ajax({
            url: "fetchStock.php",
            type: "POST",
            success: function (fetchStockData) {
                $("#fetchStock").html(fetchStockData);
            }
        })
    }
    fetchStockReport();
})