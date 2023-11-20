<?php
    require APPROOT . "/views/templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Product Page</title>
  <link rel="stylesheet" href="products.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    /* Styling the Card Container */
    .card-sm {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 10px;
      margin: 20px;
      text-align: center;
      box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5);

    }

    /* Hover to add some slight zoom effect on hover */
    .card-sm:hover {
      transform: scale(1.05);
    }

    /* Center the imagae inside the card */
    .card-sm .image {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10rem;
    }

    .card-sm .image img {
      max-height: 100%;
      max-width: 100%;
      border: 1px solid #ddd;
      border-radius: 5px;
      justify-content: center;
    }

    /* Adjust style for the Product Name */
    .product-name {
      margin-bottom: 10px;
      font-family: sans-serif;
      font-weight: 700;
      font-size: 1.2rem
    }

    /* Style for Product Detals */
    .product-details {
      margin-top: 10px;
    }

    /* Prize */
    .prize {
      font-weight: bold;
      font-size: 1.2rem
    }

    /* Styling the button */
    .action-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    /* Styling the buttons */
    .action-buttons2 {
      display: flex;
      justify-content: center;
      margin-top: 15px;
    }

    .action-buttons button {
      padding: 10px 20px;
      font-size: 1rem;
    }

    .view-details-button {
      background-color: navy;
      color: #fff;
      border: none;
    }

    .view-details-button:hover {
      background-color: #1b203d;
    }

    /* STYLE THE BUTTON IN THE SEARCH BAR */
    #search-container button {
      border-radius: 5px;
      color: #fff;
      background-color: navy;
      padding: 1em 2em;
      margin-left: 1em;
      margin-top: 0.5em;
    }

   /* Styles for the search bar */
.search-container {
  margin-bottom: 20px;
}

.search-input {
  padding: 10px;
  width: 300px;
  border: 2px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

/* Styles for the filter buttons */
.button-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.button-value {
  padding: 10px 20px;
  margin: 5px;
  background-color: navy;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
}

.button-value:hover {
  background-color: #fff;
  color: navy;
}

.active {
  background-color: #fff;
  color: navy;
}


    .stars {
      margin: 10px 0;
    }

    .stars i {
      font-size: 16px;
      color: #FFD700;
    }

    /* STYLE FOR FOOTER */
    footer {
      background-color: gold;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    .section2-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .contact,
    .opening-hours,
    .inquiries {
      flex: 1;
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
    }

    .contact h2,
    .opening-hours h3,
    .inquiries h3 {
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .contact a,
    .opening-hours a {
      color: white;
      text-decoration: none;
      margin: 0 20px;
    }

    .contact a:hover,
    .opening-hours a:hover {
      text-decoration: underline;
    }

    /* INQUIRIES */
    .inquiries a {
      color: white;
      text-decoration: none;
    }

    /* Hide all elements initially */
    .filterable-element {
      display: none;
    }

    .active {
      display: block;
    }
  </style>
</head>

<body style="background-color: beige;">

  <!-- Category and Sorting Controls -->
  <div class="container mt-4 text-center">
    <!-- Search bar -->
    <div class="search-container">
      <input type="text" id="searchInput" onkeyup="searchFilter()" placeholder="Search..." class="search-input">
    </div>
  
    <!-- Filter buttons -->
    
    <div id="buttons" class="button-container">
        <button class="button-value" onclick='filter("all")'>All</button>
        <?php if(!empty($data["doorCategorizedFeaturedProducts"])) { ?>
            <button class="button-value" onclick='filter("doors")'>Doors</button>
        <?php }?>
        <?php if(!empty($data["screenCategorizedFeaturedProducts"])) { ?>
            <button class="button-value" onclick='filter("screen-doors")'>Screen Doors</button>
        <?php }?>
        <?php if(!empty($data["windowCategorizedFeaturedProducts"])) { ?>
            <button class="button-value" onclick='filter("windows")'>Windows</button>
        <?php }?>
        <?php if(!empty($data["knobCategorizedFeaturedProducts"])) { ?>
            <button class="button-value" onclick='filter("door-knobs")'>Door Knobs</button>
        <?php }?>
        <?php if(!empty($data["otherCategorizedFeaturedProducts"])) { ?>
            <button class="button-value" onclick='filter("others")'>Others</button>
        <?php }?>
    </div>
    </div>
  
  
  <!-- HOME PAGE -->
  <!-- FEATURED RPODUCTS -->
  <!-- DOORS -->

  <div class="container mt-5" id="doors" style="background-color: white; box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5); border-radius: 10px;">
    <div class="row g-3 my-2">
      <h3 class="mt-4 mx-3" style="text-align: left; margin-top: 20px; font-family:'Times New Roman', Times, serif; font-size: 40px;">DOORS</h3>
      <hr style="height: 1px; border: none; background-color: #000; margin: 10px 3px 0; width: 95%; margin-left: 20px;">
      <?php if(!empty($data["doorCategorizedFeaturedProducts"])) { ?>
        <?php foreach($data["doorCategorizedFeaturedProducts"] as $offeredProduct) : ; ?>
        <div class="col-md-3">
            <div class="card-sm">
            <div class="image">
                <img src="<?php echo URLROOT."/img/products/".$offeredProduct->varImg ?>" alt="Door" />
            </div>
            <div class="card-body">
                <div class="product-name" id="door-product" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700">
                    <?php echo $offeredProduct->product_name ?>
                </div>

                <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                    <span>Availbale Colors: <?php echo $offeredProduct->color ?></span>
                </div>
                <div class="prize">₱<?php echo number_format($offeredProduct->price, 2, '.', ',');?></div>
                </div>
                <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$offeredProduct->productId;?>">
                <button class=" view-details-button" data-toggle="modal" data-target="#myModal">
                    View Details
                </button>
                </form>
                <!-- <button class="view-details-button" data-toggle="modal" data-target="#myModal">
                    <i class="bi bi-cart-plus"></i>
                </button> -->

                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php }?>
    </div>
  </div>

    <!-- SCREEN DOORS PRODUCTS -->
    <div class="container mt-5" id="others" style="background-color: white;  box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5); border-radius: 10px;">
      <div class="row g-3 my-2">
        <h3 class="mt-4 mx-3" style="text-align: left; margin-top: 20px; font-family:'Times New Roman', Times, serif; font-size: 40px;">SCREEN DOORS</h3>
        <hr style="height: 1px; border: none; background-color: #000; margin: 10px 3px 0; width: 95%; margin-left: 20px;">
        <?php if(!empty($data["screenCategorizedFeaturedProducts"])) { ?>
        <?php foreach($data["screenCategorizedFeaturedProducts"] as $offeredProduct) : ; ?>
        <div class="col-md-3">
            <div class="card-sm">
            <div class="image">
                <img src="<?php echo URLROOT."/img/products/".$offeredProduct->varImg ?>" alt="Door" />
            </div>
            <div class="card-body">
                <div class="product-name" id="door-product" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700">
                    <?php echo $offeredProduct->product_name ?>
                </div>

                <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                    <span>Availbale Colors: <?php echo $offeredProduct->color ?></span>
                </div>
                <div class="prize">₱<?php echo number_format($offeredProduct->price, 2, '.', ',');?></div>
                </div>
                <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$offeredProduct->productId;?>">
                <button class=" view-details-button" data-toggle="modal" data-target="#myModal">
                    View Details
                </button>
                </form>
                <!-- <button class="view-details-button" data-toggle="modal" data-target="#myModal">
                    <i class="bi bi-cart-plus"></i>
                </button> -->

                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php }?>
  
      </div>
    </div>

<!-- Window -->
  <div class="container mt-5" id="windows" style="background-color: white; box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5); border-radius: 10px;">
    <div class="row g-3 my-2">
      <h3 class="mt-4 mx-3" style="text-align: left; margin-top: 20px; font-family:'Times New Roman', Times, serif; font-size: 40px;">WINDOWS</h3>
      <hr style="height: 1px; border: none; background-color: #000; margin: 10px 3px 0; width: 95%; margin-left: 20px;">
      <?php if(!empty($data["windowCategorizedFeaturedProducts"])) { ?>
        <?php foreach($data["windowCategorizedFeaturedProducts"] as $offeredProduct) : ; ?>
        <div class="col-md-3">
            <div class="card-sm">
            <div class="image">
                <img src="<?php echo URLROOT."/img/products/".$offeredProduct->varImg ?>" alt="Door" />
            </div>
            <div class="card-body">
                <div class="product-name" id="door-product" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700">
                    <?php echo $offeredProduct->product_name ?>
                </div>

                <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                    <span>Availbale Colors: <?php echo $offeredProduct->color ?></span>
                </div>
                <div class="prize">₱<?php echo number_format($offeredProduct->price, 2, '.', ',');?></div>
                </div>
                <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$offeredProduct->productId;?>">
                <button class=" view-details-button" data-toggle="modal" data-target="#myModal">
                    View Details
                </button>
                </form>
                <!-- <button class="view-details-button" data-toggle="modal" data-target="#myModal">
                    <i class="bi bi-cart-plus"></i>
                </button> -->

                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php }?>
    </div>
  </div>

    <!-- DOOR KNOBS -->
    <div class="container mt-5" id="others" style="background-color: white;  box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5); border-radius: 10px;">
      <div class="row g-3 my-2">
        <h3 class="mt-4 mx-3" style="text-align: left; margin-top: 20px; font-family:'Times New Roman', Times, serif; font-size: 40px;">DOOR KNOBS</h3>
        <hr style="height: 1px; border: none; background-color: #000; margin: 10px 3px 0; width: 95%; margin-left: 20px;">
        <?php if(!empty($data["knobCategorizedFeaturedProducts"])) { ?>
        <?php foreach($data["knobCategorizedFeaturedProducts"] as $offeredProduct) : ; ?>
        <div class="col-md-3">
            <div class="card-sm">
            <div class="image">
                <img src="<?php echo URLROOT."/img/products/".$offeredProduct->varImg ?>" alt="Door" />
            </div>
            <div class="card-body">
                <div class="product-name" id="door-product" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700">
                    <?php echo $offeredProduct->product_name ?>
                </div>

                <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                    <span>Availbale Colors: <?php echo $offeredProduct->color ?></span>
                </div>
                <div class="prize">₱<?php echo number_format($offeredProduct->price, 2, '.', ',');?></div>
                </div>
                <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$offeredProduct->productId;?>">
                <button class=" view-details-button" data-toggle="modal" data-target="#myModal">
                    View Details
                </button>
                </form>
                <!-- <button class="view-details-button" data-toggle="modal" data-target="#myModal">
                    <i class="bi bi-cart-plus"></i>
                </button> -->

                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php }?>
  
      </div>
    </div>

  <!-- OTHER PRODUCTS -->
  <div class="container mt-5" id="others" style="background-color: white;  box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.5); border-radius: 10px;">
    <div class="row g-3 my-2">
      <h3 class="mt-4 mx-3" style="text-align: left; margin-top: 20px; font-family:'Times New Roman', Times, serif; font-size: 40px;">OTHER PRODUCTS</h3>
      <hr style="height: 1px; border: none; background-color: #000; margin: 10px 3px 0; width: 95%; margin-left: 20px;">
      <?php if(!empty($data["otherCategorizedFeaturedProducts"])) { ?>
        <?php foreach($data["otherCategorizedFeaturedProducts"] as $offeredProduct) : ; ?>
        <div class="col-md-3">
            <div class="card-sm">
            <div class="image">
                <img src="<?php echo URLROOT."/img/products/".$offeredProduct->varImg ?>" alt="Door" />
            </div>
            <div class="card-body">
                <div class="product-name" id="door-product" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 700">
                    <?php echo $offeredProduct->product_name ?>
                </div>

                <div class="product-details" style="font-family: 'Times New Roman', Times, serif;">
                <div class="color">
                    <span>Availbale Colors: <?php echo $offeredProduct->color ?></span>
                </div>
                <div class="prize">₱<?php echo number_format($offeredProduct->price, 2, '.', ',');?></div>
                </div>
                <div class="action-buttons">
                <form action="<?php echo URLROOT."/products/show/".$offeredProduct->productId;?>">
                <button class=" view-details-button" data-toggle="modal" data-target="#myModal">
                    View Details
                </button>
                </form>
                <!-- <button class="view-details-button" data-toggle="modal" data-target="#myModal">
                    <i class="bi bi-cart-plus"></i>
                </button> -->

                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php }?>

    </div>
  </div>
  <!-- FOOTER -->
  <footer>
    <div class="section2 text-center text-white py-5" style="background-color: navy;">
      <div class="container section2-content">
        <div class="row">
          <div class="contact col-md-4">
            <h2 class="mb-4">Contact Us</h2>
            <div class="contact-info">
              <a type="button" href="tel:09292799021" target="_blank" class="d-flex align-items-center text-white text-decoration-none">
                <i class="bi bi-telephone me-2"></i>
                <span>Phone: +63 929 279 9021</span>
              </a>
              <a href="https://www.facebook.com/Villamin-Wood-Iron-Glass-Aluminum-Works-479583689050461" alt="facebook" class="d-flex align-items-center text-white text-decoration-none mt-2">
                <i class="bi bi-facebook me-2"></i>
                <span>Visit us on Facebook</span>
              </a>
              <a type="button" href="mailto:villaminwoodworks@gmail.com" target="_blank" class="d-flex align-items-center text-white text-decoration-none mt-2">
                <i class="bi bi-envelope me-2"></i>
                <span>Email: villaminwoodworks@gmail.com</span>
              </a>
            </div>
          </div>
          <div class="opening-hours col-md-4">
            <div class="hours">
              <h3>OPENING HOURS</h3>
              <p>MONDAY - SATURDAY: 11:00 AM - 6:00 PM</p>
              <p>SUNDAY: Closed</p>
            </div>
          </div>
          <div class="inquiries col-md-4">
            <a href="https://example.com">
              <h3>For More Inquiries</h3>
              <p>Feel free to reach out to us for any further inquiries or assistance.</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright text-center py-3" style="font-size: 18px; background-color: black; color: white;">
      &copy; 2023 Villamin Wood and Iron Works. All Rights Reserved.
    </div>
  </footer>


  <script>
    function filter(category) {

      if (category == "all") {
        document.getElementById('doors').style.display = 'block';
        document.getElementById('windows').style.display = 'block';
        document.getElementById('others').style.display = 'block';
        document.getElementById('screen-doors').style.display = 'block';
        document.getElementById('door-knobs').style.display = 'block';
      } else if (category == "doors") {
        document.getElementById('doors').style.display = 'block';
        document.getElementById('windows').style.display = 'none';
        document.getElementById('others').style.display = 'none';
        document.getElementById('screen-doors').style.display = 'none';
        document.getElementById('door-knobs').style.display = 'none';
      } else if (category == "windows") {
        document.getElementById('doors').style.display = 'none';
        document.getElementById('windows').style.display = 'block';
        document.getElementById('others').style.display = 'none';
        document.getElementById('screen-doors').style.display = 'none';
        document.getElementById('door-knobs').style.display = 'none';
      } else if (category == "screen-doors") {
        document.getElementById('doors').style.display = 'none';
        document.getElementById('windows').style.display = 'none';
        document.getElementById('others').style.display = 'none';
        document.getElementById('screen-doors').style.display = 'none';
        document.getElementById('door-knobs').style.display = 'block';
      }
      else if (category == "door-knobs") {
        document.getElementById('doors').style.display = 'none';
        document.getElementById('windows').style.display = 'none';
        document.getElementById('others').style.display = 'none';
        document.getElementById('screen-doors').style.display = 'block';
        document.getElementById('door-knobs').style.display = 'none';
      } else if (category == "others") {
        document.getElementById('doors').style.display = 'none';
        document.getElementById('windows').style.display = 'none';
        document.getElementById('others').style.display = 'block';
        document.getElementById('screen-doors').style.display = 'none';
        document.getElementById('door-knobs').style.display = 'none';
      }
    }
  </script>


  <script src="products.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>