<?php
  require APPROOT . "/views/templates/adminHeader.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Added missing width=device-width -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="orders.css" />
    <title>DASHBOARD</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"
    />
    <link
      rel="stylesheet"
      href=" https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"
    />
    <script
      type="text/javascript"
      charset="utf8"
      src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"
    ></script>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .buttons-blue {
        background-color: navy;
        color: white;
      }

      .buttons-blue:hover {
        background-color: white;
        color: navy;
        border-color: navy;
      }

      body {
        min-height: 100vh;
      }

      a {
        text-decoration: none;
      }

      li {
        list-style: none;
      }

      h1 {
        color: navy;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
      }

      h2 {
        color: black;
        text-align: left;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        width: 100%;
      }

      .brand-name span {
        color: gold;
      }

      /* STYLE FOR Input BUTTON */
      /* input {
            background: navy;
            color: white;
            padding: 5px 8px;
            text-align: center;
            font-size: 0.7rem;
            border: none;
            margin-top: 5px;
        } */

      /* input:hover {
            background: #1b203d;
        } */

      /* .search {
            background-color: white;
            border: 2px solid #ddd;

        } */

      .btn-search1 {
        font-size: 0.5rem;
        background: navy;
        color: white;
        padding: 0.25rem;
        border-radius: 0.25rem;
        margin-left: 0rem;
      }

      h3 {
        color: #999;
      }

      .title {
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 15px 10px;
        border-bottom: 2px solid goldenrod;
      }

      /* STYLE FOR THE TABLE */
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th,
      td {
        padding: 8px;
        text-align: center;
        font-family: "Times New Roman", Times, serif;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      tr:hover {
        background-color: #d1d1d1;
      }

      /* STYLE FOR SIDEBAR */
      /* LOGO ADJUSTMENT */
      .logo {
        font-size: 30px;
        margin: 0;
        margin-top: 30px;
        margin-left: 60px;
        font-weight: bold;
        color: white;
        margin-bottom: 30px;
      }

      .logo span {
        color: gold;
      }

      /* MAIN DASHBOARD */
      .sidebar {
        width: 20vw;
        background-color: navy;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        padding-top: 20px;
      }

      .sidebar a {
        display: block;
        color: white;
        font-size: 15px;
        padding: 15px 8px 15px 32px;
        margin-left: 30px;
        text-decoration: none;
        transition: 0.3s;
      }

      .sidebar a:hover {
        background-color: #1b203d;
        border-radius: 10px;
      }

      .container {
        position: absolute;
        right: 0;
        width: 80vw;
        height: 100vh;
        background: #f1f1f1;
      }

      /* FORMAT FOR THE CONTENT  */
      .container .content {
        position: relative;
        margin-top: 10vh;
        min-height: 90vh;
        background: #f1f1f1;
      }

      /* STYLE FOR THE TABLE FOR PENDING PAYMENTS */
      .container .content .content-1 .pending-payments {
        min-height: 50vh;
        flex: 3;
        background: white;
        margin: 0 25px 25px 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
      }

      .pending-shipping {
        min-height: 50vh;
        flex: 3;
        background: white;
        margin: 0 25px 25px 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
      }

      .pending-payments {
        min-height: 50vh;
        flex: 3;
        background: white;
        margin: 0 25px 25px 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
      }

      .completed-orders {
        min-height: 50vh;
        flex: 3;
        background: white;
        margin: 0 25px 25px 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
      }

      .container .content .content-2 .completed-orders {
        min-height: 50vh;
        flex: 2;
        background: white;
        margin: 0 25px 25px 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
      }

      .container .content .content-2 .new-orders table td:nth-child(1) {
        height: 40px;
        width: 40px;
      }

      @media screen and (max-width: 768px) {
        .sidebar {
          width: 100%;
        }

        .container {
          width: 100%;
          padding: 0;
        }
      }

      @media screen and (max-width: 1050px) {
        .side-menu li {
          font-size: 18px;
        }
      }

      @media screen and (max-width: 940px) {
        .side-menu li span {
          display: none;
        }

        .side-menu {
          align-items: center;
        }

        .sidemenu li img {
          width: 40px;
          height: 40px;
        }
      }

      @media screen and (max-width: 536px) {
        .brand-name h1 {
          font-size: 16px;
        }

        .container .content .cards {
          justify-content: center;
        }

        .side-menu li img {
          width: 30px;
          height: 30px;
        }

        .container .content .content-2 .recent-payments table th:nth-child(2),
        .container .content .content-2 .recent-payments table td:nth-child(2) {
          display: none;
        }
      }
    </style>
  </head>

  <body style="background-color: beige;">
    <!-- CONTENT CARDS FOR CUSTOMERS, TOTAL ORDERS AND SALES -->
    <!-- <div class="container" id="content-container">
        <div class="content" id="dashboard"> -->

    <div class="content">
      <div class="pending-payments p-3 rounded mt-3">
        <div class="title mb-3">
          <h2>PENDING ORDERS FOR PAYMENT</h2>
          <!-- <input class="search" id="search-input" class="search-box1" type="text" name="search_query" value="" placeholder=" Search...">
                    <button class="btn-search1" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button> -->
        </div>
        <p
          class=""
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapseExample"
          aria-expanded="false"
          aria-controls="collapseExample"
        >
          <i class="bi bi-funnel-fill" style="color: navy"></i> Filter
        </p>
        <div class="collapse" id="collapseExample">
          <div class="">
            Minimum date:
            <input type="text" id="min" name="min" class="form-control w-25" />

            Maximum date:
            <input type="text" id="max" name="max" class="form-control w-25" />
          </div>
        </div>
        <div class="mb-3"></div>
        <table id="pending_payment" class="table mt-3 table-hover">
          <thead>
            <th class="text-center">#</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Transaction ID</th>
            <th class="text-center">Customer ID</th>
            <th class="text-center">Total Amount</th>
            <th class="text-center">Status</th>
            <th class="text-center">Method</th>
            <th class="text-center">
              For Product Installation?
              <select
                class="form-select form-select-sm"
                aria-label="form-select-sm example"
                id="select_pending"
              >
                <option selected value="all">All</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </th>
            <th class="text-center">Installation Period</th>
            <th class="text-center">Action</th>
          </thead>
          <tbody>
            <?php foreach($data["forPaymentTransactions"] as $key => $details) : ?>
              <tr>
                <th scope="row"><?php echo $key + 1; ?></th>
                <td><?php echo $details->name; ?></td>
                <td><?php echo $details->transactionId; ?></td>
                <td><?php echo $details->customerId; ?></td>
                <td><?php echo $details->amount; ?></td>
                <td><?php echo $details->status; ?></td>
                <td><?php echo $details->method; ?></td>
                <td><?php echo $details->forProductInstallation;?></td>
                <td><?php echo $details->productInstallationStart;?></td>

                <td>
                    <form class="mx-1" action="<?php echo URLROOT."/admin/dashboard/markAsPaid/".$details->transactionId ?>" method="post" style="display: inline">
                        <input type="submit" value="Process Order" class="btn btn-sm buttons-blue">
                    </form>
                  <!-- <button class="btn btn-sm buttons-blue">PROCESS ORDER</button> -->
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="content">
      <div class="pending-shipping p-3 rounded mt-3">
        <div class="title mb-3">
          <h2>PENDING ORDERS FOR SHIPPING</h2>
        </div>
        <p
          class=""
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#pendingCollapse"
          aria-expanded="false"
          aria-controls="pendingCollapse"
        >
          <i class="bi bi-funnel-fill" style="color: navy"></i> Filter
        </p>
        <div class="collapse mb-3" id="pendingCollapse">
          <div class="">
            Minimum date:
            <input
              type="text"
              id="min_pending"
              name="min_pending"
              class="form-control w-25"
            />

            Maximum date:
            <input
              type="text"
              id="max_pending"
              name="max_pending"
              class="form-control w-25"
            />
          </div>
        </div>
        <table id="pending_shipping" class="table m-3 table-hover">
          <thead>
            <th class="text-center">#</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Transaction ID</th>
            <th class="text-center">Customer ID</th>
            <th class="text-center">Shipping Address</th>
            <th class="text-center">Status</th>
            <th class="text-center">Method</th>
            <th class="text-center">For Product Installation?
                <select
                class="form-select form-select-sm"
                aria-label="form-select-sm example"
                id="select_shipping"
              >
                <option selected value="all">All</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </th>
            <th class="text-center">Installation Period
              
            </th>
            <th class="text-center">Action</th>
          </thead>
          <tbody>
            <?php foreach($data["forShippingTransactions"] as $key => $details) : ?>
              <tr>
                <th scope="row"><?php echo $key + 1; ?></th>
                <td><?php echo $details->name; ?></td>
                <td><?php echo $details->transactionId; ?></td>
                <td><?php echo $details->customerId; ?></td>
                <td><?php echo $details->shippingAddress; ?></td>
                <td><?php echo $details->status; ?></td>
                <td><?php echo $details->method; ?></td>
                <td><?php echo $details->forProductInstallation;?></td>
                <td><?php echo $details->productInstallationStart;?></td>
                
                <td>
                  <button class="btn btn-sm buttons-blue">PROCESS ORDER</button>
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
        
    <div class="content">
      <div class="completed-orders p-3 rounded mt-3">
        <div class="title mb-3">
          <h2>COMPLETED ORDERS</h2>
        </div>
        <p
          class=""
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#pendingCollapse"
          aria-expanded="false"
          aria-controls="pendingCollapse"
        >
          <i class="bi bi-funnel-fill" style="color: navy"></i> Filter
        </p>
        <div class="collapse mb-3" id="pendingCollapse">
          Minimum date:
          <input
            type="text"
            id="min_complete"
            name="min_complete"
            class="form-control w-25"
          />

          Maximum date:
          <input
            type="text"
            id="max_complete"
            name="max_complete"
            class="form-control w-25"
          />
        </div>
        <table id="completed_orders" class="table m-3 table-hover">
          <thead>
            <th class="text-center">#</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Transaction ID.</th>
            <th class="text-center">Customer ID</th>
            <th class="text-center">Shipping Address</th>
            <th class="text-center">Status</th>
            <th class="text-center">Method</th>
            <th class="text-center">Date</th>
            <th class="text-center">Action</th>
          </thead>
          <tbody>
              <?php foreach($data["completedOrders"] as $key => $details) : ?>
                <tr>
                  <th scope="row"><?php echo $key + 1; ?></th>
                  <td><?php echo $details->name; ?></td>
                  <td><?php echo $details->transactionId; ?></td>
                  <td><?php echo $details->customerId; ?></td>
                  <td><?php echo $details->shippingAddress; ?></td>
                  <td><?php echo $details->status; ?></td>
                  <td><?php echo $details->method; ?></td>
                  <td><?php echo $details->updatedOn;?></td>

                  <td>
                    <button class="btn btn-sm buttons-blue">PROCESS ORDER</button>
                  </td>
                </tr>
              <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script>
      $(document).ready(function () {
        var table = $("#pending_payment").DataTable({
            columnDefs: [
            { targets: [7], orderable: false } 
            // Replace [1] with the index of the column you want to disable filtering for
        ],
          search: {
            regex: true,
          },
          order: [[8, "asc"]],
          responsive: true,

          buttons: [
            {
              extend: "excel",
              className: "mt-2 buttons-blue me-1",
              text: "Download as Excel",
              filename: "PENDING ORDERS FOR PAYMENT",
              title: "PENDING ORDERS FOR PAYMENT",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "pdf",
              className: "mt-2 btn buttons-blue me-1",
              text: "Download as PDF",
              filename: "PENDING ORDERS FOR PAYMENT",
              title: "PENDING ORDERS FOR PAYMENT",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6],
              },
            },
          ],
        });
        table
          .buttons()
          .container()
          .appendTo("#pending_payment_wrapper .col-md-6:eq(0)");

        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        DataTable.ext.search.push(function (settings, data, dataIndex) {
          var min = minDate.val();
          var max = maxDate.val();
          var date = new Date(data[8]);

          if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
          ) {
            return true;
          }
          return false;
        });

        // Create date inputs
        minDate = new DateTime("#min", {
          format: "MMMM Do YYYY",
        });
        maxDate = new DateTime("#max", {
          format: "MMMM Do YYYY",
        });

        // Refilter the table
        $("#min, #max").on("change", function () {
          table.draw();
        });
        

        $('#select_pending').on('change', function() {
            if (this.value == "all") {
                table.columns(7).search('').draw();
            } else {
                table.columns(7).search("^" + this.value + "$", true, false, true).draw();
            }
        });
        
        
        

        var table_1 = $("#pending_shipping").DataTable({
          search: {
            regex: true,
          },
          columnDefs: [
            { targets: [7], orderable: false } 
            // Replace [1] with the index of the column you want to disable filtering for
        ],
          order: [[8, "asc"]],
          responsive: true,

          buttons: [
            {
              extend: "excel",
              className: "mt-2 buttons-blue me-1",
              text: "Download as Excel",
              filename: "",
              title: "",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "pdf",
              className: "mt-2 btn buttons-blue me-1",
              text: "Download as PDF",
              filename: "",
              title: "",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6],
              },
            },
          ],
        });
        table_1
          .buttons()
          .container()
          .appendTo("#pending_shipping_wrapper .col-md-6:eq(0)");

        var minDate_pending, maxDate_pending;

        // Custom filtering function which will search data in column four between two values
        DataTable.ext.search.push(function (settings, data, dataIndex) {
          var min = minDate_pending.val();
          var max = maxDate_pending.val();
          var date = new Date(data[8]);

          if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
          ) {
            return true;
          }
          return false;
        });

        // Create date inputs
        minDate_pending = new DateTime("#min_pending", {
          format: "MMMM Do YYYY",
        });
        maxDate_pending = new DateTime("#max_pending", {
          format: "MMMM Do YYYY",
        });

        // Refilter the table
        $("#min_pending, #max_pending").on("change", function () {
          table_1.draw();
        });

        $('#select_shipping').on('change', function() {
            if (this.value == "all") {
                table_1.columns(7).search('').draw();
            } else {
                table_1.columns(7).search("^" + this.value + "$", true, false, true).draw();
            }
        });

        // TABLE 3
        var table_2 = $("#completed_orders").DataTable({
          search: {
            regex: true,
          },
          order: [[3, "asc"]],
          responsive: true,

          buttons: [
            {
              extend: "excel",
              className: "mt-2 buttons-blue me-1",
              text: "Download as Excel",
              filename: "",
              title: "",
              exportOptions: {
                columns: [0, 1, 2, 3, 4],
              },
            },
            {
              extend: "pdf",
              className: "mt-2 btn buttons-blue me-1",
              text: "Download as PDF",
              filename: "",
              title: "",
              exportOptions: {
                columns: [0, 1, 2, 3, 4],
              },
            },
          ],
        });
        table_2
          .buttons()
          .container()
          .appendTo("#completed_orders_wrapper .col-md-6:eq(0)");

        var minDate_complete, maxDate_complete;

        // Custom filtering function which will search data in column four between two values
        DataTable.ext.search.push(function (settings, data, dataIndex) {
          var min = minDate_complete.val();
          var max = maxDate_complete.val();
          var date = new Date(data[6]);

          if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
          ) {
            return true;
          }
          return false;
        });

        // Create date inputs
        minDate_complete = new DateTime("#min_complete", {
          format: "MMMM Do YYYY",
        });
        maxDate_complete = new DateTime("#max_complete", {
          format: "MMMM Do YYYY",
        });

        // Refilter the table
        $("#min_complete, #max_complete").on("change", function () {
          table_2.draw();
        });
      });
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
