<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://image.flaticon.com/icons/png/512/178/178158.png"
          rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" href="../assets/css/MainCSS.css">

    <title>Crypto </title>
</head>
<body>
<div class="container">
    <?php
    include("Header.php");
    ?>

</div>

<div class="container">
    <div id="conSelector" class="justify-content-center ">
        <img src="#" width="100" height="100" class="d-inline-block " alt="">
        <h1 class="display-4 mb-4 mx-auto reveal-text newsLetter col-9" id="currency">Bitcoin</h1>
        <div class="text-center">
            <select id="cryptoSelector" class="custom-select custom-select-lg mb-3">
                <option value="0">Bitcoin</option>
                <option value="1">Ethereum</option>
                <option value="2">Litecoin</option>
                <option value="3">Cardano</option>
                <option value="4">Dogecoin</option>
                <option value="5">Binance</option>
                <option value="6">XRP</option>
                <option value="7">Uniswap</option>
                <option value="8">Polkadot</option>
                <option value="9">Tether</option>
                <option value="10">Hex</option>
            </select>
        </div>
        <hr class="my-4">

    </div>

    <div>
        <div class="justify-content-end">


        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <!-- dynamic current price -->
                <p class="changeFont d-inline-block mb-0">$</p>
                <p id="precioActual" class="changeFont d-inline-block mb-0"></p>
                <p id="percentChange" class="d-inline-block align-top"></p>
            </div>

        </div>

        <!-- Graph within canvas element -->
        <canvas class="my-4 w-100" id="cryptoGraph" width="900" height="380"></canvas>
    </div>
    <div class="col -12 btn-group d-inline-block align-center custom-radio custom-control" id="timeButtons">
        <input type="radio" name="options" value="24h" class="btn-check" id="24h">
        <label id="lblRadio" class="btn btn-light" for="24h">24h</label>
        <input type="radio" name="options" value="7d" class="btn-check" id="7d">
        <label id="lblRadio" class="btn btn-light" for="7d">7d</label>
        <input type="radio" name="options" value="30d" class="btn-check" id="30d">
        <label id="lblRadio" class="btn btn-light" for="30d">30d</label>
        <input id="lblRadio" type="radio" name="options" value="1y" class="btn-check" id="1y">
        <label id="lblRadio" class="btn btn-light" for="1y">1y</label>
        <input type="radio" name="options" value="5y" class="btn-check" id="5y">
        <label id="lblRadio" class="btn btn-light" for="5y">5y</label>
    </div>
</div>

<div id="infoContainer" class="container ">


</div>
</div>


<footer class="bg-light">
    <div class="container text-center">
        <p class="font-italic text-muted mb-0">&copy; Copyrights MINDBASE All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="../assets/js/MainJS.js"></script

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="../controller/Crypto.js"></script>

</body>
</html>