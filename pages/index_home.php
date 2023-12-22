<?php require_once "../config/config.php" ?>

<?php include_once "../pages/includes/header_pages.php"?>

<main>
    <section id="slider">
        <div class="light-dark">
            <button id="light-button" class="active">Light</button>
            <button id="dark-button">Dark</button>
        </div>
        <div class="slider-container">
            <div class="slider-content">
                <div class="content-left">
                    <ul id="content-left-ul">
                        <li><a id="ul-black1" href="">Khuyến mãi lớn</a></li>
                        <li><a id="ul-black2" href="">100 ưu đãi hàng đầu</a></li>
                        <li><a id="ul-black3" href="">Mặt hàng mới về</a></li>

                        <?php 
                            $sql = "SELECT * from categories";

                            $result = $conn->query($sql);
                            
                            if($result -> num_rows > 0) {
                                while($row = $result -> fetch_assoc()) {
                                    echo "<li><a href='category_details.php?categories=".$row['ID']."'>".$row["Name"]."<i class='fa-solid fa-angle-right'></i></a></li>";
                                }
                            }
                        ?>

                    </ul>
                </div>
                <div class="content-right">
                    <div class="slider-container">
                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>Iphone 12 64GB - Màu trắng</h1>
                                        <h3>Sở hữu một vẻ bên ngoài sang trọng, bóng bẩy và lịch lãm</h3>
                                        <h4>13.450.000đ</h4>
                                        <a href="../pages/phone_detail.php?phoneID=55">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img" data-aos="fade-left" data-aos-durantion="1000">
                                    <img src="../pages/images/apple-iphone-12-mini-4.webp" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>Xiaomi Redmi Note 12 8GB 128GB</h1>
                                        <h3>Tỏa sáng với diện mạo cực thời thượng cùng hiệu suất mạnh mẽ</h3>
                                        <h4>4.990.000đ</h4>
                                        <a href="../pages/phone_detail.php?phoneID=46">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img">
                                    <img src="../pages/images/xixi.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>OPPO A16K 3GB/32GB - Màu xanh</h1>
                                        <h3>OPPO A16K là sản phẩm điện thoại thông minh nổi bật với RAM 3GB và chipset
                                            MediaTek Helio G35</h3>
                                        <h4>2.550.000đ</h4>
                                        <a href="../pages/phone_detail.php?phoneID=25">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img">
                                    <img src="../pages/images/oppo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-dots">
                        <span class="slider-dot active"></span>
                        <span class="slider-dot"></span>
                        <span class="slider-dot"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="popular">
        <div class="popular-container">
            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/apple-iphone-12-mini-4.webp" alt="">
                </div>
                <div class="p-card-title">
                    <h2>ĐIỆN THOẠI IPHONE</h2>
                    <a href="category_details.php?categories=31">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/xixi.png" alt="">
                </div>
                <div class="p-card-title">
                    <h2>ĐIỆN THOẠI REDMI</h2>
                    <a href="category_details.php?categories=33">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/oppo.png" alt="">
                </div>
                <div class="p-card-title">
                    <h2>ĐIỆN THOẠI OPPO</h2>
                    <a href="category_details.php?categories=34">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <div id="p-card-none" class="p-card">
                <div class="p-card-last-child">
                    <div class="p-card-img">
                        <img src="../pages/images/samsung.jpg" alt="">
                    </div>
                    <div class="p-card-title">
                        <h2>ĐIỆN THOẠI SAMSUNG</h2>
                        <a href="category_details.php?categories=32">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="features-container">
            <div class="features-left">
                <h2 style="text-align: center;">Ưu đãi đặc biệt</h2>
                <img src="../pages/images/ip15-black.webp" alt="">
                <p>Điện thoại iPhone 15 Pro Max 256GB Natural Titanium</p>
                <h3>34.490.000đ</h3>
            </div>
            <div class="features-right">
                <div class="features-right-title">
                    <a class="tab active" data-category="1" href="">Iphone hot<div class="tab-circle"></div>
                    </a>

                    <a class="tab" data-category="2" href="">Giảm giá<div class="tab-circle"></div></a>
                </div>
                <div id="products-container" class="features-right-product">

                    <?php 
$sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
        FROM categories
        JOIN phones ON categories.ID = phones.CategoryID
        JOIN phones_images ON phones.ID = phones_images.PhoneID
        WHERE categories.Name = 'Điện thoại Iphone';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $discountedPrice = $row["Price"] - $row["Discount"]; // Tính giá sau giảm
        $isDiscounted = $row["Discount"] > 0; // Kiểm tra sách có giảm giá hay không
        ?>
                    <div class="features-right-product-details category-1 active">
                        <h3><?php echo $row['categoryName']; ?></h3>
                        <p><?php echo $row['phoneName']; ?></p>
                        <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        <div class="details-money-shop">
                            <?php if ($isDiscounted) { ?>
                            <div class="d-m-shop-discount">
                                <h4 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . ' đ'; ?></h4>
                                <span
                                    class="original-price"><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?></span>
                            </div>
                            <?php } else { ?>
                            <h3><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?>
                            </h3>
                            <?php } ?>
                            <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>

                        </div>
                        <div class="details-whislits">
                            <div class="d-t-w-c">
                                <!-- Trong wishlist.php -->
                                <form method="post" action="wishlist.php">
                                    <button class="wishlist" type="submit" name="wishlist"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-regular fa-heart"></i>Wishlist</button>
                                    <!-- ... -->
                                </form>

                                <!-- Trong compare.php -->
                                <form method="POST" action="compare.php">
                                    <button class="compare" type="submit" name="compare"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-solid fa-code-compare"></i>Compare</button>
                                    <!-- ... -->
                                </form>
                            </div>

                        </div>
                    </div>
                    <?php
    }
}
?>



                    <?php
$sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
        FROM categories
        JOIN phones ON categories.ID = phones.CategoryID
        JOIN phones_images ON phones.ID = phones_images.PhoneID 
        AND phones.Discount > 0
        LIMIT 8";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $discountedPrice = $row["Price"] - $row["Discount"]; // Tính giá sau giảm
        ?>
                    <div class="features-right-product-details category-2">
                        <h3><?php echo $row['categoryName']; ?></h3>
                        <p><?php echo $row['phoneName']; ?></p>
                        <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        <div class="details-money-shop">
                            <div class="d-m-shop-discount">
                                <h4 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . ' đ'; ?></h4>
                                <span
                                    class="original-price"><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?></span>
                            </div>
                            <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <div class="d-t-w-c">
                                <!-- Trong wishlist.php -->
                                <form method="post" action="wishlist.php">
                                    <button class="wishlist" type="submit" name="wishlist"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-regular fa-heart"></i>Wishlist</button>
                                    <!-- ... -->
                                </form>

                                <!-- Trong compare.php -->
                                <form method="POST" action="compare.php">
                                    <button class="compare" type="submit" name="compare"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-solid fa-code-compare"></i>Compare</button>
                                    <!-- ... -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
    }
}
?>



                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <!-- Trong wishlist.php -->
                            <form method="post" action="wishlist.php">
                                <button class="wishlist" type="submit" name="wishlist"
                                    value="<?php echo $row['ID']; ?>"><i
                                        class="fa-regular fa-heart"></i>Wishlist</button>
                                <!-- ... -->
                            </form>

                            <!-- Trong compare.php -->
                            <form method="POST" action="compare.php">
                                <button class="compare" type="submit" name="compare"
                                    value="<?php echo $row['ID']; ?>"><i
                                        class="fa-solid fa-code-compare"></i>Compare</button>
                                <!-- ... -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="best-deals">
        <div class="best-deals-container">
            <div class="b-d-c-title">
                <ul>
                    <li><a id="best-deals-active" href="">Điện thoại giá tốt<div class="best-deals-circle"></div></a>
                    </li>
                    <li><a href="category_details.php?categories=22">Điện thoại Iphone</a></li>
                    <li><a href="category_details.php?categories=25">Điện thoại Xiaomi</a></li>
                    <li><a href="category_details.php?categories=26">Điện thoại Oppo</a></li>
                    <li><a href="category_details.php?categories=29">Điện thoại Samsung</a></li>
                </ul>
            </div>
            <div class="b-d-c-main">
                <div class="b-d-c-m-box-left">

                    <?php
                        // Truy vấn SQL để lấy 4 sản phẩm best deals từ sản phẩm thứ 2 đến 5
                        $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                                FROM categories
                                JOIN phones ON categories.ID = phones.CategoryID
                                JOIN phones_images ON phones.ID = phones_images.PhoneID 
                                WHERE phones.Discount > 0
                                ORDER BY phones.Discount DESC
                                LIMIT 2, 4";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các sản phẩm best deals và hiển thị thông tin
                            while ($row = $result->fetch_assoc()) {
                                $discountedPrice = $row["Price"] - $row["Discount"];
                                ?>
                    <div class="b-d-c-m-box-left-card">
                        <h3><?php echo $row['categoryName']; ?></h3>
                        <h4><?php echo $row['phoneName']; ?></h4>
                        <div class="b-d-c-b-l-c-img">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price">
                            <div class="b-d-c-b-l-c-p-discount">
                                <h5 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist">
                            <div class="b-d-c-b-l-c-wishlist-all">
                                <!-- Trong wishlist.php -->
                                <form method="post" action="wishlist.php">
                                    <button class="wishlist" type="submit" name="wishlist"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-regular fa-heart"></i>Wishlist</button>
                                    <!-- ... -->
                                </form>

                                <!-- Trong compare.php -->
                                <form method="POST" action="compare.php">
                                    <button class="compare" type="submit" name="compare"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-solid fa-code-compare"></i>Compare</button>
                                    <!-- ... -->
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "Không có sản phẩm best deals.";
                        }
                    ?>

                </div>

                <div class="b-d-c-m-box-center">
                    <?php
                        // Truy vấn SQL để lấy 1 sản phẩm giảm giá nhiều nhất
                        $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                                FROM categories
                                JOIN phones ON categories.ID = phones.CategoryID
                                JOIN phones_images ON phones.ID = phones_images.PhoneID 
                                WHERE phones.Discount > 0
                                ORDER BY phones.Discount DESC
                                LIMIT 1";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lấy thông tin sản phẩm
                            $row = $result->fetch_assoc();
                            $discountedPrice = $row["Price"] - $row["Discount"];
                            ?>
                    <div class="b-d-c-m-box-left-card-center">
                        <h3><?php echo $row['categoryName']; ?></h3>
                        <h4><?php echo $row['phoneName']; ?></h4>
                        <div class="b-d-c-b-l-c-img-center">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price-center">
                            <div class="b-d-c-b-l-c-p-discount-center">
                                <h5 class="discounted-price-center">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist-center">
                            <div class="b-d-c-b-l-c-wishlist-all">
                                <!-- Trong wishlist.php -->
                                <form method="post" action="wishlist.php">
                                    <button class="wishlist" type="submit" name="wishlist"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-regular fa-heart"></i>Wishlist</button>
                                    <!-- ... -->
                                </form>

                                <!-- Trong compare.php -->
                                <form method="POST" action="compare.php">
                                    <button class="compare" type="submit" name="compare"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-solid fa-code-compare"></i>Compare</button>
                                    <!-- ... -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        } else {
                            echo "Không có sản phẩm.";
                        }
                    ?>
                </div>

                <div class="b-d-c-m-box-left">

                    <?php
                        // Truy vấn SQL để lấy 4 sản phẩm best deals từ sản phẩm thứ 6 đến 9
                        $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                        FROM categories
                        JOIN phones ON categories.ID = phones.CategoryID
                        JOIN phones_images ON phones.ID = phones_images.PhoneID
                        WHERE phones.Discount > 0
                        ORDER BY phones.Discount DESC
                        LIMIT 6, 4
                        ";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các sản phẩm best deals và hiển thị thông tin
                            while ($row = $result->fetch_assoc()) {
                                $discountedPrice = $row["Price"] - $row["Discount"];
                                ?>
                    <div class="b-d-c-m-box-left-card">
                        <h3><?php echo $row['categoryName']; ?></h3>
                        <h4><?php echo $row['phoneName']; ?></h4>
                        <div class="b-d-c-b-l-c-img">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price">
                            <div class="b-d-c-b-l-c-p-discount">
                                <h5 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist">
                            <div class="b-d-c-b-l-c-wishlist-all">
                                <!-- Trong wishlist.php -->
                                <form method="post" action="wishlist.php">
                                    <button class="wishlist" type="submit" name="wishlist"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-regular fa-heart"></i>Wishlist</button>
                                    <!-- ... -->
                                </form>

                                <!-- Trong compare.php -->
                                <form method="POST" action="compare.php">
                                    <button class="compare" type="submit" name="compare"
                                        value="<?php echo $row['ID']; ?>"><i
                                            class="fa-solid fa-code-compare"></i>Compare</button>
                                    <!-- ... -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "Không có sản phẩm best deals.";
                        }
                    ?>

                </div>

            </div>
        </div>
    </section>

    <section id="best-sellers">
        <div class="best-sellers-container">
            <div class="best-sellers-title">
                <div class="b-s-title-left">
                    <ul>
                        <li><a href="">Bán chạy nhất</a></li>
                    </ul>
                </div>
                <div class="b-s-title-right">
                    <ul>
                        <li><a id="b-s-title-right-active" href="">Top 20</a></li>
                        <li><a href="category_details.php?categories=22">Iphone hot</a></li>
                        <li><a href="category_details.php?categories=25">Xiaomi hot</a></li>
                        <li><a href="category_details.php?categories=26">Oppo hot</a></li>
                    </ul>
                </div>
            </div>
            <div class="best-sellers-products-container">
                <div class="best-sellers-product-all">
                    <div class="best-sellers-product-all-card">
                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                                    FROM categories
                                    JOIN phones ON categories.ID = phones.CategoryID
                                    JOIN phones_images ON phones.ID = phones_images.PhoneID
                                    ORDER BY RAND()
                                    LIMIT 8";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['categoryName']; ?></a>
                                    <p><?php echo $row['phoneName']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>

                        </div>

                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                                    FROM categories
                                    JOIN phones ON categories.ID = phones.CategoryID
                                    JOIN phones_images ON phones.ID = phones_images.PhoneID
                                    ORDER BY RAND()
                                    LIMIT 8";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['categoryName']; ?></a>
                                    <p><?php echo $row['phoneName']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>
                            <div class="b-s-p-c-d-m-img">
                                <img src="../pages/images/sa3-removebg-preview.png" alt="">
                            </div>
                            <div class="b-s-p-c-d-m-content">
                                <a href="">Sức mạnh của hiện tại</a>
                                <p>Sức mạnh của hiện tại” của Eckhart Tolle</p>
                                <div class="b-s-p-c-d-m-content-money">
                                    <h3>199.000đ</h3>
                                    <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                                <div class="b-s-details-whislits">
                                    <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                    <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                </div>
                            </div>
                        </div>




                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name AS categoryName, phones.ID, phones.Name AS phoneName, phones.Price, phones.Discount, phones_images.ImageURL
                                    FROM categories
                                    JOIN phones ON categories.ID = phones.CategoryID
                                    JOIN phones_images ON phones.ID = phones_images.PhoneID
                                    ORDER BY RAND()
                                    LIMIT 4";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['categoryName']; ?></a>
                                    <p><?php echo $row['phoneName']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="phone_detail.php?phoneID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="best-sellers-product-dots">
            <span class="b-s-p-dot active"></span>
            <span class="b-s-p-dot"></span>
            <span class="b-s-p-dot"></span>
        </div>
        </div>
        </div>
    </section>

    <section id="banner">
        <div class="b-container">
            <h1>Siêu giảm giá <span>lớn nhất</span> tháng qua</h1>
            <a href="">Giảm giá lớn</a>
            <img src="../pages/images/xiaomi.webp" alt="">
        </div>

    </section>

</main>

<?php include_once "../pages/includes/footer_pages.php"?>