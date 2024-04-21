<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            Add Product
        </nav>
        <div class="panel cen">
            <span>Dashboard</span>
            <span>Products</span>
            <span>Orders</span>
            <span>Settings</span>
          
          </div>
         <div class="content">
            <h4>Lorem ipsum, dolor sitr adipisicing.</h4>
            <p>Lorem ipsum dolor sit.</p>
  
            <div class="products orders">
                <h4>Add Product</h4>
                <form action="backend/addProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="inputItem">
                        <input type="text" name="productName" placeholder="Product Name"  required>
                    </div>
                    <div class="inputItem">
                        <input type="text" name="productPrice" placeholder="Product Price"  required>
                    </div>
                    <div class="inputItem desc">
                        <textarea name="productDescription" placeholder="Short Description" cols="30" rows="10"  required></textarea>
                    </div>
                    <div class="inputItem">
                        <select name="category"  required>
                        <option value="">Category</option>
                        <option value="">Categorydd</option>
                        </select>
                    </div>
                    <div class="inputItem file cen">
                        <input type="file" name="productImage1" placeholder="Product Image" required>
                    </div>
                    <div class="inputItem file cen">
                        <input type="file" name="productImage2" placeholder="Product Image">
                    </div>
                    <div class="inputItem file cen">
                        <input type="file" name="productImage3" placeholder="Product Image">
                    </div>
                    <div class="inputItem file cen">
                        <input type="file" name="productImage4" placeholder="Product Image">
                    </div>
                    <button type="submit">Add Product</button>
                </form>
            </div>
         </div>
    </div>
</body>
</html>
