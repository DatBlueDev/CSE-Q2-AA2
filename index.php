<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom styles -->
    <style>
        body {
            background-image: url('../CSE-Q2-AA2-main/img/hkWallpaper.jpg');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
            background-position: center center;
            margin: 0;
            padding: 30px;
            color:white;
        }
        #mainContainer{
            background-color:rgba(0,0,0,0.4);
            padding-top:2%;
            padding-bottom:2%;

        }
        #mainJumbotron{
            color:black;
        }
        .deletRecBtn{
            
        }

    </style>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_intal_reminderapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deleteRecord'])) {
        $idToDelete = $_POST['deleteRecord'];
        $deleteQuery = "DELETE FROM tbl_reminder WHERE id = $idToDelete";

        if ($conn->query($deleteQuery) === TRUE) {
        } else {
        }
    } else {
        // collect value of input field
        $data = array($_REQUEST['reminderText'], $_REQUEST['reminderDate'], $_REQUEST['description']);

        if (empty($data)) {
        } else {
            $sqlquery = ("INSERT INTO tbl_reminder (Title, DueDate, Description) VALUES (" . "'" . $data[0] . "'" . ", " . "'" . $data[1] . "'" . "," . "'" . $data[2] . "'" . ")");

            if ($conn->query($sqlquery) === TRUE) {
                
                // Redirect to prevent duplicate submissions
                header("Location: index.php");
                exit();
            } else {
            }
        }
    }
}

$sql = "SELECT id, Title, DueDate, Description FROM tbl_reminder";
$result = $conn->query($sql);
?>

<div class="container" id = "mainContainer">
    <div style="width:100%; text-align:center">
        <img src="../CSE-Q2-AA2-main/img/header.png" width=800 alt = "Hollow Knight Themed Header">
    </div>
    <!-- Reminder Form -->
    <form id="reminderForm" action="index.php" method="post">
        <div class="form-group">
            <label for="reminderTextID">Reminder:</label>
            <input type="text" class="form-control" id="reminderTextID" name="reminderText" required>
        </div>
        <div class="form-group">
            <label for="reminderDateID">Date:</label>
            <input type="date" class="form-control" id="reminderDateID"  name="reminderDate" required>
        </div>
        <div class="form-group">
            <label for="descriptionID">Description:</label>
            <input type="text" class="form-control" id = "descriptionID" name="description">
        </div>
        <div style="width:100%; text-align:center">
            <button type="submit" class="btn btn-primary">Add Reminder</button>
        </div>
    </form>

    <div style="width:100%; text-align:center">
        <img src="../CSE-Q2-AA2-main/img/divider.png" width=300 alt = "Hollow Knight Themed Divider">
</div>
    <!-- Reminder List -->
    <h3>Reminder List</h3>
    <form id="DataDeletionForm" action="index.php" method="post">
        <table class="table table-bordered table-hover table-dark " style = "background-color:rgba(0,0,50,0.2); text-align:center;">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Due Date</th>
                <th>Description</th>
                <th></th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["Title"] . "</td>
                            <td>" . $row["DueDate"] . "</td>
                            <td>" . $row["Description"] . "</td>
                            <td><button class = 'btn-danger' type='submit' name='deleteRecord' value='" . $row["id"] . "'>Delete Record</button></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </table>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>