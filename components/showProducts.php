<?php
// Query to fetch products from the database
                $sql = "SELECT * FROM products ORDER BY RAND()";
                $result = $conn->query($sql);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Output HTML for displaying each product with onclick event
                        echo '<div class="card">';
                        echo '<div class="img cen" onclick="viewProduct(' . $row["product_id"] . ')">';
                        echo '<img src="../products' . $row["image1"] . '" alt="' . $row["product_name"] . '">';
                        echo '</div>';
                        echo '<span>';
                        echo '<h4 onclick="viewProduct(' . $row["product_id"] . ')">' . $row["product_name"] . '</h4>';
                        echo '<div class="stars">';
                        echo '<i class="bi bi-star-fill"></i>';
                        echo '<i class="bi bi-star-fill"></i>';
                        echo '<i class="bi bi-star-fill"></i>';
                        echo '<i class="bi bi-star-fill"></i>';
                        echo '<i class="bi bi-star-fill"></i>';
                        echo '<aside>(24)</aside>';
                        echo '</div>';
                        echo '<div class="price">$' . $row["product_price"] . '</div>';
                        echo '<div class="bag cen" onclick="addToCart(' . $row["product_id"] . ')">';
                        echo '<div class="i cen" ><i class="bi bi-bag-plus"></i></div>';
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