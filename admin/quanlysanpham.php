<?php

require_once "../config/config.php";

include_once "../admin/includes/header-admin.php";
include_once "../admin/includes/sidebar-admin.php";
include_once "../admin/includes/footer-admin.php";

?>

<article>
    <section id="section-quanlysanpham">
        <div id="form-add-product" class="add-product-container">
            <form id="qlsp-form" action="add_product.php" method="post" enctype="multipart/form-data">
                <h1>Thêm sản phẩm mới</h1>
                <h2>Thông tin</h2>
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Điền tên điện thoại..."
                    required>
                <label for="color">Màu sắc</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Điền màu sắc..." required>
                <label for="name">Danh mục</label>
                <select name="category_id" id="category_slug">
                    <?php
                                            // Lấy danh sách các danh mục từ database
                                            $sql = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $sql);
                
                                            // Hiển thị danh sách các danh mục dưới dạng các tùy chọn trong thẻ select
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $row['ID'] . '">' . $row['Name'] . '</option>';
                                            }
                                            ?>
                </select>
                </br>

                <label id="mota-add-products" for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Điền mô tả điện thoại..." required></textarea>
                <label for="price">Giá</label>
                <input type="text" class="form-control" id="price-input" name="price" min="0"
                    placeholder="Điền giá điện thoại..." required>
                <h2>Hình ảnh</h2>
                <label id="choose-file" for="imageInput" class="custom-file-upload"><i
                        class="fa-solid fa-arrow-up-from-bracket"></i>Thêm ảnh</label>
                <input type="file" name="images[]" id="imageInput" multiple onchange="previewImageProduct(event)">
                <div id="imagePreviewContainer"></div>

                <div class="btn-add-or-discard">
                    <button type="button" id="btn-discard" class="btn btn-primary" onclick="cancelAddProduct()">Trở
                        về</button>
                    <button type="submit" id="btn-add" class="btn btn-primary">Lưu</button>
                </div>
            </form>

        </div>
        <div class="list-product-container">
            <div class="list-title1">
                <div class="quanlysanpham-title">
                    <h2>SẢN PHẨM</h2>
                </div>
            </div>
            <div class="list-title2">
                <div class="quanlysanpham-search">
                    <div class="all-sanpham">
                        <h3 id="all-product">Tất cả sản phẩm</h3>
                    </div>
                    <div class="find-all">
                        <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>
                        <input type="search" placeholder="Tìm kiếm danh mục...">
                        <div class="btn-add-product">
                            <button type="button" onclick="showAddProduct1()"><i class="fa-solid fa-plus"
                                    id="add-icon"></i>THÊM SẢN PHẨM</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-products">


                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên điện thoại</th>
                            <th>Màu sắc</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giảm giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
    // Truy vấn danh sách danh mục từ bảng categories
    $sql = "SELECT phones.ID, phones.Name, phones.Color, phones.Description, phones.Price, phones.CategoryID, phones.Discount, phones_images.ImageURL
            FROM phones
            LEFT JOIN phones_images ON phones.ID = phones_images.PhoneID
            ORDER BY phones.ID ASC";
    $result = mysqli_query($conn, $sql);

    // Hiển thị dữ liệu lấy được từ cơ sở dữ liệu
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='small-column'>" . $row["ID"] . "</td>";
            echo "<td class='large-column'>" . $row["Name"] . "</td>";
            echo "<td class='small-column'>" . $row["Color"] . "</td>";
            echo "<td class='large-column'>" . $row["Description"] . "</td>";

            echo "<td class='small-column'>";
            if (!empty($row["ImageURL"])) {
                echo "<img id='image_path' src='" . $row["ImageURL"] . "'>";
            } else {
                // Hiển thị hình ảnh mặc định nếu không có ảnh
                echo "<img src='/default-product-image.jpg'>";
            }
            echo "</td>";
            echo "<td class='small-column'>" . number_format($row["Price"], 0, '.', ',') . ' đ' . "</td>";
            echo "<td class='discount-td' data-phone-id='" . $row['ID'] . "'>";

            if ($row["Discount"] != 0) {
                echo "<span class='discount-price'>" . number_format($row['Discount'], 0, '.', ',') . ' đ' . "</span>";
                echo "<button id='btn-delete-discount' onclick='deleteDiscount(" . $row['ID'] . ")'><i class='fa-solid fa-eraser'></i></button>";
            } else {
                echo "<form action='update_discount.php' method='POST' style='display: flex;'>
                        <input type='hidden' name='phone_id' value=".$row['ID'].">
                        <input id='input-add-discount' type='number' name='discount' placeholder='Nhập giá giảm'>
                        <button id='btn-add-discount' type='submit'><i class='fa-solid fa-plus'></i></button>
                      </form>";
            }

            echo "</td>";
            echo "<td class='small-column'><a id='product-edit-btn' href='edit_product.php?id=" . $row["ID"] . "'><i class='fa-solid fa-pen'></i></a>
                  <button id='product-delete-btn' onclick='deleteProduct(" . $row["ID"] . ")'><i class='fa-solid fa-trash-can'></i></button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No categories found.</td></tr>";
    }
?>


                    </tbody>
                </table>
            </div>

            <div id="confirmDelete">
                <h3>Bạn có chắc chắn muốn xóa sản phẩm ?</h3>
                <h4>Nếu xóa sẽ không thể phục hồi.</h4>
                <button id="cancel-delete-btn" onclick="cancelDelete()">Trở về</button>
                <button type="submit" onclick="deleteProductConfirmed()"><i
                        class="fa-regular fa-trash-can"></i>Xóa</button>
            </div>
        </div>
    </section>
</article>

<script>
function showDiscountInput(phoneID) {
    var discountInput = document.getElementById('discountInput' + phoneID);
    discountInput.style.display = 'inline-block';
}

function applyDiscount(phoneID) {
    var discountInput = document.getElementById('discountInput' + phoneID);
    var discountValue = discountInput.value;

    // Thực hiện các xử lý của bạn với giá giảm được nhập vào
    console.log('Điện thoại ID:', phoneID);
    console.log('Giá giảm:', discountValue);

    // Xóa giá trị trong input và ẩn nút nhập giá giảm
    discountInput.value = '';
    discountInput.style.display = 'none';
}




// Xóa giá giảm khi click vào nút xóa giá giảm
var deleteButtons = document.getElementsByClassName('delete-discount-btn');
Array.from(deleteButtons).forEach(function(button) {
    button.addEventListener('click', function() {
        var phoneID = button.getAttribute('data-phone-id');
        deleteDiscount(phoneID);
    });
});

// Hàm xóa giá giảm
function deleteDiscount(phoneID) {
    // Gửi yêu cầu xóa giá giảm bằng AJAX hoặc hình thức khác
    // Xử lý xóa giá giảm trên server
    // Sau khi xóa thành công, có thể làm mới trang hoặc cập nhật phần tử HTML tương ứng

    // Ví dụ:
    // Gửi yêu cầu xóa giá giảm bằng AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Xóa giá giảm thành công
                // Cập nhật phần tử HTML tương ứng hoặc làm mới trang
                location.reload(); // Làm mới trang
            } else {
                // Xử lý lỗi nếu cần
                console.log('Có lỗi xảy ra khi xóa giá giảm');
            }
        }
    };
    xhr.open('GET', 'delete_discount.php?phone_id=' + phoneID);
    xhr.send();
}
</script>