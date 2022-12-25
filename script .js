$(document).ready(function () {
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#user-container .card").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $.ajax({
        type: "GET",
        url: "detailVente.php",
        dataType: "html",
        success: function (data) {
            $("#table").html(data);
        }
    });


    $.ajax({
        type: "GET",
        url: "getProduct.php",
        dataType: "html",
        success: function (data) {
            $("#products-container").html(data);
        }
    });
   

   

});



