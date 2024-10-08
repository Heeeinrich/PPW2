<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            /* Full viewport height */
            width: 250px;
            /* Sidebar width */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .navbar-brand a {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            text-align: center;
        }

        .navbar-links {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .navbar-links li {
            margin: 20px 0;
        }

        .navbar-links li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            display: block;
        }

        .navbar-links li a:hover {
            background-color: #575757;
            color: #ddd;
        }

        /* Main content styling */
        .main-content {
            margin-left: 250px;
            /* Same width as the sidebar */
            padding: 50px;

        }

        .main-content h1 {
            font-size: 36px;
        }

        .main-content p {
            font-size: 18px;
            margin-top: 10px;
            line-height: 1.6;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>


<body>

    <div class="sidebar">
        <div class="navbar-brand">
            <h3 class="ml-4 text-white">LATIHAN UTS</h3>
        </div>
        <ul class="navbar-links">
            <li><a href="{{ route('indek') }}">DASHBOARD</a></li>
            <li><a href="{{ route('secret') }}">APA YAAA?</a></li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>


</html>
