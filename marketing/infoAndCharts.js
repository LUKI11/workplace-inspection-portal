// ----------------- pie chart field --------------------
// start drawing chart
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
    // console.log(data);   

    var jsonData = $.ajax({
        url: "conn/getAge.php",
        dataType: "json",
        async: false
    });

    // parsing
    jsonData = jQuery.parseJSON(jsonData.responseText);
    var values_ = new Array(['Age', 'Clicks']);
    var c = 0;

    // iterate through all json row
    while (c < Object.keys(jsonData).length) {
        values_.push([
            jsonData[c].age,
            parseInt(jsonData[c].count)
        ]);
        c++;
    };

    console.log(values_);

    var gdata = google.visualization.arrayToDataTable(values_);
    var options = {
        title: 'Submition analysis by age'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(gdata, options);
}


// ----------------- Line chart field --------------------
google.charts.load('current', {
    packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
    var jsonData = $.ajax({
        url: "conn/getTimeClick.php",
        dataType: "json",
        async: false
    });

    // parsing
    jsonData = jQuery.parseJSON(jsonData.responseText);
    var clicks = new Array();
    var gdata = new google.visualization.DataTable();
    gdata.addColumn('string', 'X');
    gdata.addColumn('number', 'clicks');
    var day = 0;

    
    while (day < Object.keys(jsonData).length) {
        clicks.push([
            jsonData[day].date, 
            parseInt(jsonData[day].clicks)
        ]);
        day++;
    }

    console.log(clicks);
    // clicks = [[0,value1],[0,value2]..]
    gdata.addRows(clicks);
    var options = {
        hAxis: {
            title: 'Date'
        },
        vAxis: {
            title: 'Popularity'
        },
        series: {
            1: {
                curveType: 'function'
            }
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(gdata, options);
}

// ----------------- Customer Info field --------------------
$.ajax({
    // Show user summery
    url: "conn/getStats.php",
    dataType: "json",
    success: function (data, textStatus, jqXHR) {
        // console.log(data);            
        var len = data.length;
        var txt = "";

        // --- Customer Info ---
        for (var i = 0; i < len; i++) {
            if (data[i].name) {
                txt += "<tr><td>" +
                    data[i].name + "</td><td>" +
                    data[i].gender + "</td><td>" +
                    data[i].age + "</td><td>" +
                    data[i].occ + "</td><td>" +
                    data[i].cmt + "</td></tr>";
            }
        }

        // append txt if it is not empty after fetching
        if (txt != "") {
            $("#infoTable").append(txt);
        }

    },
    error: function (jqXHR, textStatus, errorThrown) {
        //alert('error: ' + textStatus + ': ' + errorThrown);
    }

    // show linechart

});
