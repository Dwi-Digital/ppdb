"use strict";


// Data untuk donut chart
var donutData = {
    series: [laki, perempuan],
    labels: ['Laki-laki', 'Perempuan']
};

// Opsi konfigurasi untuk donut chart
var donutOptions = {
    chart: {
        type: 'donut',
        height: 350,
        toolbar: {
            show: true,
            offsetX: 0,
            offsetY: 0,
            tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true
            },
            autoSelected: 'zoom'
        }
    },
    labels: donutData.labels,
    series: donutData.series,
    dataLabels: {
        enabled: true,
        formatter: function(val) {
            return val + "%";
        }
    },
    plotOptions: {
        pie: {
            donut: {
                size: '70%',
            }
        }
    },
    legend: {
        position: 'bottom'
    },
    colors: [config.colors.primary, config.colors.danger], // Ubah warna disini
};

// Inisialisasi donut chart
var donutChart = new ApexCharts(document.querySelector("#donutChart"), donutOptions);

// Render donut chart
donutChart.render();
