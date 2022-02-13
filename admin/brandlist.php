<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delbrand = $brand->delete_brand($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Brand List</h2>
        <div class="block">
            <?php
            if (isset($delbrand)) {
                echo $delbrand;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên thương hiệu</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $show_brand = $brand->show();
                if ($show_brand) {
                    while ($result = $show_brand->fetch_assoc()) {


                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $result['brandId'] ?></td>
                            <td><?php echo $result['brandName'] ?></td>
                            <td><a href="brandedit.php?brandid=<?php echo $result['brandId'] ?>">Edit</a> || <a
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                    href="?delid=<?php echo $result['brandId'] ?>">Delete</a></td>
                        </tr>
                    <?php }
                } ?>
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

