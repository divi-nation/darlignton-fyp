<nav class="">
        <div class="logo n cen">
            <img src="../assets/logo.png" alt="">
        </div>

        <div class="nav_content n cen">
            <div class="tabs cen">
                <!-- Navigation Tabs -->
                <span class="cen" onclick="location.href='../home/'">Home</span>
                <span class="cen" onclick="location.href='../discover/'">Discover</span>
                <span class="cen" onclick="location.href='../shop/'">Shop</span>
                <span class="cen" onclick="location.href='../hotdeals/'">Hot Deals</span>
                <span class="cen" onclick="location.href='../scan/'">Swift Pay</span>
            </div>
        </div>

        <div class="search n cen">
            <!-- Search Input -->
            <input type="text" id="searchInput" placeholder="Search for products or vendors">
            <i class="bi bi-search"></i>
            <div class="results" id="searchResults"></div>
        </div>

        <div class="cart n cen" onclick="toggle_items('.mycart'); updateOrderSummary();">
            <!-- Shopping Cart Icon -->
            <div class="cir cen">
                <i class="bi bi-cart4"></i>
            </div>
        </div>

        <div class="hb"><i class="bi bi-list" onclick="toggle_items('.mobile_nav')"></i></div>
    </nav>

    <div class="mobile_nav">
        <span onclick="toggle_items('.mobile_nav')"></span>
        <span class="m_nav_tabs">
            <div class="search n cen ms">
                <!-- Search Input -->
                <input type="text" id="searchInput" placeholder="Search for products or vendors">
                <i class="bi bi-search"></i>
                <div class="results" id="searchResults"></div>
            </div>

            <div class="m_tabs">
                <span class="cen" onclick="location.href='../home/'">Home</span>
                <span class="cen" onclick="location.href='../discover/'">Discover</span>
                <span class="cen" onclick="location.href='../shop/'">Shop</span>
                <span class="cen" onclick="location.href='../hotdeals/'">Hot Deals</span>
                <span class="cen" onclick="location.href='../scan/'">Swift Pay</span>
            </div>

            <div class="cart n cen mc" onclick="toggle_items('.mycart'); updateOrderSummary();">
            <!-- Shopping Cart Icon -->
            <div class="cir cen">
                <i class="bi bi-cart4"></i>
            </div>
        </div>

        </span>
    </div>              


    <script>
        function toggle_items(item_name){
    // Select the element with the specified name
            element = document.querySelector(item_name);
            // Toggle the "active" class to show/hide the element
            element.classList.toggle("active");
}
    </script>