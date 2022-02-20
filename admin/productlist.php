<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $delProduct = $product->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <?php
            if (isset($delCat)) {
                echo $delCat;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $product = new product();
                $productList = $product->show();
                if ($productList) {
                    $i = 0;
                    while ($result = $productList->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName'] ?></td>
                            <td><?php echo number_format($result['price']) ?> VND</td>
                            <td><img style="width: 100px; height: 100px; object-fit: cover;padding: 5px" src="uploads/<?php echo $result['image'] ?>"></td>
                            <td><?php echo $result['catName'] ?></td>
                            <td><?php echo $result['brandName'] ?></td>
                            <td><?php echo $result['productDesc'] ?></td>
                            <td><a href="editproduct.php?productid=<?php echo $result['productId'] ?>">Chỉnh sửa</a> || <a href="?productid=<?php echo $result['productId'] ?>">Xóa</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>
