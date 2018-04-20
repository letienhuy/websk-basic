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
$('#tao-sk').ajaxForm({
    url: 'taosk.php',
    dataType: "JSON",
    success: function(res) {
        alert(res.success);
        $('#tao-sk').resetForm();
    },
    error: function(err) {
        $('#result').html($('<div/>').addClass('alert alert-danger').text(err.responseJSON.error));
    }
});
$('#edit-sk').ajaxForm({
    url: 'editsk.php?id=' + $('#edit-sk').data('id'),
    dataType: "JSON",
    success: function(res) {
        alert(res.success);
    },
    error: function(err) {
        $('#result').html($('<div/>').addClass('alert alert-danger').text(err.responseJSON.error));
    }
});
$('#tao-dd').ajaxForm({
    url: 'taodd.php',
    dataType: "JSON",
    success: function(res) {
        alert(res.success);
        $('#tao-dd').resetForm();
    },
    error: function(err) {
        $('#result').html($('<div/>').addClass('alert alert-danger').text(err.responseJSON.error));
    }
});
$('#edit-dd').ajaxForm({
    url: 'editdd.php?id=' + $('#edit-dd').data('id'),
    dataType: "JSON",
    success: function(res) {
        alert(res.success);
    },
    error: function(err) {
        $('#result').html($('<div/>').addClass('alert alert-danger').text(err.responseJSON.error));
    }
});