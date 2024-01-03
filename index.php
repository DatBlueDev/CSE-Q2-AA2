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
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Reminder App</h1>
        <p class="lead">This is a simple reminder application</p>

    </div>
    <!-- Reminder Form -->
    <form id="reminderForm" action = "index.php" method = "post">
        <div class="form-group">
            <label for="reminderText">Reminder:</label>
            <input type="text" class="form-control" id="reminderText" required>
        </div>
        <div class="form-group">
            <label for="reminderDate">Date:</label>
            <input type="date" class="form-control" id="reminderDate" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description">
        </div>
        <button type="submit" class="btn btn-primary">Add Reminder</button>
    </form>

    <hr>

    <!-- Reminder List -->
    <h3>Reminder List</h3>
    <ul id="reminderList" class="list-group">
        <!-- Reminder items will be dynamically added here -->
    </ul>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>