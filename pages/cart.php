<?php
session_start();
require_once "../config/config.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone_id = $_POST['phone_id'];
    $phone_Name = $_POST['phone_Name'];
    $phone_price = $_POST['phone_price'];
    $phone_image = $_POST['phone_image'];
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $phone_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['phone_id'] == $phone_id) {
            $item['quantity'] += $quantity;
            $phone_exists = true;
            break;
        }
    }

    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
    if (!$phone_exists) {
        $new_item = array(
            'phone_id' => $phone_id,
            'phone_Name' => $phone_Name,
            'phone_price' => $phone_price,
            'phone_image' => $phone_image,
            'quantity' => $quantity
        );
        $_SESSION['cart'][] = $new_item;
    }

     // Thiết lập thông báo thành công trong biến session
     $_SESSION['cart_success_message'] = 'Điện thoại đã được thêm vào giỏ hàng thành công.';

    header("Location: phone_detail.php?phoneID=$phone_id");
    exit();
}

// Xử lý sự kiện xóa Điện thoại khỏi giỏ hàng
if (isset($_GET['action']) && isset($_GET['phone_id'])) {
    $action = $_GET['action'];
    $phone_id = $_GET['phone_id'];

    // Xóa Điện thoại khỏi giỏ hàng
    if ($action === 'delete') {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['phone_id'] == $phone_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }

    header("Location: cart.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Phone</title>
    <link rel="stylesheet" href="../pages/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="../pages/assets/js/home_pages.js"></script>
</head>

<body>
    <header id="header">
        <div class="header-top-container">
            <div class="header-top">
                <div class="top-left">
                    <ul>
                        <li><a href="index_home.php">Chào mừng đến với cửa hàng Điện thoại</a></li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul>
                        <li><a href=""><i class="fa-solid fa-location-dot"></i>Vị trí</a></li>
                        <li><a href="">|<i class="fa-solid fa-truck-fast"></i>Theo dõi đơn hàng</a></li>
                        <li><a href="">|<i class="fa-solid fa-bag-shopping"></i>Cửa hàng</a></li>
                        <?php
                        
                        if(isset($_SESSION['username'])){?>
                        <li><a href="my_account.php">|<i class="fa-solid fa-user"></i>Tài khoản</a>
                            <?php } else{?>
                        <li><a href="login_register.php">|<i class="fa-solid fa-user"></i>Tài khoản</a>
                            <?php }?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-main-container">
            <div class="header-main">
                <div class="main-logo">
                    <div class="circle"></div>
                    <h1>GoodPhone</h1>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="main-search">
                    <form action="category_details.php" method="GET">
                        <input id="input-header" type="text" placeholder="Tìm kiếm Điện thoại tại đây...">

                        <?php 

// Truy vấn để lấy danh Điện thoại các danh mục
$sql = "SELECT ID, Name FROM categories";
$result = $conn->query($sql);

// Kiểm tra và hiển thị danh mục trong thẻ select
if ($result->num_rows > 0) {
    echo '<select name="categories" id="categories">';
    echo '<option value="">Tất cả danh mục</option>';

    while ($row = $result->fetch_assoc()) {
        $categoryID = $row["ID"];
        $categoryName = $row["Name"];
        echo '<option value="' . $categoryID . '">' . $categoryName . '</option>';
    }

    echo '</select>';
} else {
    echo "Không có danh mục nào.";
}

?>


                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="main-contact">
                    <form method="post" action="compare.php">
                        <button type="submit" name="compare" class="tooltip" data-tooltip="So sánh"
                            style="border:none; background-color: transparent; cursor: pointer;"><i
                                class="fa-solid fa-code-compare"></i></button>
                    </form>
                    <div class="triangle"></div>
                    <form method="post" action="wishlist.php">
                        <button type="submit" name="wishlist" class="tooltip" data-tooltip="Yêu thích"
                            style="border:none; background-color: transparent; cursor: pointer;"><i
                                class="fa-regular fa-heart"></i></button>
                    </form> <?php
                        if(isset($_SESSION['username'])){?>
                    <button id="dropdown-account-active" onclick="showMenuAccount()"><i
                            class="fa-regular fa-user"></i></button>
                    <div id="dropdown-account" class="dropdown-account">
                        <a class="dropdown-account-a" href="my_account.php">Bảng điều khiển</a>
                        <a class="dropdown-account-a" href="">Đơn hàng</a>
                        <a class="dropdown-account-a" href="">Tải về</a>
                        <a class="dropdown-account-a" href="">Địa chỉ</a>
                        <a class="dropdown-account-a" href="">Thanh toán</a>
                        <a class="dropdown-account-a" href="">Hồ sơ cá nhân</a>
                        <a class="dropdown-account-a" href="logout.php">Đăng xuất</a>
                    </div>
                    <?php } else{?>
                    <a href="login_register.php" class="tooltip" data-tooltip="My Account"><i
                            class="fa-regular fa-user"></i></a>
                    <?php }?>

                    <div class="main-contact-cart">
                        <a href="../pages/cart.php" class="tooltip-cart" data-tooltip="Cart"><i
                                class="fa-solid fa-bag-shopping"></i></a>

                        <?php
    // Kiểm tra xem 'cart' đã tồn tại trong $_SESSION hay chưa
    $totalQuantity = 0;
    if (isset($_SESSION['cart'])) {
        $totalQuantity = array_sum(array_column($_SESSION['cart'], 'quantity'));
    }
    ?>

                        <div class="quantity">
                            <p><?php echo $totalQuantity; ?></p>
                        </div>

                        <?php
    $totalPrice = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $phone_price = floatval($item['phone_price']);
            $quantity = intval($item['quantity']);
            $subtotal = $phone_price * $quantity;
            $totalPrice += $subtotal;
        }
    }
    ?>
                        <p><?php echo number_format($totalPrice, 0, '.', ',') . 'đ'; ?></p>
                    </div>

                </div>



            </div>
        </div>
        <div class="header-bottom-2">
            <div class="h-b-container">
                <ul>
                    <li><a href="index_home.php">Trang chủ<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Iphone<i class="fa-solid fa-chevron-down"></i></a>
                    </li>
                    <li><a href="">Samsung<i class="fa-solid fa-chevron-down"></i></a>
                    </li>
                    <li><a href="">Oppo<i class="fa-solid fa-chevron-down"></i></a>
                    </li>
                    <li><a href="">Xiaomi<i class="fa-solid fa-chevron-down"></i></a>
                    </li>
                    <li><a href="">Nokia<i class="fa-solid fa-chevron-down"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        </div>

    </header>

    <body>
        <main>

            <section id="cart">
                <div class="cart-container">
                    <div class="c-c-title">
                        <a href="index_home.php">Trang chủ</a>
                        <p><i class="fa-solid fa-angle-right"></i></p>
                        <p>Giỏ hàng</p>
                    </div>
                    <div class="c-c-main">
                        <div class="c-c-m-Name">
                            <h1>Giỏ hàng</h1>
                        </div>
                        <div class="c-c-m-views-cart">
                            <table>
                                <thead>
                                    <th></th>
                                    <th></th>
                                    <th>Tên Điện thoại</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </thead>
                                <tbody>


                                    <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $phone_id = $item['phone_id'];
        $phone_Name = $item['phone_Name'];
        $phone_price = floatval($item['phone_price']);
        $phone_image = $item['phone_image'];
        $quantity = intval($item['quantity']);
        $subtotal = $phone_price * $quantity;

        $total += $subtotal;

        
        ?>


                                    <tr>
                                        <td><a href="cart.php?action=delete&phone_id=<?php echo $phone_id; ?>"><i
                                                    class="fa-solid fa-xmark"></i></a></td>
                                        <td><img src="<?php echo $phone_image; ?>" alt=""></td>
                                        <td><?php echo $phone_Name; ?></td>
                                        <td><?php echo number_format($phone_price, 0, '.', ',') . 'đ'; ?></td>
                                        <td>
                                            <form method="post" action="update_cart.php">
                                                <input type="hidden" name="phone_id" value="<?php echo $phone_id; ?>">
                                                <input type="hidden" name="phone_Name"
                                                    value="<?php echo $phone_Name; ?>">
                                                <input type="hidden" name="phone_price"
                                                    value="<?php echo $phone_price; ?>">
                                                <input type="hidden" name="phone_image"
                                                    value="<?php echo $phone_image; ?>">
                                                <input type="number" min="1" name="quantity" class="cart-quantity"
                                                    value="<?php echo $quantity; ?>">
                                                <button type="submit" class="btn-update"><i
                                                        class="fa-solid fa-rotate-right"></i></button>
                                            </form>
                                        </td>
                                        <td><?php echo number_format($subtotal, 0, '.', ',') . 'đ'; ?></td>
                                        <?php
                                        
    }
    ?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="c-c-checkout">
                        <div class="c-c-c-coupon">
                            <input type="text" placeholder="Nhập mã giảm giá">
                            <button type="button">Áp dụng</button>
                        </div>
                        <div class="c-c-c-cart-totals">
                            <div class="c-c-c-c-t-Name">
                                <h2>Chi tiết</h2>
                            </div>

                            <?php
    // Kiểm tra nếu giỏ hàng rỗng
    if ($total == 0) {
        echo '<div class="c-c-c-c-t-sub">';
        echo '<h3>Tổng tiền giỏ hàng</h3>';
        echo '<h4>0đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-ship">';
        echo '<h3>Phí vận chuyển</h3>';
        echo '<h4>0đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-total">';
        echo '<h3>Tổng thanh toán</h3>';
        echo '<h4 id="total">0đ</h4>';
        echo '</div>';
    } else {
        echo '<div class="c-c-c-c-t-sub">';
        echo '<h3>Tổng tiền giỏ hàng</h3>';
        echo '<h4>'.number_format($total, 0, '.', ',').'đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-ship">';
        echo '<h3>Phí vận chuyển</h3>';
        echo '<h4>50.000đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-total">';
        echo '<h3>Tổng thanh toán</h3>';
        echo '<h4 id="total">'.number_format($total+50000, 0, '.', ',').'đ</h4>';
        echo '</div>';
    }
    ?>

                            <a href="checkout.php">Thanh toán</a>
                        </div>

                    </div>
                </div>
            </section>

        </main>



        <?php include_once "../pages/includes/footer_pages.php"?>