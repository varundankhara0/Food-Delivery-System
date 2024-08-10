<?php
include "../../connection.php";

if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    // Fetch current quantity
    $query = "SELECT quantity FROM Tbl_order_cart WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $new_quantity = $row['quantity'];

  
        if ($action == 'increment' && $new_quantity < 15) {
            $new_quantity++;
        } elseif ($action == 'decrement' && $new_quantity > 1 ) {
            $new_quantity--;
        } elseif($action=='decrement' && $new_quantity==1)
        {
            echo json_encode(['success' => false, 'message' => "item is already at minimum quantity!! \nPlease use Delete option to remove the item from the cart"]);
            exit(0);
        }elseif ($action == 'increment' && $new_quantity == 15){
            echo json_encode(['success' => false, 'message' => "item is already at maximum quantity"]);
            exit(0);
        }

        
        $updateQuery = "UPDATE Tbl_order_cart SET quantity = $new_quantity WHERE id = $id";
        if (mysqli_query($conn, $updateQuery)) {
            
            echo json_encode(['success' => true, 'new_quantity' => $new_quantity]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
