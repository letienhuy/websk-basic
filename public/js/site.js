$(document).ready(function() {
    var num = $('input[name=num_ticket]').val();
    var price = $('#total-price').data('price');
    $('#total-price').text('Tổng tiền: ' + num * price + 'đ');
    $('#dat-ve').children('input[name=ticket]').val(num);
});
$(document).on('keyup', 'input[name=num_ticket]', function() {
    var num = $(this).val();
    var price = $('#total-price').data('price');
    $('#total-price').text('Tổng tiền: ' + num * price + 'đ');
    $('#dat-ve').children('input[name=ticket]').val(num);
});
$('#dat-ve').ajaxForm({
    url: 'ajax.php',
    dataType: "JSON",
    success: function(res) {
        $('#result').html($('<div/>').addClass('alert alert-success').text(res.success));
        $('#dat-ve').resetForm();
    },
    error: function(err) {
        $('#result').html($('<div/>').addClass('alert alert-danger').text(err.responseJSON.error));
    }
});