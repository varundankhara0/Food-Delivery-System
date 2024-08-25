<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        
        .kanban-container {
            display: flex;
            justify-content: space-between;
        }

        .kanban-column {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
        }

        .kanban-column h2 {
            margin-top: 0;
        }

        .complaint-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .complaint-card:hover {
            background-color: #f1f1f1;
        }

        .complaint-card button {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        .accept-btn {
            background-color: #28a745;
            color: white;
        }

        .reject-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="kanban-container">
        <div class="kanban-column" id="pending-column">
            <h2>Pending Complaints</h2>
            <!-- Complaints will be inserted here by JavaScript -->
        </div>
        <div class="kanban-column" id="accepted-column">
            <h2>Accepted Complaints</h2>
            <!-- Complaints will be inserted here by JavaScript -->
        </div>
        <div class="kanban-column" id="rejected-column">
            <h2>Rejected Complaints</h2>
            <!-- Complaints will be inserted here by JavaScript -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadComplaints() {
                $.ajax({
                    url: 'get_complaints.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#pending-column').empty();
                        $('#accepted-column').empty();
                        $('#rejected-column').empty();

                        data.forEach(function(complaint) {
                            let card = `<div class="complaint-card" data-id="${complaint.id}">
                                            <p><strong>Order ID:</strong> ${complaint.orderid}</p>
                                            <p><strong>Description:</strong> ${complaint.description}</p>
                                            <p><strong>Image:</strong> <img src="images/${complaint.image}" alt="Complaint Image" width="100"></p>
                                            <button class="accept-btn" onclick="updateStatus(${complaint.id}, 'Accepted')">Accept</button>
                                            <button class="reject-btn" onclick="updateStatus(${complaint.id}, 'Rejected')">Reject</button>
                                        </div>`;
                            if (complaint.status === 'Pending') {
                                $('#pending-column').append(card);
                            } else if (complaint.status === 'Accepted') {
                                $('#accepted-column').append(card);
                            } else if (complaint.status === 'Rejected') {
                                $('#rejected-column').append(card);
                            }
                        });
                    }
                });
            }

            loadComplaints();

            window.updateStatus = function(id, status) {
                $.ajax({
                    url: 'update_complaint.php',
                    method: 'POST',
                    data: { id: id, status: status },
                    success: function(response) {
                        loadComplaints();
                    }
                });
            }
        });
    </script>
</body>
</html>
