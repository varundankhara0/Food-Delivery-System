<?php
include "../../connection.php";
$query = "SELECT count(*) AS new_complaints_count
FROM tbl_complaint
-- WHERE complaintstatus=1";
$result = mysqli_query($conn, $query);
$count = 0;
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_array()) 
    {
        $count=$row["new_complaints_count"];
    }
}
echo $count
?>
