<?php
    require APPROOT . "/views/templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="m-3">
      <div class="card card-body mb-1 mt-1">
        <h3>
          Shopping Cart
        
        </h3>
        <hr />

        <table class="table table-hover">
            <thead class="table-dark">
                <tr class="text-center">
                <th scope="col" style="max-width: 5%;">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col" class="w-25">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($data["shoppingCart"])) { ?>
                <?php foreach($data["shoppingCart"] as $key => $order) : ?>
                    <!-- Product 1  -->
                    <tr  class="text-center" >
                        <th scope="row" data-bs-toggle="collapse" href="#collapse<?php echo $order->productId?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $order->productId?>"><?php echo $order->productId?></th>
                        <td data-bs-toggle="collapse" href="#collapse<?php echo $order->productId?>" role="button" aria-expanded="false" aria-controls="collapse1">
                            <strong><?php echo $order->product_name?></strong>  
                            <br><?php echo $order->category . ' - ' . $order->color?> <br> 
                            <p style = "font-size:xx-small" class="fs-6 fst-italic"><?php echo $order->size?></p> 

                            
                            <p class="fst-italic text-success" style="font-weight: 100; font-size:13px"> Stock/s available: <?php echo $order->stock?></p>
                            </td>
                        <td data-bs-toggle="collapse" href="#collapse<?php echo $order->productId?>" role="button" aria-expanded="false" aria-controls="collapse1">Php. <?php echo number_format($order->price,2,'.', ',');?></td>
                        
                        <td >
                            
                            <!-- <input type="number" value="4" min="0" class=" text-center" style="border-radius:10px; max-width:10%;-webkit-appearance: textfield; -moz-appearance: textfield;" > -->
                            <input type="number" pattern="[0-9]*" value="<?php echo $order->quantity?>" min="0" class="text-center" style="border-radius: 10px; max-width: 20%;">

                        

                        </td>
                    
                        <td data-bs-toggle="collapse" href="#collapse<?php echo $order->productId?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $order->productId?>"> <strong>Php. <?php $productTotalPrice = $order->price * $order->quantity; echo number_format($productTotalPrice,2,'.', ',');?></strong>  </td>
                        <td>
                            <!-- <button type="button" class="btn btn-primary">Update Info</button> -->
                            <form action="<?php echo URLROOT."/transactions/removeFromCart/".$order->orderId ?>" method="post">
                                <input type="submit" class="btn btn-danger" value="Delete"><i class="bi bi-trash3"></i></input>
                            </form>
                        </td>
                    </tr>
                    <!-- Product 1 details -->
                    <tr>
                        <td colspan="6">
                        <div class="collapse" id="collapse<?php echo $order->productId?>">
                            
                                <div class="card mb-3">
                                    <div class="card-body bg-light">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <ul class="list-group list-group" style="font-family: 'Times New Roman', Times, serif;">
                                                    <li class="list-group-item">
                                                        <b>Product ID:</b> <?php echo $order->productId?>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Category:</b> <?php echo $order->category?>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Quantity:</b> <?php echo $order->quantity?>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Color:</b> <?php echo $order->color?>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Size:</b> <?php echo $order->size?>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Price:</b> Php <?php echo number_format($order->price,2,'.', ',');?>
                                                    </li>
                                                    
                                                    <li class="list-group-item">
                                                        <b>Details:</b>
                                                        <ul>
                                                            <li><?php echo $order->details?></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <img class="img-fluid rounded mt-5" src="<?php echo URLROOT ."/img/products/".$order->img; ?>" style="max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </td>
                        </tr>
                
                <?php endforeach;?>
            <?php }?>
          </tbody>
          <tfoot style="border: none; " class="table-light" >
            <tr style="border: none;">
                <td style="border: none;"class="text-end" colspan="4">Subtotal: </td>
                <td style="border: none;"class="text-end" colspan="2"> <strong>Php. <?php $subTotalPrice=$data['totalPrice'] - ($data['totalPrice'] * 0.12); echo number_format($subTotalPrice,2,'.', ',');?></strong> </td>
              
            </tr>
            <tr>
                <td style="border: none;"class="text-end" colspan="4">TAX (VAT 12%): </td>
                <td style="border: none;"class="text-end" colspan="2"> <strong>Php. <?php $vatPrice=$data['totalPrice'] * 0.12; echo number_format($vatPrice,2,'.', ',');?></strong> </td>
              
            </tr>
            <tr>
                <td style="border: none;"class="text-end" colspan="4">Shipping Fee: </td>
                <td style="border: none;"class="text-end" colspan="2"> <strong>Php. <?php $shippingFee = 0.00; echo number_format($shippingFee,2,'.', ',');?></strong> </td>
              
            </tr>
            <!-- <tr>
                <td style="border: none;"class="text-end" colspan="4">Installation Fee: </td>
                <td style="border: none;"class="text-end" colspan="2"> <strong>Php. 0.00</strong> </td>
              
            </tr> -->
            <tr>
                <td style="border: none;" class="text-end" colspan="6">

                <hr>

                </td>
            </tr>
            <tr>
                
                <td style="border: none;" class="text-end" colspan="4"> <strong>TOTAL:</strong>  </td>
                <td style="border: none;" class="text-end" colspan="2"> <strong>Php. <?php $TotalPrice=$subTotalPrice + $vatPrice + $shippingFee; echo number_format($TotalPrice,2,'.', ',');?></strong> </td>
              
            </tr>
        </tfoot>
        </table>

                

        

      </div>
      <?php if(!empty($data["shoppingCart"])) { ?>
      <form action="<?php echo URLROOT; ?>/transactions/checkout">
        <input type="submit" value="Checkout" class="btn btn-success btn-sm  mr-3" style="max-width: 20%;"></input>
      </form>
      <form action="<?php echo URLROOT."/transactions/removeFromCart/".$order->orderId ?>" method="post">
        <input type="submit" value="Cancel" class="btn btn-danger btn-sm  mr-3" style="max-width: 20%;"></input>
      </form>
      <?php }?>
    </div>
  </body>
</html>
