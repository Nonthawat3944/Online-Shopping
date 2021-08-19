<?php
require_once('../connect.php');
function updateContact($contact)
{
    global $connect;
    try {
        $sql = "UPDATE contacts SET contact = :contact WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':contact' => $contact[1], ':id' => $contact[0]));
        return true;
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    }
}

if (
    updateContact($_POST['Facebook']) == true &&
    updateContact($_POST['Line']) == true && 
    updateContact($_POST['Tel_']) == true &&
    updateContact($_POST['Email']) == true
) {
?>
    <script>
        alert('แก้ไขข้อมูลช่องทางการติดต่อเรียบร้อย')
        location.href = '../../pages/settings/'
    </script>
<?php
} else {
?>
    <script>
        alert('เกิดข้อผิดพลาด')
        location.href = '../../pages/settings/'
    </script>
<?php
}

?>