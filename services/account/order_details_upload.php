<?php
require_once('../../admin/services/connect.php');
if (isset($_POST['upload'])) {
    $Upload_Dir = "../../admin/uploads/payment/";
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

    if ($_POST['image_db'] == "") {
        $image_name = $_FILES['image_payment']['name'];
        $arrImg = explode(".", $image_name);
        $newImage = md5(uniqid($arrImg[0])) . "." . $arrImg[1];
        if ($_FILES['image_payment']) {
            $err_msg = validat_form(
                $_FILES['image_payment'],
                $_FILES['image_payment']['size'],
                $_FILES['image_payment']['type']
            );
            if ($err_msg) {
?>
                <script>
                    alert(<?= $err_msg ?>);
                    window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                </script>
                <?php
            } else {
                if (move_uploaded_file($_FILES['image_payment']['tmp_name'], $Upload_Dir . "/" . $newImage)) {
                    try {
                        $sql = "UPDATE orders SET bank_id = :bank_id, image_payment = :image_payment, status = 3 WHERE id = :id";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute(array(
                            ':bank_id' => $_POST['bank_id'],
                            ':image_payment' => $newImage,
                            ':id' => $_POST['id']
                        ));
                ?>
                        <script>
                            alert("อัพโหลดหลักฐานการชำระเงินเรียบร้อย");
                            window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                        </script>
                    <?php
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                } else {
                    ?>
                    <script>
                        alert("เกิดข้อผิดพลาด");
                        window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                    </script>
                <?php
                }
            }
        }
    } else {
        $image_name = $_FILES['image_payment']['name'];
        $arrImg = explode(".", $image_name);
        $newImage = md5(uniqid($arrImg[0])) . "." . $arrImg[1];
        if ($_FILES['image_payment']) {
            $err_msg = validat_form(
                $_FILES['image_payment'],
                $_FILES['image_payment']['size'],
                $_FILES['image_payment']['type']
            );
            if ($err_msg) {
                ?>
                <script>
                    alert(<?= $err_msg ?>);
                    window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                </script>
                <?php
            } else {
                if (move_uploaded_file($_FILES['image_payment']['tmp_name'], $Upload_Dir . "/" . $newImage)) {
                    unlink($Upload_Dir . "/" . $_POST['image_db']);
                    try {
                        $sql = "UPDATE orders SET bank_id = :bank_id, image_payment = :image_payment, status = 3 WHERE id = :id";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute(array(
                            ':bank_id' => $_POST['bank_id'],
                            ':image_payment' => $newImage,
                            ':id' => $_POST['id']
                        ));
                ?>
                        <script>
                            alert("อัพโหลดหลักฐานการชำระเงินเรียบร้อย");
                            window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                        </script>
                    <?php
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                } else {
                    ?>
                    <script>
                        alert("เกิดข้อผิดพลาด");
                        window.location = '../../pages/main/?account=order&order_details&code=<?= $_POST['code'] ?>'
                    </script>
        <?php
                }
            }
        }
    }
    exit();
}
?>