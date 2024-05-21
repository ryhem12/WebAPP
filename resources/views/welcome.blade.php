<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to DzaiRoads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #875A50;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            background-image: url('/images/constantine.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(5px);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            background-color: transparent;
        }

        .navbar {
            background-color: #4d5346;
            width: 100%;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            z-index: 999;
        }

        .navbar-brand{
            color: #D5966F;
            font-weight: bold;
            font-family: 'Dancing Script';
            font-size: 130%;
        }
        .nav-link {
            color: #D5966F;
            font-weight: bold;
            font-family: 'Sorts Mill Goudy';
        }

        .credits-bar {
            background-color: #4d5346;
            width: 100%;
            padding: 10px 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            text-align: center;
            font-size: 14px;
            color: #D5966F;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .credits-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .credits-content a {
            color: #D5966F;
            text-decoration: none;
        }

        .welcome-container {
            background-color: #bb886fcc;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 80%;
            min-width: 70%;
            margin-top: 20px;
            z-index: 1;
            opacity: 0.8;
        }

        .catchy-container {
            background-color: #D5966F;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 40%; /* Half the width of welcome container */
            margin-top: 20px;
            z-index: 1;
            margin-bottom: 20px; /* Added margin-bottom */
            opacity: 0.8;

        }
        p{font-family: 'Sorts Mill Goudy';}

        h1 {
            color: #4d5346;
            font-size: 46px;
            margin-bottom: 30px;
            font-family: 'Dancing Script', cursive;
        }

        .catchy-phrase {
            color: #4d5346;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: 'Sorts Mill Goudy';
        }

        .description {
            color: #4d5346;
            font-size: 16px;
            margin-bottom: 30px;
            font-family: 'Sorts Mill Goudy';
        }

        .signup-link,
        .login-link {
            color: #4d5346;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .signup-link:hover,
        .login-link:hover {
            color: #875A50;
        }

        .highlight {
            font-style: italic;
            font-weight: bold;
            font-size: 65px;
            font-family: 'Dancing Script', cursive;
            color: #eba478e5;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DzaiRoads</a>
            <div class="row">
                <div class="col">
                    <a class="nav-link" href="#">Home</a>
                </div>
                <div class="col">
                    <a class="nav-link" href="#">About</a>
                </div>
                <div class="col">
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-container">
            <h1>Welcome to <span class="highlight">DzaiRoads</span></h1>
            <h3 class="catchy-phrase">Navigate Constantine with Ease!</h2>
            <p class="description">Discover the quickest routes around Constantine's public transportation network with DzaiRoads, your ultimate itinerary planner. Say goodbye to travel woes and hello to seamless journeys!</p>
       
            <p>If you're new here, sign up!</p>
            <a href="{{ route('register') }}" class="signup-link">Sign Up</a>
            <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Login</a></p>
        </div>
      
    </div>

    <div class="credits-bar">
        <div class="credits-content">
            Designed By Rihem Boudraa
        </div>
    </div>

</body>

</html>