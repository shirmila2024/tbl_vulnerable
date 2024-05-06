<?php
   session_start(); // Start the session
   
   if (!isset($_SESSION['loggedin'])) {
       header("Location: login.php");
       exit();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TBL - Admin</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" id="main-product-tab" data-toggle="tab" href="#main-product" role="tab" aria-controls="main-product" aria-selected="true">Main Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="sub-products-tab" data-toggle="tab" href="#sub-products" role="tab" aria-controls="sub-products" aria-selected="false">Sub Products</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="main-product-list-tab" data-toggle="tab" href="#main-product-list" role="tab" aria-controls="main-product-list" aria-selected="false">Main Product List</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="sub-product-list-tab" data-toggle="tab" href="#sub-product-list" role="tab" aria-controls="sub-product-list" aria-selected="false">Sub Product List</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="about-us-tab" data-toggle="tab" href="#about-us" role="tab" aria-controls="about-us" aria-selected="false">About Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Blog Management</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="parameter-management-tab" data-toggle="tab" href="#parameter-management" role="tab" aria-controls="parameter-management" aria-selected="false">Parameter Management</a>
            </li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <div class="tab-pane active" id="main-product" role="tabpanel" aria-labelledby="main-product-tab">
               <!-- Main Product Form -->
               <form action="main_product.php" method="POST" enctype="multipart/form-data" class="mt-3">
                  <div class="form-group">
                     <label for="product_name">Product Name</label>
                     <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required>
                  </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea class="form-control" id="description" name="description" rows="3" placeholder="Product Description" required></textarea>
                  </div>
                  <div class="form-group">
                     <label for="main_image">Main Image</label>
                     <input type="file" class="form-control-file" id="main_image" name="main_image" required>
                  </div>
                  <div class="form-group">
                       <label for="main_image2">Second Main Image</label>
                       <input type="file" class="form-control-file" id="main_image2" name="main_image2" required>
                    </div>
                    <div class="form-group">
                       <label for="main_image3">Third Main Image</label>
                       <input type="file" class="form-control-file" id="main_image3" name="main_image3" required>
                    </div>
                    <div class="form-group">
                       <label for="main_image4">Fourth Main Image</label>
                       <input type="file" class="form-control-file" id="main_image4" name="main_image4" required>
                    </div>
                  <div class="form-group">
                     <label for="sub_image">Sub Image</label>
                     <input type="file" class="form-control-file" id="sub_image" name="sub_image" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
            <div class="tab-pane" id="sub-products" role="tabpanel" aria-labelledby="sub-products-tab">
               <!-- Sub Products Form -->
               <form action="save_sub_product.php" method="POST" class="mt-3">
                  <div class="form-group">
                     <label for="product_id">Product ID</label>
                     <select class="form-control" id="product_id" name="product_id" required>
                        <option value="">Select a Product</option>
                        <?php
                           // Database connection variables
                           $host = "localhost"; 
                           $username = "u151986272_tbl";
                           $password = "Tbl@13124";
                           $database = "u151986272_tbl";
                           
                           // Create database connection
                           $conn = new mysqli($host, $username, $password, $database);
                           
                           // Check connection
                           if ($conn->connect_error) {
                               die("Connection failed: " . $conn->connect_error);
                           }
                           
                           // SQL to select product names and IDs
                           $sql = "SELECT id, product_name FROM main_product";
                           $result = $conn->query($sql);
                           
                           // Check if there are results
                           if ($result->num_rows > 0) {
                               // Output data of each row
                               while($row = $result->fetch_assoc()) {
                                   echo "<option value='".$row["id"]."'>".$row["product_name"]."</option>";
                               }
                           } else {
                               echo "<option value=''>No products found</option>";
                           }
                           ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="header_id">Header ID</label>
                     <select class="form-control" id="header_id" name="header_id" required>
                        <option value="">Select Header</option>
                        <?php
                           // SQL to select header IDs from the headers table
                           $sqlHeaders = "SELECT id FROM head";
                           $resultHeaders = $conn->query($sqlHeaders);
                           
                           if ($resultHeaders->num_rows > 0) {
                               while($rowHeader = $resultHeaders->fetch_assoc()) {
                                   echo "<option value='" . $rowHeader["id"] . "'>" . $rowHeader["id"] . "</option>";
                               }
                           } else {
                               echo "<option value=''>No headers found</option>";
                           }
                           ?>
                     </select>
                  </div>
                  <div id="dynamicFields">
                     <!-- Dynamic fields will be appended here -->
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
            <!-- Main Product List -->
            <div class="tab-pane" id="main-product-list" role="tabpanel" aria-labelledby="main-product-list-tab">
               <div class="mb-3">
                  <input type="text" class="form-control" id="mainProductSearch" placeholder="Search Main Products">
               </div>
               <table class="table mt-3">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        // Fetch Main Products and Display
                        $result = $conn->query("SELECT `id`, `product_name`, `description` FROM `main_product`");
                        while($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>{$row['id']}</td>
                                  <td>{$row['product_name']}</td>
                                  <td>{$row['description']}</td>
                                  <td>
                                  <a href='#' class='btn btn-warning editMainProductBtn' data-toggle='modal' data-target='#editMainProductModal' data-id='{$row['id']}' data-name='{$row['product_name']}' data-description='{$row['description']}'>Edit</a>
                                  <a href='delete_main_product.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
                                </tr>";
                        }
                        ?>
                  </tbody>
               </table>
            </div>
            <!-- Edit Main Product Modal -->
            <div class="modal fade" id="editMainProductModal" tabindex="-1" role="dialog" aria-labelledby="editMainProductModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="editMainProductModalLabel">Edit Main Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action="edit_main_product.php" method="POST">
                        <div class="modal-body">
                           <input type="hidden" id="editMainProductId" name="id">
                           <div class="form-group">
                              <label for="editProductName">Product Name</label>
                              <input type="text" class="form-control" id="editProductName" name="product_name" required>
                           </div>
                           <div class="form-group">
                              <label for="editProductDescription">Description</label>
                              <textarea class="form-control" id="editProductDescription" name="description" rows="3" required></textarea>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- Sub Product List -->
            <div class="tab-pane" id="sub-product-list" role="tabpanel" aria-labelledby="sub-product-list-tab">
               <div class="mb-3">
                  <input type="text" class="form-control" id="subProductSearch" placeholder="Search Sub Products">
               </div>
               <table class="table mt-3">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Header ID</th>
                        <th>Row 01</th>
                        <th>Row 02</th>
                        <th>Row 03</th>
                        <th>Row 04</th>
                        <th>Row 05</th>
                        <th>Row 06</th>
                        <th>Row 07</th>
                        <th>Row 08</th>
                        <th>Row 09</th>
                        <th>Row 10</th>
                        <th>Row 11</th>
                        <th>Row 12</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        // Fetch Sub Products and Display
                        $result = $conn->query("SELECT * FROM `product_detail`");
                        while($row = $result->fetch_assoc()) {
                          echo "<tr>
                          <td>{$row['id']}</td>
                                  <td>{$row['id']}</td>
                                  <td>{$row['product_id']}</td>
                                  <td>{$row['header_id']}</td>
                                  <td>{$row['field_1']}</td>
                                  <td>{$row['field_2']}</td>
                                  <td>{$row['field_3']}</td>
                                  <td>{$row['field_4']}</td>
                                  <td>{$row['field_5']}</td>
                                  <td>{$row['field_6']}</td>
                                  <td>{$row['field_7']}</td>
                                  <td>{$row['field_8']}</td>
                                  <td>{$row['field_9']}</td>
                                  <td>{$row['field_10']}</td>
                                  <td>{$row['field_11']}</td>
                                  <td>{$row['field_12']}</td>
                                  <td>
                                  <button class='btn btn-warning editSubProductBtn' data-toggle='modal' data-target='#editSubProductModal' 
                                data-id='{$row['id']}' data-product_id='{$row['product_id']}' data-header_id='{$row['header_id']}' data-field_1='{$row['field_1']}'
                                data-field_2='{$row['field_2']}' data-field_3='{$row['field_3']}' data-field_4='{$row['field_4']}' 
                                data-field_5='{$row['field_5']}' data-field_6='{$row['field_6']}' data-field_7='{$row['field_7']}' 
                                data-field_8='{$row['field_8']}' data-field_9='{$row['field_9']}' data-field_10='{$row['field_10']}' data-field_11='{$row['field_11']}' data-field_12='{$row['field_12']}'>Edit</button>
                                
                                
                                  <a href='delete_sub_product.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
                                </tr>";
                        }
                        ?>
                  </tbody>
               </table>
            </div>
            <!-- Edit Sub Product Modal -->
            <div class="modal fade" id="editSubProductModal" tabindex="-1" role="dialog" aria-labelledby="editSubProductModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="editSubProductModalLabel">Edit Sub Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action="edit_sub_product.php" method="POST">
                        <div class="modal-body">
                           <input type="hidden" id="editSubProductId" name="id">
                           <!-- Full set of form fields for sub-product attributes -->
                           <div class="form-group">
                              <label for="editProductID">Product ID</label>
                              <input type="text" class="form-control" id="editProductID" name="product_id" required>
                           </div>
                           <div class="form-group">
                              <label for="editProjectHeader">Header Id</label>
                              <input type="text" class="form-control" id="editProjectHeader" name="header_id" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow1">Row 1</label>
                              <input type="text" class="form-control" id="editRow1" name="field_1" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow2">Row 2</label>
                              <input type="text" class="form-control" id="editRow2" name="field_2" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow3">Row 3</label>
                              <input type="text" class="form-control" id="editRow3" name="field_3" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow4">Row 4</label>
                              <input type="text" class="form-control" id="editRow4" name="field_4" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow5">Row 5</label>
                              <input type="text" class="form-control" id="editRow5" name="field_5" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow6">Row 6</label>
                              <input type="text" class="form-control" id="editRow6" name="field_6" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow7">Row 7</label>
                              <input type="text" class="form-control" id="editRow7" name="field_7" required>
                           </div>
                           <div class="form-group">
                              <label for="editRow8">Row 8</label>
                              <input type="text" class="form-control" id="editRow8" name="field_8">
                           </div>
                           <div class="form-group">
                              <label for="editRow9">Row 9</label>
                              <input type="text" class="form-control" id="editRow9" name="field_9">
                           </div>
                           <div class="form-group">
                              <label for="editRow10">Row 10</label>
                              <input type="text" class="form-control" id="editRow10" name="field_10">
                           </div>
                           <div class="form-group">
                              <label for="editRow11">Row 11</label>
                              <input type="text" class="form-control" id="editRow11" name="field_11">
                           </div>
                           <div class="form-group">
                              <label for="editRow12">Row 12</label>
                              <input type="text" class="form-control" id="editRow12" name="field_12">
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
               <!-- About Us Form -->
               <form action="save_about_us.php" method="POST" class="mt-3">
                  <div class="form-group">
                     <label for="about1">About Section 1</label>
                     <textarea class="form-control" id="about1" name="about1" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                     <label for="about2">About Section 2</label>
                     <textarea class="form-control" id="about2" name="about2" rows="3" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
            <div class="tab-pane" id="blog" role="tabpanel" aria-labelledby="blog-tab">
               <!-- Blog Management Form -->
               <form action="save_blog.php" method="POST" enctype="multipart/form-data" class="mt-3">
                  <div class="form-group">
                     <label for="blog_image">Blog Image</label>
                     <input type="file" class="form-control-file" id="blog_image" name="blog_image" required>
                  </div>
                  <div class="form-group">
                     <label for="blog_topic">Blog Topic</label>
                     <input type="text" class="form-control" id="blog_topic" name="blog_topic" placeholder="Enter Blog Topic" required>
                  </div>
                  <div class="form-group">
                     <label for="blog_content">Blog Content</label>
                     <textarea class="form-control" id="blog_content" name="blog_content" rows="5" placeholder="Enter Blog Content" required></textarea>
                  </div>
                  <div class="form-group">
                     <label for="blog_date">Blog Date</label>
                     <input type="date" class="form-control" id="blog_date" name="blog_date" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
            <div class="tab-pane" id="parameter-management" role="tabpanel" aria-labelledby="parameter-management-tab">
               <form id="parameterForm" action="save_parameters.php" method="POST">
                  <div id="parameterFields">
                     <div class="form-group">
                        <label for="field_1">Field 1</label>
                        <input type="text" class="form-control" id="field_1" name="field_1">
                     </div>
                  </div>
                  <button type="button" class="btn btn-success" id="addFieldBtn">Add Field</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
      <!-- Bootstrap and jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script>
         $(document).ready(function() {
             $('#header_id').change(function() {
                 var headerId = $(this).val();
                 if (headerId) {
                     $.ajax({
                         url: 'get_header_data.php',
                         type: 'GET',
                         data: {header_id: headerId},
                         success: function(data) {
                             if (data) {
                                 $('#dynamicFields').empty(); // Clear existing fields
                                 for (let i = 1; i <= 12; i++) {
                                     if (data['field_' + i]) { // Check if field exists
                                         $('#dynamicFields').append('<div class="form-group"><label for="field_' + i + '">Field ' + i + '</label><input type="text" class="form-control" id="field_' + i + '" name="field_' + i + '" value="' + data['field_' + i] + '"></div>');
                                     } else {
                                         $('#dynamicFields').append('<div class="form-group"><label for="field_' + i + '">Field ' + i + '</label><input type="text" class="form-control" id="field_' + i + '" name="field_' + i + '" placeholder="Enter Field ' + i + '"></div>');
                                     }
                                 }
                             }
                         },
                         error: function(xhr, status, error) {
                             console.error("An error occurred: " + xhr.status + " " + xhr.statusText);
                         }
                     });
                 } else {
                     $('#dynamicFields').empty(); // Clear fields if no header selected
                 }
             });
         });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
         $(function () {
           $('#myTab li:last-child a').tab('show')
         })
      </script>
      <script>
         $(document).ready(function() {
             $('.editMainProductBtn').on('click', function() {
                 // Get product data from the button's data attributes
                 var id = $(this).data('id');
                 var name = $(this).data('name');
                 var description = $(this).data('description');
         
                 // Set the data in the modal's form fields
                 $('#editMainProductId').val(id);
                 $('#editProductName').val(name);
                 $('#editProductDescription').val(description);
             });
         });
      </script>
      <script>
         $(document).ready(function() {
           let fieldCount = 1;
         
           $('#addFieldBtn').click(function() {
             if (fieldCount < 12) {
               fieldCount++;
               $('#parameterFields').append('<div class="form-group"><label for="field_' + fieldCount + '">Field ' + fieldCount + '</label><input type="text" class="form-control" id="field_' + fieldCount + '" name="field_' + fieldCount + '"></div>');
             } else {
               alert('Maximum of 12 fields reached');
             }
           });
         });
      </script>
      <script>
         $(document).ready(function() {
             $('.editSubProductBtn').on('click', function() {
                 $('#editSubProductId').val($(this).data('id'));
                 $('#editProductID').val($(this).data('product_id'));
                 $('#editProjectHeader').val($(this).data('header_id'));
                 $('#editRow1').val($(this).data('field_1'));
                 $('#editRow2').val($(this).data('field_2'));
                 $('#editRow3').val($(this).data('field_3'));
                 $('#editRow4').val($(this).data('field_4'));
                 $('#editRow5').val($(this).data('field_5'));
                 $('#editRow6').val($(this).data('field_6'));
                 $('#editRow7').val($(this).data('field_7'));
                 $('#editRow8').val($(this).data('field_8'));
                 $('#editRow9').val($(this).data('field_9'));
                 $('#editRow10').val($(this).data('field_10'));
                 $('#editRow11').val($(this).data('field_11'));
                 $('#editRow12').val($(this).data('field_12'));
             });
         });
      </script>
      <script>
         $(document).ready(function() {
             // Search for Sub Products
             $("#subProductSearch").on("keyup", function() {
                 var value = $(this).val().toLowerCase();
                 $("#sub-product-list table tbody tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                 });
             });
         
             // Search for Main Products
             $("#mainProductSearch").on("keyup", function() {
                 var value = $(this).val().toLowerCase();
                 $("#main-product-list table tbody tr").filter(function() {
                     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                 });
             });
         });
      </script>
      <?php
         $conn->close();
                    ?>
   </body>
</html>