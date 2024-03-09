var pay_t = 1;
function reduceBal() {
    localStorage.setItem("ch", $("#balance").val());
    $("#balance").val("0.00");
    document.getElementById("chec").setAttribute("onclick", "rec()");
}
function rec() {
    $("#balance").val(localStorage.getItem("ch"));
    localStorage.removeItem("ch");
    document.getElementById("chec").setAttribute("onclick", "reduceBal()");
}

$(document).ready(function () {
    $('#tab_logic tbody').on('keyup change', function () {
        calc();
    });
    $('#tax').on('keyup change', function () {
        calc_total();
    });
    $('#paid_amount').on('keyup change', function () {
        calc_total();
    });

});
$('#promo').on('change', function () {
    var amount = parseFloat($(this).val());
    var total = parseFloat($('#total_amount_tmp').val());
    $('#total_amount').val((total - amount).toFixed(2));
    $('#balance').val(0);
});
function calc()
{
    $('#tab_logic tbody tr').each(function (i, element) {
        var html = $(this).html();
        if (html != '')
        {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            $(this).find('.total').val((qty * price).toFixed(2));

            calc_total();
        }
    });
}

calc();

function calc_total() {
    var total = 0;
    $('.total').each(function () {
        total += parseFloat($(this).val());
    });
    total -= parseFloat($('#prev_tot_bal').val());
    var other_dis = $('#other_dis').val();
    $('#sub_total').val(total.toFixed(2));
    var tax_sum = total / 100 * $('#tax').val();
    $('#tax_amount').val((tax_sum).toFixed(2));
    var amount = parseFloat($('#promo').val());
    $('#total_amount').val((total - tax_sum - other_dis - amount).toFixed(2));
    $('#total_amount_tmp').val((total - tax_sum - other_dis).toFixed(2));

    var total2 = $('#total_amount').val();
    var paid2 = $('#paid_amount').val();
    var paid = paid2 - total2;
    $('#balance').val(paid.toFixed(2));
    localStorage.setItem("ch", paid.toFixed(2));
}
$('body').keyup(function (e) {

    if (e.keyCode == 27) {
        // user has pressed backspace
        var tot_del_re = $(".del_re").length;
        if (tot_del_re > 0) {
            $(".del_re").eq(tot_del_re - 1).click();
        }
    } else if (e.keyCode == 32) {
        // user has pressed space
        var pro_id = $("select[name='pro_id']").val();
        if (pro_id != 0) {
            $("#add").click();
        }
    } else if (e.keyCode == 37) {
        // user has pressed Left Arrow
        $("#tax").focus();
    } else if (e.keyCode == 38) {
        // user has pressed Up Arrow
        $(".pay_type_ops").removeAttr('selected');
        $(".pay_type_ops").next().attr('selected', 'selected');
        pay_t++;
        if (pay_t >= $(".pay_type_ops").length) {
            pay_t = 0;
        }
    } else if (e.keyCode == 39) {
        // user has pressed Right Arrow
        $("#paid_amount").focus();
    } else if (e.keyCode == 117) {
        // user has pressed Right Arrow
        $("#quantity").focus();
    } else if (e.keyCode == 118) {
        // user has pressed Right Arrow
        $("#promo").click();
    } else if (e.keyCode == 115) {
        // user has pressed Right Arrow
        var pay_amount = parseFloat($("#paid_amount").val());
        if (!isNaN(pay_amount) && pay_amount > 0) {
            $("#save_only_btn").click();
        }
    } else if (e.keyCode == 119) {
        // user has pressed Right Arrow
        window.location.href = $("#ret_btn").attr('href');
    } else if (e.keyCode == 113) {
        // user has pressed Down Arrow
        var pay_amount = parseFloat($("#paid_amount").val());
        if (!isNaN(pay_amount) && pay_amount > 0) {
            $("#bill_end").click();
        }
    } else if (e.keyCode == 121) {
        $("#secret").val('1');
    } else {
        $("#secret").val('0');
    }
});