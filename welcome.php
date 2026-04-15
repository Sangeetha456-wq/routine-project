<!DOCTYPE html>
<html>
<head>
    <title>Daily Habit Tracker</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-btn {
            padding: 8px 20px;
            border-radius: 25px;
            border: none;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .nav-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px #00c6ff;
        }

        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 60vh;
            flex-direction: column;
            padding: 10px;
        }

        .hero h1 {
            font-size: 44px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .hero p {
            margin-top: 5px;
            font-size: 15px;
            opacity: 0.85;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 30px;
            border: none;
            margin-top: 15px;
            font-size: 15px;
            cursor: pointer;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px #00c6ff;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 15px;
        }

        .card {
            width: 240px;
            padding: 18px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            border-radius: 15px;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 8px;
            font-size: 17px;
        }

        .card p {
            font-size: 13px;
            opacity: 0.8;
        }

    </style>
</head>

<body>

<!-- 🔷 Navbar -->
<div class="navbar">
    <div class="logo">📊 Daily Habit Tracker</div>

    <a href="index.php">
        <button class="nav-btn">🚀 Get Started</button>
    </a>
</div>

<!-- 🔷 Hero -->
<div class="hero">
    <h1>Improve Your Life.<br>Track Your Habits Smartly.</h1>
    <p>Monitor sleep, study, and daily habits to boost productivity.</p>

    <a href="index.php">
        <button class="btn">✨ Start Now</button>
    </a>
</div>

<!-- 🔷 Features -->
<div class="features">

    <div class="card">
        <h3>📊 Smart Tracking</h3>
        <p>Track your daily habits and get performance score instantly.</p>
    </div>

    <div class="card">
        <h3>⚡ Fast Results</h3>
        <p>Quick analysis using efficient PHP logic.</p>
    </div>

    <div class="card">
        <h3>📈 Progress View</h3>
        <p>Visualize your improvement using graphs and history.</p>
    </div>

</div>

</body>
</html>