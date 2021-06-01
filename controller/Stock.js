var api = "HR1M5UX0TOMLN5MP";
var dps = [];
var company = null;
var symbol = null;
var chart = null;
var description = null;
var columns = [
    "Date",
    "Open",
    "High",
    "Low",
    "Close",
    "Adjusted Close",
    "Volume",
];
var data1 = [];

function download() {
    window.location =
        "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=" +
        symbol +
        "&apikey=" +
        api +
        "&datatype=csv";
}

function getData() {
    if (company !== null) {
        $.getJSON(
            "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=" +
            symbol +
            "&outputsize=full&apikey=" +
            api
        ).done(function (data) {
            var date = data["Time Series (Daily)"];
            let a = 20;
            let b = 7;
            for (var d in date) {
                var r = d.split("-");
                if (a-- > 0) {
                    var value = date[d];
                    dps.unshift({
                        x: new Date(parseInt(r[0]), parseInt(r[1]) - 1, parseInt(r[2])),
                        y: parseFloat(value["1. open"]),
                    });
                    if (b-- > 0) {
                        let c = [
                            d,
                            value["1. open"],
                            value["2. high"],
                            value["3. low"],
                            value["4. close"],
                            value["5. adjusted close"],
                            value["6. volume"],
                        ];
                        data1.push(c);
                    }
                } else {
                    break;
                }
            }
            graph();
            fetch(`https://www.alphavantage.co/query?function=OVERVIEW&apikey=${api}&symbol=${symbol}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    var description = `<p>${data.Description}</p>`;
                    var title = `<h1 class="mb-4">About this company:  </h1>`;
                    $("#infoContainer").append(title);
                    $("#infoContainer").append(description);
                });
            document.getElementById("loading_container").style.display = "none";
            document.getElementById("compania").innerHTML = symbol;
            document.getElementById("download_data").style.display = "block";
        });
    }
}

function graph() {
    chart = new CanvasJS.Chart("chartContainer", {
        backgroundColor: "transparent",
        animationEnabled: true,
        theme: "dark",
        axisY: {
            title: "Open Prices",
            titleFontColor: "#666666",
            labelFontColor: "#666666"
        },
        axisX: {
            title: "Date",
            titleFontColor: "#666666",
            valueFormatString: "DD-MMM",
            labelFontColor: "#666666"
        },
        data: [
            {
                type: "line",
                color: "#5d66d8",
                indexLabelFontSize: 16,
                dataPoints: dps,
            },
        ],
    });
    chart.options.data[0].dataPoints = dps;
    chart.canvas.parentNode.style.height = '400px';

    chart.render();
}

function Data() {
    if (chart !== null) {
        chart.destroy();
        $("#infoContainer").empty();
    }
    data1 = [];
    dps = [];
    document.getElementById("table_container").innerHTML = "";
    company = document.getElementById("companies").value;
    let r = company.split("(");
    symbol = r[1].substring(0, r[1].length - 1);
    document.getElementById("loading_container").style.display = "block";

    document.getElementById("chartContainer").disabled = true;
    getData();
}

