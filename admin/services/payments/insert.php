<?php
require_once('../connect.php');
if (isset($_POST['insert'])) {

    try {
        $sql_check = "SELECT * FROM banks WHERE bank = :bank AND bank_number = :bank_number";
        $stmt_check = $connect->prepare($sql_check);
        $stmt_check->execute(array(
            ':bank' => $_POST['bank'],
            ':bank_number' => $_POST['bank_number']
        ));

        if ($stmt_check->rowCount() > 0) {
?>
            <script>
                alert('มีบัญชีธนาคารนี้แล้ว')
                location.href = '../../pages/payments/'
            </script>
<?php
        } else {
            $sql = "INSERT INTO banks (
                    bank,
                    office,
                    fullname,
                    bank_number
                ) VALUES (
                    :bank,
                    :office,
                    :fullname,
                    :bank_number
                )";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':bank' => $_POST['bank'],
                ':office' => $_POST['office'],
                ':fullname' => $_POST['fullname'],
                ':bank_number' => $_POST['bank_number']
            ));
            ?>
            <script>
                alert('เพิ่มบัญชีธนาคารเรียบร้อย')
                location.href = '../../pages/payments/'
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
