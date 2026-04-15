<!DOCTYPE html>
<html>
<head>
    <title>Daily Habit Tracker Result</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            color: white;

            background:
                radial-gradient(circle at 20% 20%, rgba(0,245,255,0.25), transparent 35%),
                radial-gradient(circle at 80% 80%, rgba(255,78,205,0.25), transparent 35%),
                linear-gradient(135deg, #0b141a, #0f2027, #1c2c3a);
        }

        .app {
            width: 100%;
            max-width: 1000px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 36px;
            background: linear-gradient(90deg, #00f5ff, #ff4ecd, #ffe600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .grid {
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 20px;
        }

        .panel {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(18px);
            border-radius: 22px;
            padding: 30px;
        }

        .score {
            font-size: 85px;
            text-align: center;
            font-weight: bold;
        }

        .progress {
            height: 14px;
            background: rgba(255,255,255,0.1);
            border-radius: 50px;
            overflow: hidden;
            margin-top: 15px;
        }

        .bar {
            height: 100%;
            background: linear-gradient(90deg, #00f5ff, #ff4ecd);
        }

        .insight {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }

        .side {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .card {
            padding: 18px;
            border-radius: 18px;
            background: rgba(255,255,255,0.06);
        }

        .btns {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        button {
            padding: 12px 22px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            color: white;
            font-weight: 600;
            background: linear-gradient(45deg, #00f5ff, #ff4ecd);
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
        }

        .good { color: #00ff85; }
        .mid { color: #ffe600; }
        .bad { color: #ff4b4b; }

    </style>
</head>

<body>

<div class="app">

<div class="header">
    <h1>📊 Daily Habit Tracker Result</h1>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sleep = $_POST['sleep'];
    $study = $_POST['study'];
    $screen = $_POST['screen'];
    $wake_input = $_POST['wake'];

    // SAFE TIME CONVERSION
    $wake_hour = (int)date("H", strtotime($wake_input));
    $wake_time = date("h:i A", strtotime($wake_input));

    $score = 0;

    // SCORE LOGIC
    if ($sleep >= 7) $score += 35;
    elseif ($sleep >= 5) $score += 20;
    else $score += 10;

    if ($study >= 3) $score += 35;
    elseif ($study >= 1) $score += 20;
    else $score += 10;

    if ($screen <= 3) $score += 20;
    elseif ($screen <= 6) $score += 10;
    else $score += 5;

    if ($wake_hour <= 6) $score += 10;
    elseif ($wake_hour <= 8) $score += 7;
    else $score += 3;

    // STATUS
    if ($score >= 80) {
        $status = "Excellent 🔥";
        $class = "good";
    } elseif ($score >= 50) {
        $status = "Good 👍";
        $class = "mid";
    } else {
        $status = "Needs Improvement ⚠️";
        $class = "bad";
    }

    // SAVE DATA (IMPORTANT FIX)
    file_put_contents("data.txt",
        "Sleep:$sleep Study:$study Screen:$screen Wake:$wake_time Score:$score\n",
        FILE_APPEND
    );

} else {
    exit("No data submitted");
}

?>

<div class="grid">

    <div class="panel">

        <div class="score"><?php echo $score; ?>/100</div>

        <div class="progress">
            <div class="bar" style="width: <?php echo $score; ?>%"></div>
        </div>

        <div class="insight">
            😴 Sleep: <?php echo $sleep; ?> hrs |
            📚 Study: <?php echo $study; ?> hrs |
            📱 Screen: <?php echo $screen; ?> hrs |
            ⏰ Wake Up: <?php echo $wake_time; ?>
        </div>

        <h3 style="text-align:center; margin-top:10px;" class="<?php echo $class; ?>">
            <?php echo $status; ?>
        </h3>

    </div>

    <div class="side">

        <div class="card">😴 Sleep: <?php echo ($sleep >= 7) ? "Good" : "Improve"; ?></div>
        <div class="card">📚 Study: <?php echo ($study >= 3) ? "Good" : "Low"; ?></div>
        <div class="card">📱 Screen: <?php echo ($screen <= 3) ? "Healthy" : "Reduce"; ?></div>
        <div class="card">⏰ Wake: <?php echo $wake_time; ?></div>

    </div>

</div>

<div class="btns">

    <a href="index.php"><button>🔄 Try Again</button></a>
    <a href="history.php"><button>📁 History</button></a>
    <a href="graph.php"><button>📊 Graph</button></a>

</div>

</div>

</body>
</html>