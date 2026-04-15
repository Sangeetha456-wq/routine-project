<!DOCTYPE html>
<html>
<head>
    <title>Graph</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            background:
                radial-gradient(circle at top left, rgba(0,245,255,0.2), transparent 40%),
                radial-gradient(circle at bottom right, rgba(255,78,205,0.2), transparent 40%),
                linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            padding: 30px;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(18px);
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 0 50px rgba(0,0,0,0.6);
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #00f5ff, #ff4ecd, #ffe600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .chart-wrapper {
            height: 420px;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
            border-radius: 15px;
            background: rgba(255,255,255,0.04);
            padding: 10px;
        }

        button {
            margin-top: 20px;
            padding: 12px 22px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(45deg, #00f5ff, #ff4ecd);
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

<div class="container">

<h1>📊 Routine Performance (Last 7 Attempts)</h1>

<div class="chart-wrapper">
    <canvas id="myChart"></canvas>
</div>

<?php
$file = "data.txt";
$scores = [];

if (file_exists($file)) {
    $data = file($file);

    foreach ($data as $line) {
        preg_match('/Score:(\d+)/', $line, $sc);
        if (isset($sc[1])) {
            $scores[] = (int)$sc[1];
        }
    }
}

/* 🔥 LIMIT TO LAST 7 ONLY */
$scores = array_slice($scores, -7);
?>

<script>

let scores = <?php echo json_encode($scores); ?>;

/* clean labels */
let labels = scores.map((_, i) => "Try " + (i + 1));

/* modern colors */
let colors = [
    '#00f5ff', '#ff4ecd', '#ffe600',
    '#00ff85', '#ff6b6b', '#a855f7', '#38bdf8'
];

new Chart(document.getElementById('myChart'), {
    type: 'bar',

    data: {
        labels: labels,
        datasets: [{
            label: 'Score',
            data: scores,

            barThickness: 45,
            backgroundColor: scores.map((_, i) => colors[i % colors.length]),

            borderRadius: 0,   /* rectangle bars */
            borderWidth: 1,
            borderColor: 'rgba(255,255,255,0.6)'
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                labels: { color: 'white' }
            }
        },

        scales: {
            x: {
                ticks: { color: 'white' },
                grid: { display: false }
            },
            y: {
                beginAtZero: true,
                max: 100,
                ticks: { color: 'white' },
                grid: { color: 'rgba(255,255,255,0.1)' }
            }
        }
    }
});

</script>

<a href="index.php">
    <button>⬅ Back</button>
</a>

<?php
$total = 0;
$count = count($scores);

foreach ($scores as $s) {
    $total += $s;
}

$avg = $count ? round($total / $count, 2) : 0;

echo "<h3 style='margin-top:20px;color:#00f5ff'>
📊 Average Score: $avg / 100
</h3>";
?>

</div>

</body>
</html>