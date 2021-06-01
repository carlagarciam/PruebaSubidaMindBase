$(document).ready(function () {
    //codigos cryptos
    'use strict';
    const bitcoin = "Qwsogvtv82FCd";
    const ethereum = "razxDUgYGNAdQ";
    const litecoin = "D7B1x_ks7WhV5";
    const cardano = "qzawljRxB5bYu";
    const dogecoin = "a91GCGd_u96cF";
    const binance = "WcwrkfNI4FUAe";
    const xrp = "-l8Mn2pVlRs-p";
    const uniswap = "_H5FVG9iW";
    const polkadot = "25W7FG7om";
    const tether = "HIVsRcGKkPFtW";
    const hex = "9K7m6ufraZ6gh";
    // Lo primero que aparecera
    var idCrypto = bitcoin;
    var timeCrypto = "24h";
    let cryptoGraph;
    getCoinData(idCrypto, timeCrypto);

    function getCoinData(currency, timeframe) {
        var baseUrl = "https://api.coinranking.com/v2/coin/" + currency + "?timePeriod=" + timeframe;
        var proxyUrl = "https://cors.bridged.cc/";
        var apiKey = "coinrankinge0ea87f09b7d9a2146ea295891b926624d1b277145de3615"
        $(`#${timeframe}`).prop("checked", true).css("border", "4px solid green");
        fetch(`${proxyUrl}${baseUrl}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'x-access-token': `${apiKey}`,
                'Access-Control-Allow-Origin': "*"
            }
        })
            .then((response) => {
                if (response.ok) {
                    response.json().then((json) => {
                        handlerFunction(json.data);
                    })
                }
            })
    }

    function handlerFunction(data) {
        if (cryptoGraph) {
            //borramos la tabla para volverla a mostrar
            cryptoGraph.destroy();
            $("#precioActual").empty();
            $("img").attr("src", "#");
            $("#cambio").empty();
            $("#infoContainer").empty();
        }
        let dataC = data.coin;
        // nombre icono junto su moneda
        var price = Math.round((parseFloat(dataC.price) + Number.EPSILON) * 100) / 100;
        $("#currency").text(dataC.name);
        $("img").attr("src", dataC.iconUrl);
        $("#precioActual").text(price);


        // Añadir porcentaje cada tiempo
        var cambioP = Math.round((parseFloat(dataC.change) + Number.EPSILON) * 100) / 100;
        $("#percentChange").text(cambioP)
        if (cambioP > 0) { //verde si es positivo rojo si es negativo
            $("#percentChange").css("color", "green !important").prepend("+").append("%");
        } else {
            $("#percentChange").css("color", "red !important").append("%");
        }
        var description = `<p>${dataC.description}</p>`;
        var title = `<h1 class="mb-4">About this Crypto:  </h1>`;
        $("#infoContainer").append(title);
        $("#infoContainer").append(description);

        // Grafica
        var ctx = document.getElementById('cryptoGraph')
        cryptoGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
                datasets: [{
                    data: dataC.sparkline,
                    label: dataC.symbol,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: dataC.color,
                    borderWidth: 4,
                    pointBackgroundColor: dataC.color,
                },
                ]
            },
        })
    }

    //Selector Crypto
    $('#cryptoSelector').change(function () {
        var selectedValueCurrency = parseInt($(this).val());
        switch (selectedValueCurrency) {
            case 0:
                console.log("radio BTC success");
                idCrypto = bitcoin;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 1:
                console.log("radio ETH success");
                idCrypto = ethereum;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 2:
                console.log("radio LTC success");
                idCrypto = litecoin;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 3:
                console.log("radio ADA success");
                idCrypto = cardano;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 4:
                console.log("radio DOGE success");
                idCrypto = dogecoin;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 5:
                console.log("radio BNB success");
                idCrypto = binance;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 6:
                console.log("radio XRP success");
                idCrypto = xrp;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 7:
                console.log("radio UNI success");
                idCrypto = uniswap;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 8:
                console.log("radio DOT success");
                idCrypto = polkadot;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 9:
                console.log("radio USDT success");
                idCrypto = tether;
                getCoinData(idCrypto, timeCrypto);
                break;
            case 10:
                console.log("radio HEX success");
                idCrypto = hex;
                getCoinData(idCrypto, timeCrypto);
        }
    });
    // Tiempo selector
    $('input:radio[name=options]').on("click", function () {
        if (timeCrypto != $("input[name=options]:checked").val()) {
            timeCrypto = $("input[name=options]:checked").val();
            getCoinData(idCrypto, timeCrypto);
        }
    })
})


