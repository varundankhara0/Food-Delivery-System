<?php
include "../../connection.php";

$type = isset($_POST['type']) ? $_POST['type'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$priceRange = isset($_POST['priceRange']) ? $_POST['priceRange'] : '';
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$itemsPerPage = 12; // Number of items per page
$encryptedOrderId="";
$offset = ($page - 1) * $itemsPerPage;
function encrypt($plaintext, $key, $iv)
      {
        return openssl_encrypt($plaintext, 'AES-128-CBC', $key, 0, $iv);
      }
      $key = 'mysecretkey12345';
      $iv = '1234567890123456';
$query = "SELECT fd.id, fd.name, fd.image, fd.price, fd.description, fd.categoryid, ca.CategoryName, rs.Name as RestaurantName,rs.id as RestaurantID
          FROM tbl_fooditem AS fd 
          JOIN tbl_category AS ca ON ca.id=fd.categoryid 
          JOIN tbl_restaurant as rs on rs.id=fd.restaurantID
          WHERE fd.status=1 AND ca.status=1 AND rs.status=1 ";

if ($type) {
    $query .= " AND fd.type='$type'";
}

if ($category) {
    $query .= " AND fd.categoryid='$category'";
}

if ($priceRange) {
    list($minPrice, $maxPrice) = explode('-', $priceRange);
    $query .= " AND fd.price BETWEEN $minPrice AND $maxPrice";
}
$query.=' ORDER BY 
    RAND() ';
$query .= " LIMIT $offset, $itemsPerPage";
$result = mysqli_query($conn, $query);

$foodItems = [];
while ($row = mysqli_fetch_assoc($result)) {
    $foodItems[] = $row;
    $encryptedOrderId = urlencode(encrypt($row['id'], $key, $iv));
}

$totalItemsQuery = "SELECT COUNT(*) as count 
                    FROM tbl_fooditem AS fd 
                    JOIN tbl_category AS ca ON ca.id=fd.categoryid 
                    WHERE fd.status=1 AND ca.status=1";

if ($type) {
    $totalItemsQuery .= " AND fd.type='$type' ";
}

if ($category) {
    $totalItemsQuery .= " AND fd.categoryid='$category' ";
}

if ($priceRange) {
    list($minPrice, $maxPrice) = explode('-', $priceRange);
    $totalItemsQuery .= " AND fd.price BETWEEN $minPrice AND $maxPrice ";
}

$totalItemsResult = mysqli_query($conn, $totalItemsQuery);
$totalItemsRow = mysqli_fetch_assoc($totalItemsResult);
$totalItems = $totalItemsRow['count'];


$response = [
    'foodItems' => $foodItems,
    'totalItems' => $totalItems,
    'itemsPerPage' => $itemsPerPage,
    'currentPage' => $page,
    'Encryptedid'=>$encryptedOrderId,
];

echo json_encode($response);
?>