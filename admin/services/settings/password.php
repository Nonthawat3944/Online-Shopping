<?php
require_once('../connect.php');
if ($_POST['confirm_new_password'] !== $_POST['new_password']) {
    ?>
        <script>
            alert('รหัสผ่านไม่ตรงกัน');
            location.href = '../../pages/settings/'
        </script>
        <?php
    } else {
        $_POST['new_password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        try {
            $stmt_check = $connect->prepare("SELECT password FROM users WHERE id = :id");
            $stmt_check->execute(array(':id' => $_SESSION['U_ID']));
            $password_db = $stmt_check->fetch();
            if (password_verify($_POST['password'], $password_db['password'])) {
                $stmt = $connect->prepare("UPDATE users SET password = :password WHERE id = :id");
                $stmt->execute(array(':password' => $_POST['new_password'], ':id' => $_SESSION['U_ID']));
        ?>
                <script>
                    alert('เปลี่ยนรหัสผ่านเรียบร้อย');
                    location.href = '../../pages/settings/'

                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('รหัสผ่านปัจจุบันไม่ถูกต้อง');
                    location.href = '../../pages/settings/'
                </script>
<?php
            }
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
            exit();
        }
    }
?>