Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 70,
            depth: 30,
            size: '200',
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.percentage:.1f} %',
                distance: 4
            },
             showInLegend: true
        }
    },
    series: [{
        name: 'Delivered amount',
        showInLegend: false,
        data: [{
        	name: 'Unmatched',
        	y: 88,
        	color: '#7cb5ec',
        },
        {
        	name: 'Matched',
        	y: 11,
        	color: '#f88722',
        }]
    }],
    navigation: {
        buttonOptions: {
            enabled: false
        }
    },
    credits: {
      enabled: false
    },
});

Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 70,
            depth: 30,
            size: '200',
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.percentage:.1f} %',
                distance: 4
            },
             showInLegend: true
        }
    },
    series: [{
        name: 'Delivered amount',
        showInLegend: false,
        data: [{
        	name: 'Unmatched',
        	y: 88,
        	color: '#7cb5ec',
        },
        {
        	name: 'Matched',
        	y: 11,
        	color: '#f88722',
        }]
    }],
    navigation: {
        buttonOptions: {
            enabled: false
        }
    },
    credits: {
      enabled: false
    },
});

Highcharts.chart('container3', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: ''
    },
    credits: {
      enabled: false
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 70,
            depth: 30,
            size: '200',
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.percentage:.1f} %',
                distance: 4
            },
             showInLegend: true
        }
    },
    series: [{
        name: 'Delivered amount',
        showInLegend: false,
        data: [{
        	name: 'Unmatched',
        	y: 88,
        	color: '#7cb5ec',
        },
        {
        	name: 'Matched',
        	y: 11,
        	color: '#f88722',
        }]
    }],
    navigation: {
        buttonOptions: {
            enabled: false
        }
    }
});