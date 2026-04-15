
<html>
<head>
    <title>Daily Habit Tracker - Input</title>

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
            width: 100%;
            overflow: hidden;
        }

        /* 🌟 BACKGROUND IMAGE */
        .bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            filter: brightness(0.45);
        }

        /* 🌟 OVERLAY */
        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                135deg,
                rgba(15, 32, 39, 0.85),
                rgba(32, 58, 67, 0.85),
                rgba(44, 83, 100, 0.85)
            );
        }

        /* 🌟 PAGE CONTENT */
        .content {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        /* LEFT TEXT */
        .left {
            flex: 1;
            color: white;
            padding: 40px;
        }

        .left h1 {
            font-size: 60px;
            background: linear-gradient(90deg, #00f5ff, #ff4ecd, #ffe600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .left p {
            margin-top: 15px;
            font-size: 18px;
            opacity: 0.9;
            max-width: 500px;
        }

        .left .points {
            margin-top: 20px;
            font-size: 14px;
            color: #ccefff;
        }

        .left .points span {
            display: block;
            margin: 6px 0;
        }

        /* RIGHT FORM (NO BOX LOOK) */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 380px;
            display: flex;
            flex-direction: column;
        }

        label {
            color: #d6e6ff;
            font-size: 13px;
            margin-top: 12px;
        }

        input {
            margin-top: 6px;
            padding: 14px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.08);
            color: white;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #00f5ff;
            box-shadow: 0 0 15px rgba(0,245,255,0.4);
        }

        button {
            margin-top: 20px;
            padding: 14px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(45deg, #00f5ff, #ff4ecd);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(255,78,205,0.5);
        }

        .back {
            margin-top: 15px;
            text-align: center;
            color: #b8c7ff;
            text-decoration: none;
            font-size: 13px;
        }

        .back:hover {
            color: white;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .content {
                flex-direction: column;
            }

            .left h1 {
                font-size: 40px;
            }

            form {
                width: 100%;
                max-width: 350px;
            }
        }

    </style>
</head>

<body>

<!-- BACKGROUND -->
<div class="bg"></div>
<div class="overlay"></div>

<div class="content">

    <!-- LEFT SIDE -->
    <div class="left">
        <h1>Daily Habit Tracker</h1>

        <p>
            Analyze your daily habits and improve your lifestyle with smart insights 🚀
        </p>

        <div class="points">
            <span>📊 Smart Score Analysis</span>
            <span>📁 Track History</span>
            <span>📈 Graph Visualization</span>
        </div>
    </div>

    <!-- RIGHT SIDE FORM -->
    <div class="right">

        <form action="result.php" method="POST">

            <label>😴 Sleep Hours</label>
            <input type="number" name="sleep" min="0" max="12" required>

            <label>📚 Study Hours</label>
            <input type="number" name="study" min="0" max="12" required>

            <label>📱 Screen Time (Hours)</label>
            <input type="number" name="screen" min="0" max="15" required>


            <label>⏰ Wake-up Time</label>
             <input type="time" name="wake" required>
            <button type="submit">✨ Analyze Now</button>

            <a href="welcome.php" class="back">⬅ Back to Home</a>

        </form>

    </div>

</div>

</body>
</html> 