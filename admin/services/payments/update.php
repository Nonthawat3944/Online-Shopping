<?php
require_once('../connect.php');
if (isset($_POST['update'])) {

    try {
        $sql_check = "SELECT * FROM banks WHERE bank = :bank AND bank_number = :bank_number AND id != :id";
        $stmt_check = $connect->prepare($sql_check);
        $stmt_check->execute(array(
            ':bank' => $_POST['bank'],
            ':bank_number' => $_POST['bank_number'],
            ':id' => $_POST['id']
        ));

        if ($stmt_check->rowCount() > 0) {
?>
            <script>
                alert('มีบัญชีธนาคารนี้แล้ว')
                location.href = '../../pages/payments/?payments=update&id=<?= $_POST['id'] ?>'
            </script>
        <?php
        } else {
            $sql = "UPDATE banks SET
                    bank = :bank,
                    office = :office,
                    fullname = :fullname,
                    bank_number = :bank_number
                    WHERE id = :id
                ";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':bank' => $_POST['bank'],
                ':office' => $_POST['office'],
                ':fullname' => $_POST['fullname'],
                ':bank_number' => $_POST['bank_number'],
                ':id' => $_POST['id']
            ));
        ?>
            <script>
                alert('แก้ไขข้อมูลบัญชีธนาคารเรียบร้อย')
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