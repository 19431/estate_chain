
// monthly chart of resource consumption
var data = [],
    totalPoints = 300;

function getRandomData() {
    if (data.length > 0) data = data.slice(1);
    // Do a random walk
    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;
        if (y < 0) {
            y = 0;
        } else if (y > 100) {
            y = 100;
        }
        data.push(y);
    }
    // Zip the generated y values with the x values
    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
    }
    return res;
}
// Set up the control widget
var updateInterval = 30;
$("#updateInterval").val(updateInterval).change(function() {
    var v = $(this).val();
    if (v && !isNaN(+v)) {
        updateInterval = +v;
        if (updateInterval < 1) {
            updateInterval = 1;
        } else if (updateInterval > 3000) {
            updateInterval = 3000;
        }
        $(this).val("" + updateInterval);
    }
});
var plot = $.plot("#placeholder", [getRandomData()], {
    series: {
        shadowSize: 0 // Drawing is faster without shadows
    },
    yaxis: {
        min: 0,
        max: 100
    },
    xaxis: {
        show: false
    },
    colors: ["#55ce63"],
    grid: {
        color: "#AFAFAF",
        hoverable: true,
        borderWidth: 0,
        backgroundColor: '#FFF'
    },
    tooltip: true,
    tooltipOpts: {
        content: "Y: %y",
        defaultTheme: false
    }
});

function update() {
    plot.setData([getRandomData()]);
    // Since the axes don't change, we don't need to call plot.setupGrid()
    plot.draw();
    setTimeout(update, updateInterval);
}
update();
//Flot Line Chart
$(document).ready(function() {
    console.log("document ready");
    var offset = 0;
    plot();

    function plot() {
        var sin = [],
            cos = [];
        for (var i = 1; i < 12; i += 1) {
            sin.push([i, Math.random(i + 2)]);
            //cos.push([i, Math.random(i + 2)]);
        }
        var options = {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            grid: {
                hoverable: true //IMPORTANT! this is needed for tooltip to work
            },
            yaxis: {
                min: 0,
                max: 2
            },
            colors: ["#009efb", "#ff0401"],
            grid: {
                color: "#AFAFAF",
                hoverable: true,
                borderWidth: 0,
                backgroundColor: '#FFF'
            },
            tooltip: true,
            tooltipOpts: {
                content: "'%s' of month %x is %y",
                shifts: {
                    x: 26,
                    y: 1
                }
            }
        };
        var plotObj = $.plot($("#flot-line-chart"), [{
            data: sin,
            label: "water consumption",
        }, {
            data: cos,
            //label: "Electricity consumption"
        }], options);
    }
});
