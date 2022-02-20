<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $catId = mysqli_real_escape_string($this->db->link, $data['category']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brand']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $price == "" || $catId == "" || $brandId == "" || $productDesc == "" || $file_name == "") {
            $alert = "<span class='error'>Tên danh mục không được để trống!</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, catId, brandId, productDesc, price, image) VALUES('$productName', '$catId', '$brandId', '$productDesc', '$price', '$unique_image')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'>Thêm mới thành công.</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm mới thất bại!</span>";
                return $alert;
            }
        }
    }

    public function show()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $catId = mysqli_real_escape_string($this->db->link, $data['category']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brand']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $price == "" || $catId == "" || $brandId == "" || $productDesc == "") {
            $alert = "<span class='error'>Tên sản phẩm không được để trống!</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 2048) {
                    $alert = "<span class='error'> Kích thước ảnh phải nhỏ hơn 2MB!</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited == false)) {
                    $alert = "<span class='error'>Bạn chỉ cái thể tải lên : " . implode(',', $permited) . "</span>";
                    return $alert;
                }
                $query = "UPDATE tbl_product SET 
                        productName = '$productName',
                        catId = '$catId',
                        brandId = '$brandId' ,
                        price = '$price',
                        productDesc = '$productDesc',
                        image = '$uploaded_image'
                        WHERE productId = '$id'";
            } else {
                $query = "UPDATE tbl_product SET 
                        productName = '$productName',
                        catId = '$catId',
                        brandId = '$brandId' ,
                        price = '$price',
                        productDesc = '$productDesc'
                        WHERE productId = '$id'";
            }
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'>Cập nhật thành công.</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Cập nhật thất bại!</span>";
                return $alert;
            }
        }
    }

    public function delete_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Xóa thành công.</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Xóa thất bại!</span>";
            return $alert;
        }
    }
}

?>