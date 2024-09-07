<?php 
include "checkowner.php"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Food Items</title>
    <script src="../../js/disable.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

    <h2>View Food Items</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Type</th>
                <th>Category</th>
                <th>Rating</th>
                <th>Total Ratings</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../connection.php";
            
            function convertToWebPath($filesystemPath)
            {
                // Replace backslashes with forward slashes
                $webPath = str_replace('\\', '/', $filesystemPath);
                // Remove the document root part of the path
                return str_replace('C:/xampp/htdocs/', '/', $webPath);
            }

            $restaurantID = 1; 

            $query = "SELECT
                                  i.id,
                                  i.name ,
                                  i.Description,
                                  i.price,
                                  i.image,
                                  i.type,
                                  c.CategoryName,
                                  r.name as restaurant,
                                  i.rating,
                                  i.totalratingdone,
                                  i.status,
                                  i.dateadded
                               FROM
                                   tbl_fooditem i
                               JOIN
                                   tbl_category c
                                   ON i.categoryid = c.id
                               JOIN
                                   tbl_restaurant r
                                   ON i.restaurantID = r.ID
                                WHERE
                                r.ID=".$_SESSION["restaurantid"];
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $foodID = $row['id'];
                    $statusText = $row["status"] == 0 ? "Activate" : "Deactivate";
                    $statusAction = $row["status"] == 0 ? 1 : 0;
                    $category = $row['type'] == 1 ? "Non-Veg" : "Veg";

                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['Description']}</td>
                            <td>{$row['price']}</td>
                            <td><img src='" . convertToWebPath($row['image']) . "' alt='{$row['name']}'></td>
                            <td>{$category}</td>
                            <td>{$row['CategoryName']}</td>
                            <td>{$row['rating']}</td>
                            <td>{$row['totalratingdone']}</td>
                            <td>" . ($row['status'] == 1 ? "Active" : "Inactive") . "</td>
                            <td>{$row['dateadded']}</td>
                            <td>
                                <div class='dropdown'>
                                    <button class='dropbtn'>Action</button>
                                    <div class='dropdown-content'>
                                        <a href='#' onclick='changestatus($foodID, $statusAction)'>$statusText</a>
                                        <a href='UpdateFoodItems.php?id={$foodID}'>Edit</a>
                                    </div>
                                </div>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No food items found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <script>
    function changestatus(id, status) {
        $.ajax({
            url: '../Ajax_files/ActivateDeactivate_r.php',
            method: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                if (response == true) {
                    alert("Change status successfully");
                    location.reload();
                } else {
                    alert("Problem occurred");
                    alert(response);
                }
            }
        });
    }
    </script>
</body>
</html>
