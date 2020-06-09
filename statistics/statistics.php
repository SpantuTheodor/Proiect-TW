<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Forg Godfathers</title>
    <link rel="stylesheet" type="text/css" href="../css/statistics/statistics.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <div class="container">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="../index.php"><img class="nav-icon" src="../categories/assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="../Categories/forg.php"><img class="nav-icon" src="../categories/assets/icons/categories.png" alt="categories-icon">CATEGORIES</a>
                <a id="a3" href="../ContactUs/contactUs.php"><img class="nav-icon" src="../categories/assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a7" href="../profile/profileDemo.php"><img class="nav-icon" src="../categories/assets/icons/profile.png" style="height:24px;width:24px;" alt="profile">MY PROFILE</a>
                <a id="a5" href="../logout.php"><img class="nav-icon" src="../categories/assets/icons/logout.png" alt="logout">LOGOUT</a>
            </nav>
        </header>
        <div class="main_content">
            <div class="options_exec_area">
                <div id="price_stats_area">
                    <div class="chart_filters">
                        <button id="pret_crescator">Pret &nbsp&nbsp &nbsp  crescator</button>
                        <button id="pret_descrescator">Pret descrescator</button>
                    </div>
                    <div class="chart">
                        <canvas id="priceChartContainer" height=200px></canvas>
                        <div class="chart_filters">
                            <button id="likes_crescator">Nr. like-uri crescator</button>
                            <button id="likes_descrescator">Nr. like-uri descrescator</button>
                        </div>
                        <canvas id="likesChartContainer" style="margin-top:13%" height=200px></canvas>
                    </div>
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

        let mostLikedFood;
        let leastLikedFood;

        let mostLikedFoodName = [];
        let leastLikedFoodName = [];

        let mostLikedFoodNumber = [];
        let leastLikedFoodNumber = [];


        function loadJsonLessExpensiveFood() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    mostExpensiveFood = this.responseText;
                }
            };
            xmlhttp.open("GET", "getMostExpensiveFood.php", false);
            xmlhttp.send();
        }

        function loadJsonMostExpensiveFood() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    lessExpensiveFood = this.responseText;
                }
            };
            xmlhttp.open("GET", "getLessExpensiveFood.php", false);
            xmlhttp.send();
        }


        function loadJsonMostLikedFood() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    mostLikedFood = this.responseText;
                }
            };
            xmlhttp.open("GET", "getMostLikedFood.php", false);
            xmlhttp.send();
        }


        function loadJsonLeastLikedFood() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    leastLikedFood = this.responseText;
                }
            };
            xmlhttp.open("GET", "getLeastLikedFood.php", false);
            xmlhttp.send();
        }

        loadJsonMostExpensiveFood();
        loadJsonLessExpensiveFood();
        loadJsonMostLikedFood();
        loadJsonLeastLikedFood();


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

        mostLikedFood = JSON.parse(mostLikedFood);
        for (var i = 0; i < mostLikedFood.length; ++i) {
            mostLikedFoodName.push(mostLikedFood[i]["nume"]);
            console.log(mostLikedFood[i]);
            mostLikedFoodNumber.push(mostLikedFood[i]["numar_aprecieri"]);
        }

        leastLikedFood = JSON.parse(leastLikedFood);
        for (var i = 0; i < leastLikedFood.length; ++i) {
            leastLikedFoodName.push(leastLikedFood[i]["nume"]);
            console.log(leastLikedFood[i]);
            leastLikedFoodNumber.push(leastLikedFood[i]["numar_aprecieri"]);
        }




        let profit_chart_ctx = document.getElementById('priceChartContainer').getContext('2d');
        let profit_chart_config = {
            type: 'bar',
            data: {
                labels: mostExpensiveFoodName,
                datasets: [{
                    label: 'Food price',
                    data: mostExpensiveFoodPrice,
                    backgroundColor: '#ff4500',
                    borderColor: '#37474f',
                    borderWidth: 2
                }]
            },
        };


        let likes_chart_ctx = document.getElementById('likesChartContainer').getContext('2d');
        let likes_chart_config = {
            type: 'bar',
            data: {
                labels: mostLikedFoodName,
                datasets: [{
                    label: 'Food number of likes',
                    data: mostLikedFoodNumber,
                    backgroundColor: '#ff4500',
                    borderColor: '#37474f',
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

        function updateChart2(newLabel, newData, newBackgroundColor, newBorderColor) {
            likes_chart_config.data.labels = newLabel;
            likes_chart_config.data.datasets[0].data = newData;
            likes_chart_config.data.datasets[0].backgroundColor = newBackgroundColor;
            likes_chart_config.data.datasets[0].borderColor = newBorderColor;
            likes_chart.update();
        }

        let profit_chart = new Chart(profit_chart_ctx, profit_chart_config);
        let likes_chart = new Chart(likes_chart_ctx, likes_chart_config);

        const priceStatsBtn = document.getElementById("price_stats");
        const likesStatsBtn = document.getElementById("likes_stats");

        const priceAscBtn = document.getElementById("pret_crescator");
        const priceDescBtn = document.getElementById("pret_descrescator");

        const likesAscBtn = document.getElementById("likes_crescator");
        const likesDescBtn = document.getElementById("likes_descrescator");

        const priceStatsContainer = document.getElementById("price_stats_area");
        const likesStatsContainer = document.getElementById("price_stats_area");

        priceStatsContainer.style.display = 'block';
        likesStatsContainer.style.display = 'block';
        priceChartContainer.style.display = 'block';
        likesChartContainer.style.display = 'block';

        priceAscBtn.addEventListener('click', function() {
            updateChart(mostExpensiveFoodName, mostExpensiveFoodPrice, '#ff4500', '#37474f');
        });

        priceDescBtn.addEventListener('click', function() {
            updateChart(lessExpensiveFoodName, lessExpensiveFoodPrice, '#37474f', '#ff4500');
        });

        likesAscBtn.addEventListener('click', function() {
            updateChart2(mostLikedFoodName, mostLikedFoodNumber, '#ff4500', '#37474f');
        });

        likesDescBtn.addEventListener('click', function() {
            updateChart2(leastLikedFoodName, leastLikedFoodNumber, '#37474f', '#ff4500');
        });
    </script>
</body>

</html>