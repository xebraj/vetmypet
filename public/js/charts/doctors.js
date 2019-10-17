const chart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Medicos más activos'
    },
    xAxis: {
        categories: [],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Citas atendidas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },

    series: []
});

let $start, $end;

function fetchData() {
    const startDate = $start.val();
    const endDate = $end.val();

    // Fetch aPI
    const url = `/charts/doctors/column/data?start=${startDate}&end=${endDate}`;
    fetch(url)
        .then(response => response.json())
        .then(myJson => {
            // console.log(myJson);
            chart.xAxis[0].setCategories(myJson.categories);

            if (chart.series.length > 0) {
                chart.series[1].remove();
                chart.series[0].remove();

            }
            chart.addSeries(myJson.series[0]);
            chart.addSeries(myJson.series[1]);
        });
}

$(function() {
    $start = $('#startDate');
    $end = $('#endDate');

    fetchData();

    $start.change(fetchData);
    $end.change(fetchData);
});