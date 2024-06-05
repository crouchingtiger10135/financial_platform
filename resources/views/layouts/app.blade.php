<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Compliance Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
        }
        .sidebar .nav-link {
            color: #ccc;
            margin-bottom: 0.5em;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .status-circle {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }
        .approved { background-color: #28a745; }
        .unapproved { background-color: #dc3545; }
        .identity-verification { background-color: #6c757d; }
        .status-708 { background-color: #ffc107; }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Wealth Check</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="#">Clients</a>
            <a class="nav-link" href="#">Settings</a>
        </nav>
    </div>
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
