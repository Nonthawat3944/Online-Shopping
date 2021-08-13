<?php
require_once('../../admin/services/connect.php');
if (isset($_POST['login'])) {
    try {
        $stmt_check = $connect->prepare("SELECT * FROM users WHERE username = :username");
        $stmt_check->execute(array(':username' => $_POST['username']));
        $data = $stmt_check->fetch();
        if (!empty($data) && password_verify($_POST['password'], $data['password'])) {
            $_SESSION['U_ID'] = $data['id'];
            $_SESSION['U_USERNAME'] = $data['username'];
            $_SESSION['U_FIRSTNAME'] = $data['firstname'];
            $_SESSION['U_LASTNAME'] = $data['lastname'];
            $_SESSION['U_EMAIL'] = $data['email'];
            if ($data['admin'] == 1) {
                $_SESSION['U_ROLE'] = true;
?>
                <script>
                    alert('เข้าสู่ระบบเรียบร้อย');
                    window.location = '../../admin/';
                </script>
            <?php
            } else {
                $_SESSION['U_ROLE'] = false;

            ?>
                <script>
                    alert('เข้าสู่ระบบเรียบร้อย');
                    window.location = '../../';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง');
                window.location = '../../pages/auth/login.php';
            </script>
<?php
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }

    exit();
}

?>