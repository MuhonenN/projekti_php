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
    });
</script>
</body>

</html>