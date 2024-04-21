<?php require_once "conn.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marina Mall Marketplace</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>

    <div class="container">
        <nav class="">
            <div class="logo n cen">
                <img src="logo.png" alt="">
 
            </div>

            <div class="nav_content n cen">

                <div class="tabs cen">
                    <span class="cen">Categories</span>
                    <span class="cen">Discover</span>
                    <span class="cen" onclick="location.href='shop.html'">Shop</span>
                    <span class="cen">Hot Deals</span>
                    <span class="cen">Swift Pay</span>

                </div>

              


            </div>

            <div class="search n cen">
                <input type="text" placeholder="Search for products or vendors">
                <i class="bi bi-search"></i>
            </div>

            <div class="cart n cen">
                <div class="cir cen">
                    <i class="bi bi-cart4"></i>

                </div>
            </div>

        </nav>


        <div class="content cen">
            <div class="hero">
                <span class="hs1">
                    <h3>Limited Time Offer, Save Big on MacBook and MacBook Air</h3>
                    <button>Shop Now</button>
                </span>
                <span class="hs2">
                    <img src="mac.png" alt="">
                </span>

            </div>

            <div class="categories ">
                <div class="cover">

                </div>
                <div class="wrap">

                    <aside class="">

                        <div class="cat cen">
                            <img src="tech.png" alt="">
                            <h3>Electronics</h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="chips.png" alt="">
                            <h3>Snacks</h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="sports.png" alt="">
                            <h3>Sports</h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="bas.png" alt="">
                            <h3>Books and Stationary</h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="fag.png" alt="">
                            <h3>Food and Grocerries </h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="baw.png" alt="">
                            <h3>Beauty and Wellness</h3>
    
                        </div>
                        <div class="cat cen">
                            <img src="aac.png" alt="">
                            <h3>Art and Craft</h3>
    
                        </div>
                        

                        
    
                    </aside>
    

                </div>
               
               

            </div>

            <div class="featured">
                <?php

                    $sql = "SELECT * FROM products LIMIT 12";
                    $result = $conn->query($sql);

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // Output HTML for displaying each product with onclick event
                            echo '<div class="card" onclick="viewProduct(' . $row["product_id"] . ')">';
                            echo '<div class="img cen">';
                            echo '<img src="./products/' . $row["image1"] . '" alt="' . $row["product_name"] . '">';
                            echo '</div>';
                            echo '<span>';
                            echo '<h4>' . $row["product_name"] . '</h4>';
                            echo '<div class="stars">';
                            echo '<i class="bi bi-star-fill"></i>';
                            echo '<i class="bi bi-star-fill"></i>';
                            echo '<i class="bi bi-star-fill"></i>';
                            echo '<i class="bi bi-star-fill"></i>';
                            echo '<i class="bi bi-star-fill"></i>';
                            echo '<aside>(24)</aside>';
                            echo '</div>';
                            echo '<div class="price">$' . $row["product_price"] . '</div>';
                            echo '<div class="bag cen">';
                            echo '<div class="i cen"><i class="bi bi-bag-plus"></i></div>';
                            echo '<h6>Add to cart</h6>';
                            echo '</div>';
                            echo '</span>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }

                    // Close connection
                    $conn->close();
                    ?>


             </div>

            
            <div class="merch">
                <span class="s1">
                    <div class="slant"></div>

                    <h3>Become A Vendor</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, quisquam vero animi numquam molestiae eum at iusto, culpa a illo rem autem delectus. Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br> Corrupti atque dicta hic aliquid consequatur sapiente.

                    </p>
                    <button>Sign Up</button>
                </span>
                <span></span>
            </div>

            <!-- <div class="hot">

                <div class="gc">
                    <div class="bg">

                    </div>
                </div>

            </div> -->
            
        </div>


    </div>

    <script>
    function viewProduct(productId) {
        // Redirect to product.php with the product ID in the URL
        window.location.href = 'product.php?product_id=' + btoa(productId);
    }
</script>
    
</body>
</html>