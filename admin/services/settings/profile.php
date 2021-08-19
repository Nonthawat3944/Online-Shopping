<?php
require_once('../connect.php');
$errors = array();
try {
    $stmt_check = $connect->prepare("SELECT * FROM users WHERE id != :id");
    $stmt_check->execute(array(':id' => $_SESSION['U_ID']));
    $user_db = $stmt_check->fetchAll();
    foreach ($user_db as $db) {
        if ($db['username'] == $_POST['username']) {
            array_push($errors, "ชื่อผู้ใช้นี้ใช้งานแล้ว");
        }
        if ($db['email'] == $_POST['email']) {
            array_push($errors, "อีเมลล์นี้ใช้งานแล้ว");
        }
    }
    if (count($errors) == 0) {
        try {
            $sql = "UPDATE users SET username = :username, firstname = :firstname, lastname = :lastname, email = :email WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':username' => $_POST['username'],
                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':email' => $_POST['email'],
                ':id' => $_SESSION['U_ID']
            ));
            unset(
                $_SESSION['U_USERNAME'],
                $_SESSION['U_FIRSTNAME'],
                $_SESSION['U_LASTNAME'],
                $_SESSION['U_EMAIL']
            );
            $_SESSION['U_USERNAME'] = $_POST['username'];
            $_SESSION['U_FIRSTNAME'] = $_POST['firstname'];
            $_SESSION['U_LASTNAME'] = $_POST['lastname'];
            $_SESSION['U_EMAIL'] = $_POST['email'];
?>
            <script>
                alert('บันทึกข้อมูลเรียบร้อย');
                location.href = '../../pages/settings/'
            </script>
        <?php
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        }
    } else {
        ?>
        <script>
            alert('<?= $errors[0] ?>');
            location.href = '../../pages/settings/'
        </script>
<?php
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
}
?>