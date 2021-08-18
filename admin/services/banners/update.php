<?php
require_once('../connect.php');
if (isset($_POST['update'])) {
    $Upload_Dir = "../../uploads/banners/";
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
    if ($_FILES['banner']) {
        $err_msg = validat_form(
            $_FILES['banner'],
            $_FILES['banner']['size'],
            $_FILES['banner']['type']
        );
        if ($err_msg) {
?>
            <script>
                alert('<?= $err_msg ?>')
                location.href = '../../pages/banners/?banners=update&id=<?= $_POST['id'] ?>'
            </script>
            <?php
        } else {

            $banner_name = $_FILES['banner']['name'];
            $arrImg = explode(".", $banner_name);
            $newImage = md5(uniqid($arrImg[0])) . "." . $arrImg[1];

            if (move_uploaded_file($_FILES['banner']['tmp_name'], $Upload_Dir . "/" . $newImage)) {
                unlink($Upload_Dir . "/" . $_POST['banner_db']);
                try {
                    $sql = "UPDATE banners SET banner = :banner WHERE id = :id";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute(array(':banner' => $newImage, ':id' => $_POST['id']));

            ?>
                    <script>
                        alert('เปลี่ยนรูปภาพการโฆษณาเรียบร้อย')
                        location.href = '../../pages/banners/'
                    </script>
                <?php
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }
            } else {
                ?>
                <script>
                    alert('<?= $err_msg ?>')
                    location.href = '../../pages/banners/?banners=update&id=<?= $_POST['id'] ?>'
                </script>
<?php
            }
        }
    }
    exit();
}
?>