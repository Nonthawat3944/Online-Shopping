<?php
require_once('../../admin/services/connect.php');
if (isset($_POST['register'])) {

    if ($_POST['confirm_password'] !== $_POST['password']) {
?>
        <script>
            alert('รหัสผ่านไม่ตรงกัน');
            window.location = '../../pages/auth/register.php';
        </script>
        <?php
    } else {

        try {
            $stmt_check = $connect->prepare("SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1");
            $stmt_check->execute(array(':username' => $_POST['username'], ':email' => $_POST['email']));
            $result = $stmt_check->fetch();
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
            exit();
        }

        if ($result) {
            if ($result['username'] == $_POST['username']) {
        ?>
                <script>
                    alert('ชื่อผู้ใช้นี้ใช้งานแล้ว');
                    window.location = '../../pages/auth/register.php';
                </script>
            <?php
            }
            if ($result['email'] == $_POST['email']) {
            ?>
                <script>
                    alert('อีเมลล์นี้ใช้งานแล้ว');
                    window.location = '../../pages/auth/register.php';
                </script>
            <?php
            }
        } else {
            try {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (
                        username,
                        firstname,
                        lastname,
                        email,
                        password
                    ) VALUES (
                        :username,
                        :firstname,
                        :lastname,
                        :email,
                        :password
                    )";
                $stmt = $connect->prepare($sql);
                $stmt->execute(array(
                    ':username' => $_POST['username'],
                    ':firstname' => $_POST['firstname'],
                    ':lastname' => $_POST['lastname'],
                    ':email' => $_POST['email'],
                    ':password' => $_POST['password']
                ));
                $stmt_fetch = $connect->prepare("SELECT * FROM users WHERE username = :username");
                $stmt_fetch->execute(array(':username' => $_POST['username']));
                $data = $stmt_fetch->fetch();
                $_SESSION['U_ID'] = $data['id'];
                $_SESSION['U_USERNAME'] = $data['username'];
                $_SESSION['U_FIRSTNAME'] = $data['firstname'];
                $_SESSION['U_LASTNAME'] = $data['lastname'];
                $_SESSION['U_EMAIL'] = $data['email'];
                $_SESSION['U_ROLE'] = false;
            ?>
                <script>
                    alert('ลงทะเบียนเรียบร้อย');
                    window.location = '../../';
                </script>
<?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
        }
    }
}

?>