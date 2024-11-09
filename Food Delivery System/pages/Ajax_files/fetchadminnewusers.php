<?php
include "../../connection.php";
$query = "SELECT SUM(amount) AS new_amount_count
FROM tbl_order
-- WHERE    date>= NOW() - INTERVAL 1 DAY";
$result = mysqli_query($conn, $query);
$count = 0;
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_array()) 
    {
        $count=$row["new_amount_count"];
    }
}
echo $count
?>
