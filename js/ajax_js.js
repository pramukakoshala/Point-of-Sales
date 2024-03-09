$("select[name='c_id']").change(function () {
    var c_id = $(this).val();
    $.ajax({
        url: "billing_ajax/cus_oustanding.php",
        Type: "get",
        data: {'c': c_id},
        success: function (data) {
            var obj = JSON.parse(data);
            $('#outstand').val(obj["outstand"]);
        }
    });
});
$("select[name='pro_id']").change(function () {
    var pro_id = $(this).val();
    $.ajax({
        url: "billing_ajax/unit_price.php",
        Type: "get",
        data: {'p': pro_id},
        success: function (data) {
            var obj = JSON.parse(data);
            $('#unit_p').val(obj["unit_price"]);
            $('#lower_price').val(obj["lprice"]);
            $('#higher_price').val(obj["hprice"]);
            $("#quantity").focus();
        }
    });
});
$('#quantity').on('input', function () {
    var item = $(this).val();
    var pro_id = $("#pro_id").val();
    $.ajax({
        url: "billing_ajax/max_quantity.php",
        Type: "GET",
        data: {'item': item, 'p': pro_id},
        success: function (data) {
            var obj2 = JSON.parse(data);
            if (obj2["errors"] !== "") {
                $("#quantity_base").addClass("control-group");
                $("#quantity_base").addClass("error");
            } else {
                $("#quantity_base").removeClass("control-group");
                $("#quantity_base").removeClass("error");
            }
        }
    });
});
$('#unit_p').on('change', function () {
    var unit_p = parseFloat($(this).val());
    var lower_price = parseFloat($('#lower_price').val());
    var higher_price = parseFloat($('#higher_price').val());
    if (unit_p > higher_price) {
        $('#unit_p').val(higher_price);
    } else if (unit_p < lower_price) {
        $('#unit_p').val(lower_price);
    }
});

$('#unit_p').on('input', function () {
    var unit_p = parseFloat($(this).val());
    var lower_price = parseFloat($('#lower_price').val());
    var higher_price = parseFloat($('#higher_price').val());
    if (unit_p > higher_price) {
        $("#uprice_base").addClass("control-group");
        $("#uprice_base").addClass("error");
    } else if (unit_p < lower_price) {
        $("#uprice_base").addClass("control-group");
        $("#uprice_base").addClass("error");
    } else {
        $("#uprice_base").removeClass("control-group");
        $("#uprice_base").removeClass("error");
    }
});