<?php
require_once "../config/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phoneID'])) {
    $phoneID = $_POST['phoneID'];

    // Xóa sách yêu thích từ danh sách $_SESSION['wishlist']
    if (isset($_SESSION['wishlist']) && in_array($phoneID, $_SESSION['wishlist'])) {
        $index = array_search($phoneID, $_SESSION['wishlist']);
        unset($_SESSION['wishlist'][$index]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Cập nhật lại chỉ mục của mảng

        // Thêm thông báo xóa sách thành công vào session
        $_SESSION['removeSuccess'] = "Đã xóa sách yêu thích thành công.";
    }

    // Chuyển hướng người dùng trung gian với phương thức GET
    header("Location: remove_wishlist_redirect.php?removedphoneID=" . $phoneID);
    exit();
} else {
    // Xử lý lỗi hoặc yêu cầu không hợp lệ
    echo "Lỗi: Yêu cầu không hợp lệ";
}
?>