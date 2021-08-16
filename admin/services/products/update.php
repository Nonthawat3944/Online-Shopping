<?php

require_once('../connect.php');

if (isset($_POST['update'])) {

    $Upload_Dir = "../../uploads/";
    $Max_File_Size = 10000000;
    $File_Type_Allow = array(
        "image/bmp",
        "image/png",
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
    );

    function validat_form($file_input, $file_size, $file_type)
    {
        global $Max_File_Size, $File_Type_Allow;
        if ($file_input == "none") {
            $error = "คุณยังไม่ได้เลือกไฟล์";
        } else if ($file_size > $Max_File_Size) {
            $error = "ไฟล์ของคุณมีขนาดใหญ่เกินไป";
        } else if (!check_type($file_type, $File_Type_Allow)) {
            $error = "ชนิดของไฟล์ไม่ถูกต้อง";
        } else {
            $error = false;
        }
        return $error;
    }

    function check_type($type_check)
    {
        global $File_Type_Allow;
        for ($i = 0; $i <= count($File_Type_Allow); $i++) {
            if ($File_Type_Allow[$i] == $type_check) {
                return true;
            }
        }
        return false;
    }

    if ($_FILES['image']['name'] == "") {
        try {
            $sql = "UPDATE products SET
            category_id = :category_id,
            code = :code,
            product = :product,
            details = :details,
            price = :price,
            quantity = :quantity,
            image = :image
            WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ":category_id" => $_POST['category_id'],
                ":code" => $_POST['code'],
                ":product" => $_POST['product'],
                ":details" => $_POST['details'],
                ":price" => $_POST['price'],
                ":quantity" => $_POST['quantity'],
                ":image" => $_POST['image_db'],
                ":id" => $_POST['id']
            ));
?>
            <script>
                alert('บันทึกข้อมูลรายการสินค้าเรียบร้อย')
                location.href = '../../pages/products/?products=view&id=<?= $_POST['id'] ?>'
            </script>
            <?php
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        }
    } else {
        $image_name = $_FILES['image']['name'];
        $arrImg = explode(".", $image_name);
        $newImage = md5(uniqid($arrImg[0])) . "." . $arrImg[1];

        if ($_FILES['image']) {
            $err_msg = validat_form(
                $_FILES['image'],
                $_FILES['image']['size'],
                $_FILES['image']['type']
            );
            if ($err_msg) {
            ?>
                <script>
                    alert('<?= $err_msg ?>')
                    location.href = '../../pages/?products=update&id=<?= $_POST['id'] ?>'
                </script>
                <?php
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $Upload_Dir . "/" . $newImage)) {
                    unlink($Upload_Dir . "/" . $_POST['image_db']);
                    try {
                        $sql = "UPDATE products SET
                        category_id = :category_id,
                        code = :code,
                        product = :product,
                        details = :details,
                        price = :price,
                        quantity = :quantity,
                        image = :image
                        WHERE id = :id";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute(array(
                            ":category_id" => $_POST['category_id'],
                            ":code" => $_POST['code'],
                            ":product" => $_POST['product'],
                            ":details" => $_POST['details'],
                            ":price" => $_POST['price'],
                            ":quantity" => $_POST['quantity'],
                            ":image" => $newImage,
                            ":id" => $_POST['id']
                        ));

                ?>
                        <script>
                            alert('บันทึกข้อมูลรายการสินค้าเรียบร้อย')
                            location.href = '../../pages/products/?products=view&id=<?= $_POST['id'] ?>'
                        </script>
                    <?php
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                } else {
                    ?>
                    <script>
                        alert('เกิดข้อผิดพลาด')
                        location.href = '../../pages/?products=update&id=<?= $_POST['id'] ?>'
                    </script>
<?php
                }
            }
        }
    }

    exit();
}

?>