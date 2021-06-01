<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns:http="http://www.w3.org/1999/xhtml">
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


    <title>News </title>
</head>
<body>
<div class="container">
    <?php
    include("Header.php");
    $url2 = 'https://newsapi.org/v2/everything?q=Ethereum&apiKey=8f0e94f188f24cdead1fe4972819c008';
    $response2 = file_get_contents($url2);
    $NewsData2 = json_decode($response2);
    ?>
</div>
<div class="container ">
    <!-- COMIENZO CAROUSELL -->
    <div id="carouselExampleControls" class="row">
        <div class="slider-container">
            <div class="left-slide">
                <?php foreach ($NewsData2->articles as $News): ?>
                    <div>
                        <h1><?php echo $News->title ?></h1>
                        <p><?php echo $News->description ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="right-slide"
            ">
            <?php foreach ($NewsData2->articles as $News): ?>
                <div style=" background: url(<?php echo $News->urlToImage ?>); "></div>
            <?php endforeach; ?>
        </div>

        <div class="action-buttons">
            <button id="btnCarousel" class="up-button">
                <i id="arrowIcon" class="fa fa-chevron-up"></i>
            </button>
            <button id="btnCarousel" class="down-button">
                <i id="arrowIcon" class="fa fa-chevron-down"></i>
            </button>

        </div>
    </div>
    <!-- FIN CAROUSELLLL -->
</div>

<div class="row" style=" justify-content: center; margin-top: 100px;">
    <form class="btn-group" name="input" method="post">
        <label value="stock"class="btn-group__item">
            <input id="radioBtnNews" type="radio" name="form" value="Cryptocurrency" onchange="this.form.submit()"/>Crypto</label>
        <label value="stock"class="btn-group__item">
            <input id="radioBtnNews" type="radio" name="form" value="stock" onchange="this.form.submit()"/>Stock</label>
        <label value="nft" class="btn-group__item">
            <input id="radioBtnNews" type="radio"  name="form" value="Nft" onchange="this.form.submit()"/> Nft</label>
        <label value="blockchain" class="btn-group__item">
            <input id="radioBtnNews" type="radio" name="form" value="Blockchain" onchange="this.form.submit()" /> Blockchain</label>
        <label value="new-Projects" class="btn-group__item">
            <input id="radioBtnNews" type="radio"  name="form" value="new" onchange="this.form.submit()" />  New Projects</label>
    </form>
</div>





<?php
if (isset($_POST["form"])) {
    $info = $_POST["form"];
} else {
    $info = "crypto";
}
$url = 'https://newsapi.org/v2/everything?q=' . $info . '&apiKey=8f0e94f188f24cdead1fe4972819c008';
$response = file_get_contents($url);
$NewsData = json_decode($response);
?>

<div id="cardsNews" class="cards">
    <?php foreach ($NewsData->articles as $Newss): ?>
        <div class="card">
            <div class="card__image-holder">
                <img class="card__image" src="<?php echo $Newss->urlToImage ?>" alt="wave"/>
            </div>
            <div class="card-title">
                <a href="#" class="toggle-info btn">
                    <span class="left"></span>
                    <span class="right"></span>
                </a>
                <h2><small><?php echo $Newss->title ?></small>
                </h2>
            </div>
            <div class="card-flap flap1">
                <div class="card-description text-muted"> <?php echo $Newss->description ?> </div>
                <div class="card-flap flap2">
                    <div class="card-actions">
                        <a onclick=" window.open('<?php echo $Newss->url ?>','_blank')" class="btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<footer class="bg-light">
    <div class="container text-center">
        <p class="font-italic text-muted mb-0">&copy; Copyrights MINDBASE All rights reserved.</p>
    </div>
</footer>

<script>
    //MANEJO DE CARDS DESPLEGABLES
    $(document).ready(function () {
        var zindex = 10;
        $("div.card").click(function (e) {
            e.preventDefault();
            var isShowing = false;

            if ($(this).hasClass("show")) {
                isShowing = true
            }
            if ($("div.cards").hasClass("showing")) {
                $("div.card.show")
                    .removeClass("show");
                if (isShowing) {
                    $("div.cards")
                        .removeClass("showing");
                } else {
                    $(this)
                        .css({zIndex: zindex})
                        .addClass("show");
                }
                zindex++;
            } else {
                $("div.cards")
                    .addClass("showing");
                $(this)
                    .css({zIndex: zindex})
                    .addClass("show");
                zindex++;
            }
        });
    });


    const sliderContainer = document.querySelector('.slider-container')
    const slideRight = document.querySelector('.right-slide')
    const slideLeft = document.querySelector('.left-slide')
    const upButton = document.querySelector('.up-button')
    const downButton = document.querySelector('.down-button')
    const slidesLength = slideRight.querySelectorAll('div').length
    let activeSlideIndex = 0
    slideLeft.style.top = `-${(slidesLength - 1) * 100}vh`
    upButton.addEventListener('click', () => changeSlide('up'))
    downButton.addEventListener('click', () => changeSlide('down'))
    const changeSlide = (direction) => {
        const sliderHeight = sliderContainer.clientHeight
        if (direction === 'up') {
            activeSlideIndex++
            if (activeSlideIndex > slidesLength - 1) {
                activeSlideIndex = 0
            }
        } else if (direction === 'down') {
            activeSlideIndex--
            if (activeSlideIndex < 0) {
                activeSlideIndex = slidesLength - 1
            }
        }
        slideRight.style.transform = `translateY(-${
            activeSlideIndex * sliderHeight
        }px)`
        slideLeft.style.transform = `translateY(${activeSlideIndex * sliderHeight}px)`
    }

</script>
<script src="https://use.fontawesome.com/805fd44b27.js"></script>
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
</body>
</html>