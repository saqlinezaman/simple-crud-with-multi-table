<?php
// Include the database connection file
include "connectDB.php";
$errorMAssage = "";
$successMessage = "";

// fetch categories for dropdown

$category_statement = $db_connect->prepare("SELECT * FROM categories");
$category_statement->execute();
$categories = $category_statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- add product form -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <!-- bootstrap cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
    <section class="m-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 text-primary">Add Product</h3>

                <!-- Display error or success messages -->
                <?php if(!empty($errorMAssage)) echo '<div class="alart alart-danger">$errorMAssage</div>' ?>
                <?php if(!empty($successMessage)) echo '<div class="alart alart-success">$successMessage</div>' ?>

                <!-- start form -->
                <form action="store.php" method="POST" enctype="multipart/form-data">
                    <!-- name -->
                    <div class="form-group mt-1">
                        <label class="form-label"" for="">Product Name :</label>
                        <input type="text" name="product_name" id="" class="form-control" placeholder="Enter Product Name" required>
                    </div>
                    <!-- Price -->
                    <div class=" form-group mt-1 ">
                        <label class="form-label"" for="">Product Price :</label>
                        <input type="text" name="product_price" id="" class="form-control" placeholder="Enter Product price" required>
                    </div>
                    <!-- image -->
                    <div class=" form-group mt-1 ">
                        <label class="form-label"" for="">Product image :</label>
                        <input type="file" name="product_image" id="" class="form-control" required>
                    </div>

                     <!-- stock amount  -->
                    <div class=" form-group mt-1 ">
                        <label class="form-label"" for="">Stock Amount :</label>
                        <input type="number" name="stock_amount" id="" class="form-control" required placeholder="Enter Stock Amount">
                    </div>
                     <!-- category  -->
                    <div class=" form-group mt-1 ">
                        <label class="form-label"" for="">Category :</label>
                        <select name="category_id" class="form-control" id="" required>
                            <option value="">Select category</option>
                            <option value="">null</option>
                        </select>
                    </div>
                    
                    <!-- description -->
                    <div class=" form-group mt-1 ">
                        <label class="form-label"" for="">Product description :</label>
                        <textarea rows="4" name="product_description" id="" class="form-control" placeholder="Enter Product description" required></textarea>
                    </div>
                    
                    <!-- attribute -->
                     <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" name="has_attribute" class="form-check-input" id="has_attribute" value="1" onchange="">
                        <label for="form-check-label">Has Attribute?</label>
                     </div>
                     <!-- attribute section -->
                      <div class="" id="attributeSection" style="display: none;">
                        <div class="form-group">
                            <label for="">Sizes</label>
                            
                            <label for="" class="checkbox-inline mr-2">
                                <input type="checkbox" name="sizes[]" value="M" id="">M
                            </label>

                            <label for="" class="checkbox-inline mr-2">
                                <input type="checkbox" name="sizes[]" value="L" id="">L
                            </label>

                            <label for="" class="checkbox-inline mr-2">
                                <input type="checkbox" name="sizes[]" value="XL" id="">XL
                            </label>

                            <label for="" class="checkbox-inline mr-2">
                                <input type="checkbox" name="sizes[]" value="XXL" id="">XXL
                            </label>
                        </div>
                        <div class="form-group mt-3 d-flex align-items-center gap-2">
                            <label class="mr-2" for="">Colors :</label>
                            <input type="color" name="" class="color-input" id="">
                            <button type="button" class="btn btn-sm btn-secondary" onclick="" >Add</button>
                            <input type="hidden"  name="colors" id="colors">
                        </div>
                      </div>
                    <!-- submit button -->
                     <button type="submit" name="submit-btn" class="btn btn-success mt-4">Add Product</button>
                </form>
                <!-- end form -->
            </div>
            <div class="col-md-6"></div>
        </div>
    </section>
 </body>
 </html>