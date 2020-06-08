
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Forg Godfathers</title>
    <link rel="stylesheet" type="text/css" href="../css/statistics/statistics.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="container">
        <header>
            <img id="godfather_icon" src="assets/godfather_24px.png" alt="Gothfather icon">
            <h3>Your statistics</h3>
            <a id="logout_link" href="../logout.php">LOGOUT</a>
        </header>
        <div class="main_content">
            <div class="options">
                <button id="price_stats">Pricing statistics</button>
                <button id="likes_stats">Likes statistics</button>
            </div>
            <div class="options_exec_area">
                <div id="price_stats_area">
                    <div class="chart_filters">
                        <button id="pret_crescator">Pret crescator</button>
                        <button id="pret_descrescator">Pret descrescator</button>
                    </div>
                    <div class="chart">
                        <canvas id="priceChartContainer"></canvas>
                    </div>
                </div>
                <div id="likes_stats_area">
                    <div class="chart"></div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="../js/statistics.js"></script>
    <script>
            let mostExpensiveFood;
            let lessExpensiveFood;

            let mostExpensiveFoodName = [];
            let mostExpensiveFoodPrice = [];

            let lessExpensiveFoodName = [];
            let lessExpensiveFoodPrice = [];

            function loadJsonLessExpensiveFood() { //urmatorii pasii
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        mostExpensiveFood = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getMostExpensiveFood.php", false);
                xmlhttp.send();
            }

            function loadJsonMostExpensiveFood() { //urmatorii pasii
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        lessExpensiveFood = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getLessExpensiveFood.php", false);
                xmlhttp.send();
            }

            loadJsonMostExpensiveFood();
            loadJsonLessExpensiveFood();

            // console.log(mostExpensiveFood);
            // console.log(lessExpensiveFood);
            mostExpensiveFood = JSON.parse(mostExpensiveFood);
            for (var i = 0; i < mostExpensiveFood.length; ++i) {
                mostExpensiveFoodName.push(mostExpensiveFood[i]["nume"]);
                console.log(mostExpensiveFood[i]);
                mostExpensiveFoodPrice.push(mostExpensiveFood[i]["pret"]);
            }

            lessExpensiveFood = JSON.parse(lessExpensiveFood);
            for (var i = 0; i < lessExpensiveFood.length; ++i) {
                lessExpensiveFoodName.push(lessExpensiveFood[i]["nume"]);
                console.log(lessExpensiveFood[i]);
                lessExpensiveFoodPrice.push(lessExpensiveFood[i]["pret"]);
            }

            let profit_chart_ctx = document.getElementById('priceChartContainer').getContext('2d');
            let profit_chart_config = {
                type: 'bar',
                data: {
                    labels: mostExpensiveFoodName,
                    datasets: [{
                        label: 'Food price',
                        data: mostExpensiveFoodPrice,
                        backgroundColor: '#b388ff',
                        borderColor: '#6200ea',
                        borderWidth: 2
                    }]
                },
            };

            function updateChart(newLabel, newData, newBackgroundColor, newBorderColor) {
                profit_chart_config.data.labels = newLabel;
                profit_chart_config.data.datasets[0].data = newData;
                profit_chart_config.data.datasets[0].backgroundColor = newBackgroundColor;
                profit_chart_config.data.datasets[0].borderColor = newBorderColor;
                profit_chart.update();
            }

            let profit_chart = new Chart(profit_chart_ctx, profit_chart_config);

            const priceStatsBtn = document.getElementById("price_stats");
            const likesStatsBtn = document.getElementById("likes_stats");

            const priceAscBtn = document.getElementById("pret_crescator");
            const priceDescBtn = document.getElementById("pret_descrescator");

            const priceStatsContainer = document.getElementById("price_stats_area");
            const likesStatsContainer = document.getElementById("likes_stats_area");

            priceStatsContainer.style.display = 'block';
            likesStatsContainer.style.display = 'none';

            updateChart(mostExpensiveFoodName, mostExpensiveFoodPrice, '#ff4500', '#37474f');
            priceStatsBtn.addEventListener('click', function(){
                priceStatsContainer.style.display = 'block';
                likesStatsContainer.style.display = 'none';
            });

            likesStatsBtn.addEventListener('click', function(){
                priceStatsContainer.style.display = 'none';
                likesStatsContainer.style.display = 'block';
            });

            priceAscBtn.addEventListener('click', function(){
                updateChart(mostExpensiveFoodName, mostExpensiveFoodPrice, '#ff4500', '#37474f');
            });

            priceDescBtn.addEventListener('click', function(){
                updateChart(lessExpensiveFoodName, lessExpensiveFoodPrice, '#37474f', '#ff4500');
            });
    </script>
</body>
</html>