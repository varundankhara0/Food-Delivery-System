
    <?php
    include '../../connection.php';
    if (isset($_POST['submit'])) {
   
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        
        // $sql = "update tbl_fooditem SET name='$name', email='$email', city='$city', address='$address' WHERE id=$id";
        $sql="UPDATE `tbl_fooditem` SET `id`='[value-1]',`name`='[value-2]',`Description`='[value-3]',`price`='[value-4]',`image`='[value-5]',`type`='[value-6]',`categoryid`='[value-7]',`restaurantID`='[value-8]',`rating`='[value-9]',`totalratingdone`='[value-10]',`status`='[value-11]',`dateadded`='[value-12]' WHERE 1";
        $Result = mysqli_query($conn, $sql);
        header('Location: update_delete.php');
    }
    ?>
