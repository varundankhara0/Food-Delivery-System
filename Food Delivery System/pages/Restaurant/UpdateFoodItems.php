<?php
Session_start();
 include "../../connection.php";

$id = intval($_GET['id']);


$qu = "SELECT * from tbl_fooditem WHERE id = $id";
$q = mysqli_query($conn, $qu);
$r = mysqli_fetch_assoc($q);

if (!$r) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Item Form</title>
</head>

<body>
    <div class="form-container">
        <h2>Food Item Form</h2>
        <form action="your-server-side-script.php" method="post" enctype="multipart/form-data" id="update_food">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $r['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required><?php echo $r['Description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price" value="<?php echo $r['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="<?php echo $r['type']; ?>" required>
            </div>
            <div class="form-group">
                <label for="categoryid">Category ID</label>
               <select name="categoryid" id="">
                   <?php 
                   $query="select * from tbl_category where status=1";
                   $result1=mysqli_query($conn,$query);
                   while($row=$result1->fetch_assoc())
                   {
                        ?>
                        <option value=<?php echo $row["id"];?>><?php echo $row["CategoryName"];?></option>
                        
                        <?php
                   }
                   ?> 

               </select>
            </div>
            <!-- <div class="form-group">
                <label for="restaurantID">Restaurant ID</label>
                <input type="number" id="restaurantID" name="restaurantID"  required>
            </div> -->
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" step="0.1" id="rating" name="rating" required>
            </div>
            <div class="form-group">
                <label for="totalratingdone">Total Rating Done</label>
                <input type="number" id="totalratingdone" name="totalratingdone" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateadded">Date Added</label>
                <input type="date" id="dateadded" name="dateadded" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                $("update_food").submit(function(event) {
                    event.preventDefault();
                    const form = new FormData(this);
                    $.ajax({
                        url: '../Ajax_files/update_fooditem.php',
                        method: 'POST',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response == true)
                            {
                                alert("food item updated successfully");
                                window.location='index.php';
                            }
                            else
                            {
                                alert(response);
                            }

                        }
                    })
                })
            });
        </script>

    </div>
</body>

</html>