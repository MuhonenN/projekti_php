</div>
</div>
<script src="../jquery/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart-form').on('submit', function() {
            var id = $(this).find('.product-id').text();
            var quantity = $(this).find('.cart-quantity').val();

            window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
            return false;
        });
        $('.update-quantity-form').on('submit', function() {
            var id = $(this).find('.product-id').text();
            var quantity = $(this).find('.cart-quantity').val();

            window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
            return false;
        });
        $(document).on('mouseenter', '.product-img-thumb', function() {
            var data_img_id = $(this).attr('data-img-id');
            $('.product-img').hide();
            $('#product-img-'+data_img_id).show();
        });
    });
</script>
</body>

</html>