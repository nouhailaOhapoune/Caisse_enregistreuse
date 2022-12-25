<input class="form-control" id="myInput" type="text" style="width: 426px; margin-left: 50px;"
 placeholder="Search.." >
<br>
<table class="table table-hover table-dark">
    <thead>
    <tr class="text-center">
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>
    </thead>
    <div id="detailVente">
        <tbody id="myTable">

        </tbody>
</table>
<div class="d-flex flex-row-reverse ">
    <h5 id="totalP" class="mt-3"></h5>
</div>

<script>

    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


    });

</script>