<!DOCTYPE html>
<html>
<head>
    <title>History</title>

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
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 1000px;
            text-align: center;
        }

        h1 {
            font-size: 34px;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #00f5ff, #ff4ecd, #ffe600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .history {
            max-height: 500px;
            overflow-y: auto;
            padding: 10px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 20px;
            margin: 10px 0;
            border-radius: 15px;
            background: rgba(255,255,255,0.06);
        }

        .col {
            flex: 1;
            text-align: center;
            font-size: 14px;
        }

        .score {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
        }

        .high { background: #00c853; }
        .mid { background: #ff9800; }
        .low { background: #ff1744; }

        button {
            margin-top: 25px;
            padding: 12px 22px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #00f5ff, #ff4ecd);
        }
    </style>
</head>

<body>

<div class="wrapper">

<h1>📁 Your History</h1>

<div class="history">

<?php

$file = "data.txt";

if (!file_exists($file)) {
    echo "<p>No history found.</p>";
} else {

    $data = file($file);

    foreach ($data as $line) {

        // SAFE PARSING (NO ERRORS)
        preg_match('/Sleep:([0-9]+)/', $line, $s);
        preg_match('/Study:([0-9]+)/', $line, $st);
        preg_match('/Screen:([0-9]+)/', $line, $scr);
        preg_match('/Wake:([^ ]+)/', $line, $w);
        preg_match('/Score:([0-9]+)/', $line, $sc);

        $sleep = $s[1] ?? 0;
        $study = $st[1] ?? 0;
        $screen = $scr[1] ?? 0;
        $wake = $w[1] ?? "N/A";
        $score = $sc[1] ?? 0;

        if ($score >= 80) {
            $class = "score high";
        } elseif ($score >= 50) {
            $class = "score mid";
        } else {
            $class = "score low";
        }

        echo "
        <div class='row'>
            <div class='col'>😴 {$sleep} hrs</div>
            <div class='col'>📚 {$study} hrs</div>
            <div class='col'>📱 {$screen} hrs</div>
            <div class='col'>⏰ {$wake}</div>
            <div class='col'><span class='$class'>{$score}/100</span></div>
        </div>
        ";
    }
}

?>

</div>

<a href="index.php">
    <button>⬅ Back</button>
</a>

</div>

</body>
</html>