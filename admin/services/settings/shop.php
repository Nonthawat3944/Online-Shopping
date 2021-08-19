<?php
require_once('../connect.php');
function updateShop($shop)
{
    global $connect;
    try {
        $sql = "UPDATE shop SET title = :title WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':title' => $shop[1], ':id' => $shop[0]));
        return true;
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    }
}

if (
    updateShop($_POST['name_shop']) == true &&
    updateShop($_POST['name_web']) == true &&
    updateShop($_POST['shop_details']) == true &&
    updateShop($_POST['shopping_cost']) == true &&
    updateShop($_POST['line_token']) == true
) {
    ?>
    <script>
        alert('แก้ไขข้อมูลร้านค้าเรียบร้อย')
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