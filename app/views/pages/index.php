<?php
  require APPROOT . '/views/templates/header.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="products.css" />
    <link rel="stylesheet" href="flickity.css" />
    <title><?php echo $data['title']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
  
</head>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: navy"
    ></nav>

 <!-- Category and Sorting Controls -->
 <div class="container mt-4 text-center">
 <div id="buttons" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
  <button class="button-value">All</button>
  <button class="button-value">Doors</button>
  <button class="button-value">Screen Doors</button>
  <button class="button-value">Windows</button>
  <button class="button-value">Door Knobs</button>
  <button class="button-value">Others</button>
</div>
</div>
</div>
    <!-- HOME PAGE -->
    <!-- FEATURED RPODUCTS -->
    <!-- DOORS -->
    <div class="container mt-4" id="product-container">
    <h3 class="fs-5 mt-3 mx-3" style="text-align: left; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DOORS</h3>
    <div class="row g-3 my-2">
      <?php foreach($data["featuredProducts"] as $product) : ; ?>
        <div class="col-md-3">
          <div class="card-sm">
            <div class="card-body">
            <div class="image">
              <img src="<?php echo URLROOT."/img/products/".$product->varImg ?>" alt="Door" />
            </div>
              <div
                class="product-name"
                style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700"
              >
                <?php echo $product->product_name ?>
              </div>
              <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                  <span>Availbale Colors: <?php echo $product->color ?></span>
                </div>
                <div class="prize"><?php echo $product->price."php" ?></div>
                <div class="color">
                  <span><?php echo $product->details ?></span>
                </div>
              </div>
              <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$product->productId;?>">
                  <button class="btn btn-primary view-details-button" data-toggle="modal" data-target="#myModal">View Details</button>
                </form>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                  <i class="bi bi-cart-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>  





<script src="products.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
