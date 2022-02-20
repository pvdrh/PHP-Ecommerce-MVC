<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {

    $insertProduct = $product->insert_product($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Mới Sản Phẩm</h2>
        <div class="block">
            <?php
            if(isset($insertProduct)){
                echo $insertProduct;
            }
            ?>
            <form action="addproduct.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input type="text" name="productName" placeholder="Nhập tên sản phẩm" class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Danh mục</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>Chọn danh mục</option>
                                <?php
                                $cat = new category();
                                $castList = $cat->show();
                                if ($castList) {
                                    while ($result = $castList->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Thương hiệu</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>Chọn thương hiệu</option>
                                <?php
                                $brand = new brand();
                                $brandList = $brand->show();
                                if ($brandList) {
                                    while ($result = $brandList->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Mô tả </label>
                        </td>
                        <td>
                            <textarea name="productDesc" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giá sản phẩm</label>
                        </td>
                        <td>
                            <input name="price" type="text" placeholder="Nhập giá bán" class="medium"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Ảnh sản phẩm</label>
                        </td>
                        <td>
                            <input name="image" type="file"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>


