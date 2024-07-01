$(document).ready(function() {
    // Increment quantity
    $('.quantity .plus-btn').click(function() {
        var $input = $(this).prev('input');
        var newValue = parseInt($input.val(), 10) + 1;
        $input.val(newValue);
    });

    // Decrement quantity
    $('.quantity .minus-btn').click(function() {
        var $input = $(this).next('input');
        var newValue = parseInt($input.val(), 10) - 1;
        if (newValue >= 1) {
            $input.val(newValue);
        }
    });

    // Remove item from cart
    $('.remove-btn').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: '/remove-from-cart/' + id,
            success: function(data) {
                location.reload();
            }
        });
    });

    // Update cart
    $('.update-btn').click(function() {
        var id = $(this).data('id');
        var quantity = $(this).parent().parent().find('.quantity input').val();
        $.ajax({
            type: "PATCH",
            url: '/update-cart/' + id,
            data: { quantity: quantity },
            success: function(data) {
                location.reload();
            }
        });
    });
});
