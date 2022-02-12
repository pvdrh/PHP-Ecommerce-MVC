<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php
$cat = new category();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $show_cate = $cat->show();
                if ($show_cate) {
                    while ($result = $show_cate->fetch_assoc()) {


                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $result['catId'] ?></td>
                            <td><?php echo $result['catName'] ?></td>
                            <td><a href="catedit.php?catid=<?php echo $result['catId'] ?>">Edit</a> || <a
                                        href="?catid=<?php echo $result['catId'] ?>">Delete</a></td>
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

