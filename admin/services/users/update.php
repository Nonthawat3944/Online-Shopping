<?php
require_once('../connect.php');
if (isset($_POST['update'])) {
    try {
        $stmt_check = $connect->prepare("SELECT * FROM users WHERE id != :id");
        $stmt_check->execute(array(':id' => $_POST['id']));
        $user_db = $stmt_check->fetchAll();
        $errors = array();
        foreach ($user_db as $db) {
            if ($db['username'] == $_POST['username']) {
                array_push($errors, "ชื่อผู้ใช้นี้ใช้งานแล้ว");
            }
            if ($db['email'] == $_POST['email']) {
                array_push($errors, "อีเมลล์นี้ใช้งานแล้ว");
            }
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
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
                ':id' => $_POST['id']
            ));
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
            exit();
        }
?>
        <script>
            alert('บันทึกข้อมูลเรียบร้อย');
            window.location = '../../pages/users/?users=update&id=<?= $_POST['id'] ?>'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('<?= $errors[0] ?>');
            window.location = '../../pages/users/?users=update&id=<?= $_POST['id'] ?>'
        </script>
<?php
    }
    exit();
}

?>