<?php
    require APPROOT . "/views/templates/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Added missing width=device-width -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="reports.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo $data['title']; ?></title>
    
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> <!-- Add the Font Awesome stylesheet link -->
</head>
<body>
    <!-- CARDS FOR TOTAL PENDING ORDERS AND SHIPPING, COMPLETED ORDERS AND TOTAL USERS -->
    <div class="container mt-5" id="content-o">
        <div class="row">
            <div class="col-md-3">
                <div class="card1"id="pending-orders-card" onclick="toggleCard('pending-orders-card')">
                <div class="card1">
                    <div class="card-header" style="background-color: navy; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; font-size: 13px ;">
                       TOTAL PENDING ORDER FOR PAYMENT
                    </div>
                    <div class="card-body" style="display: flex; justify-content: space-between;">
                        <h5 class="card-title" style="font-size: 50px; color: goldenrod;"><?php echo $data['getForPaymentTransactions']?></h5>
                        <i class="fas fa-shopping-cart" style="font-size: 40px; margin-top: 15px;"></i>
                    </div>
                    <div class="card-footer"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card1" id="pending-orders-card" onclick="toggleCard('pending-orders-shipping')">
                <div class="card1">
                    <div class="card-header" style="background-color: navy; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; font-size: 13px ;">
                     TOTAL PENDING FOR SHIPPING
                    </div>
                    <div class="card-body" style="display: flex; justify-content: space-between;">
                        <h5 class="card-title" style="font-size: 50px; color: goldenrod;"><?php echo $data['getForShippingTransactions']?></h5>
                        <i class="fas fa-shipping-fast" style="font-size: 40px; margin-top: 15px;"></i>
                    </div>
                    <div class="card-footer"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card1" id="pending-orders-card" onclick="toggleCard('completed-orders')">
                <div class="card1">
                    <div class="card-header" style="background-color: navy; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; font-size: 13px ;">
                      TOTAL COMPLETED ORDERS
                    </div>
                    <div class="card-body" style="display: flex; justify-content: space-between;">
                        <h5 class="card-title" style="font-size: 50px; color: goldenrod;"><?php echo $data['getCompletedTransactions']?></h5>
                        <i class="fas fa-check-circle" style="font-size: 40px; margin-top: 15px;"></i>
                    </div>
                    <div class="card-footer"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card1" id="pending-orders-card" onclick="toggleCard('total-users')">
                <div class="card1">
                    <div class="card-header" style="background-color: navy; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; font-size: 13px ;">
                      TOTAL USERS
                    </div>
                    <div class="card-body" style="display: flex; justify-content: space-between;">
                        <h5 class="card-title" style="font-size: 50px; color: goldenrod;"><?php echo $data['getTotalCustomers']?></h5>
                        <i class="fas fa-users" style="font-size: 40px; margin-top: 15px;"></i>
                    </div>
                    <div class="card-footer"></div>
                </div>
                </div>
            </div>
                <div class="container" style="margin-top: 250px;">
                    <div class="card">
                        <div class="card-header" style="background-color: navy; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; text-align: center;">
                            TOTAL STOCKS
                        </div>
            
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>PRODUCT_VARID</th>
                                        <th>PRICE</th>
                                        <th>QTY</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <?php foreach($data["getAllProductStocks"] as $key => $details) : ?>
                                    <tr>
                                        <td><?php echo $details->prodNameColor; ?></td>
                                        <td><?php echo $details->id; ?></td>
                                        <td><?php echo $details->price; ?></td>
                                        <td><?php echo $details->stock; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
            
                        <div class="card-footer">
    
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- CARD WITH TABLE FOR TOTAL STOCKS -->
    

        
    
   
 <script>
function toggleCard(cardType) {
        // Define the URLs for each card type
        const cardUrls = {
            'pending-orders-card': 'pending_orders.html',
            'pending-orders-shipping': 'pending_shipping_orders.html',
            'completed-orders': 'completed_orders.html',
            'total-users': 'total_users.html'
        };

        // Get the URL based on the card type
        const url = cardUrls[cardType];

        // Redirect to the corresponding URL
        if (url) {
            window.location.href = url;
        }
    }

 </script>

    <script>
        src =
          "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
        integrity =
          "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4";
        crossorigin = "anonymous";
      </script>
</body>
</html>
