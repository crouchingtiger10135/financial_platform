<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            color: white;
            text-align: center;
            font-size: 18px;
        }
        .sidebar .nav-item .nav-link {
            color: white;
            padding: 10px 20px;
            display: block;
        }
        .sidebar .nav-item .nav-link:hover {
            background-color: #495057;
            border-radius: 4px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .settings-button {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            display: block;
            margin-top: auto;
        }
        .settings-button:hover {
            background-color: #0056b3;
        }
        .status-circle {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            margin-right: 5px;
        }
        .approved {
            background-color: green;
        }
        .unapproved {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Wealth Check</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings.index') }}">Settings</a>
                </li>
                <!-- Add other nav items here -->
            </ul>
        </div>
        <!-- Fixed settings button -->
        <a href="{{ route('settings.index') }}" class="settings-button">
            Settings
        </a>
    </div>

    <div class="content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
