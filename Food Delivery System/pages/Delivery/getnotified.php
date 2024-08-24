<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Luminor Delivery</title>
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        /* Modal Styles */
/* Modal Hidden by Default */


    </style>
</head>
<body>
<!-- Modal HTML -->
<!-- <div id="deliveryModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Delivery Notification</h5>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">You have a new delivery notification.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="acknowledgeNotification()">Acknowledge</button>
                <button type="button" class="btn btn-danger" onclick="hideModal()">Close</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="replaceCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replaceCartModalLabel">Sure this is it?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body" id="orderDetails">
          Are sure You want to place this order?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="canclemodal">Cancel</button>
          <button type="button" id="confirmorder" class="btn btn-danger">Place Order</button>
        </div>
      </div>
    </div>
  </div>
<script src="../../js/jquery/jquery.min.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../../js/isotope.min.js"></script>
<script src="../../js/owl-carousel.js"></script>
<script src="../../js/counter.js"></script>
<script src="../../js/custom.js"></script>
<script>
const orderset = new Set();
setInterval(function() {
    $.ajax({
        url: '../Ajax_files/check_order_status.php',
        method: 'GET',
        dataType: 'json',
        data: { excludedOrders: Array.from(orderset) },  // Send excluded orders
        success: function(data) {
            if (data.newOrder) {
                // Show the modal only if the order is not already in the set of rejected orders
                if (!orderset.has(data.orderid)) {
                    $('#deliveryModal').modal('show');
                    $('#orderDetails').html(data.orderDetails);
                    console.log("GG");
                    $('#acceptOrder').off('click').on('click', function() {
                        // Accept order logic
                        $.post('../Ajax_files/accept_order.php', { orderid: data.orderid }, function(response) {
                            if (response.success) {
                                $('#deliveryModal').modal('hide');
                            }
                        }, 'json');
                    });

                    $('#canclemodal').off('click').on('click', function() {
                        $('#deliveryModal').modal('hide');
                        orderset.add(data.orderid);  // Add to rejected orders
                    });
                }
            } else {
              $('#deliveryModal').modal('hide');
              console.log("changed");
                // Don't hide the modal unless the status is actually changed to "accepted"
                if (data.orderStatusChanged) {

                    $('#deliveryModal').modal('hide');
                }
            }
        }
    });
}, 1000);  // Poll every second
  // Poll every second


</script>
</body>
</html>