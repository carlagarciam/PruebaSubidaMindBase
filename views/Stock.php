<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://image.flaticon.com/icons/png/512/178/178158.png" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/MainCSS.css">

    <title>Stock</title>

</head>

<body onload="Data()">
<div class="container">
    <?php
    include("Header.php");
    ?>

</div>


<div class="container">
    <div id="conSelector" class="justify-content-center ">
        <img src="https://image.flaticon.com/icons/png/512/4216/4216390.png" width="100" height="100" class="d-inline-block " alt="">
            <div class="col-1"> </div>
        <h1 class="display-4 mb-4 mx-auto reveal-text newsLetter col-9" id="compania">STOCKS</h1>
        <div class="text-center">

            <div id="company_container">
                <select id="companies" class="custom-select custom-select-lg mb-3" name="companies" onchange="Data()">
                    <option value="Apple Inc(AAPL)">Apple</option>
                    <option value="Microsoft Corp(MSFT)">Microsoft</option>
                    <option value="International Business Machine(IBM)">IBM</option>
                    <option value="NVIDIA(NVDA)">NVIDIA</option>
                    <option value="AMAZON(AMZN)">Amazon</option>
                    <option value="Tesla(TSLA)">Tesla</option>
                    <option value="Google(GOOG)">Google</option>
                    <option value="Facebook(FB)">Facebook</option>
                    <option value="Toyota Motor(TM)">Toyota</option>
                    <option value="DELL INC(DELL)">DELL</option>
                </select>
            </div>
        </div>
        <hr class="my-4">

    </div>
    <div id="loading_container">
        <h6 style="margin-left: 11%">Loading data.....</h6>
        <progress></progress>
    </div>

    <div id="containerChart" class="row">
        <div class="col-12" id="chartContainer"></div>
    </div>
    <div id="infoContainer" class="container ">


    </div>
    <div id="table_container"></div>
</div>

<footer class="bg-light">
    <div class="container text-center">
        <p class="font-italic text-muted mb-0">&copy; Copyrights MINDBASE All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../assets/js/MainJS.js">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="../controller/Stock.js"></script>

</body>

</html>