<?php include_once("./functions/vehicles.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Long PHP Project</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="static/styles/styles.css" />

  </head>

  <body>
    <div id="parent" class="main slideout-panel slideout-panel-left">
      <!-- Top -->
      <div id="topnav">
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <a href="#">1600 Main St • Tifton, TN 38401</a>
            </div>
            <div class="col-sm">
              <a href="#">(423) 823 9012</a>
            </div>
            <div class="col-sm">
              Today's Hours: Closed
            </div>
            <div class="col-sm">
              English/Spanish
            </div>
          </div>
        </div>
      </div>

      <!-- Nav -->
      <div class="row" id="nav">
        <div class="col-1">
          <!-- Home Link -->
        </div>

        <div class="col-11">
          <nav>
            <ul class="list-group list-group-horizontal">
              <li>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">Inventory</a>
              </li>
              <li>
                <a href="#">Shop From Home</a>
              </li>
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
                <a href="#">Finance</a>
              </li>
              <li>
                <a href="#">News &amp; Updates</a>
              </li>
              <li>
                <a href="#">Parts &amp; Service</a>
              </li>
              <li>
                <a href="#">Long Bodyshop</a>
              </li>
              <li>
                <a href="#">Login Here</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- Content Start -->
      <div class="main" id="main">
        <div class="container-fluid">
          <div class="vehicles" id="vehicles">

            <!-- Top Ad -->
            <div class="row" id="vehicle_advert">
              <a href="#">
                <img src="static/images/700CreditBanner6.png" alt="Advertisment" />
              </a> 
            </div>

            <!-- Vehicles Main -->
            <div class="row" id="vehicles_list">
            
              <!-- Context Pane -->
              <div class="col-lg-2 col-md-4">

              </div>

              <!-- Results Pane -->
              <div class="col-lg-10 col-md-8">
                <?php
                  $vehicles = new Vehicles();
                  return $vehicles->generate_page();
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="container-fluid" id="footer">
        
        <!-- Footer Nav -->
        <div class="row">
          <div class="col">
            <h2>Inventory</h2>
            <ul class="">
              <li>
                <a href="#">New Vehicles</a>
              </li>
              <li>
                <a href="#">Pre-Owned Vehicles</a>
              </li>
              <li>
                <a href="#">Special Offers</a>
              </li>
            </ul>
          </div>

          <div class="col">
            <h2>Finance</h2>
            <ul class="">
              <li>
                <a href="#">Apple for Financing</a>
              </li>
              <li>
                <a href="#">Value Your Trade</a>
              </li>
            </ul>
          </div>

          <div class="col">
            <h2>Service & Parts</h2>
            <ul class="">
              <li>
                <a href="#">Schedule Service</a>
              </li>
              <li>
                <a href="#">Service Specials</a>
              </li>
            </ul>
          </div>

          <div class="col">
            <h2>Our Dealership</h2>
            <ul class="list-group">
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
              <a href="#">Contact Us</a>
              </li>
              <li>
                <a href="#">Reviews</a>
              </li>
              </li>
            </ul>
          </div>

          <div class="col">
            <h2>Stay Connected</h2>
            <ul class="list-group">
              <li>
                <a href="#">Facebook</a>
              </li>
              <li>
                <a href="#">Twitter</a>
              </li>
              <li>
                <a href="#">Instagram</a>
              </li>
              <li>
                <a href="#">Mastodon</a>
              </li>
              <li>
                <a href="#">Bluesky</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Footer Closing -->
        <div class="row">
          <div class="col">
            <ul class="list-group list-group-horizontal">
              <li>
                <a href="#">Terms</a>
              </li>
              <li>
                <a href="#">Privacy</a>
              </li>
              <li>
                <a href="#">Privacy and Cookie Policy</a>
              </li>
              <li>
                <a href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>
