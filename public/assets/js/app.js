/**
 * TODO
 */

var APP = new function() {
    this.data = APP_DATA;

    this.init = function() {
        this.render();
    };

    this.dotsToObj = function(obj, is, value) {
        if (typeof is == 'string')
            return this.dotsToObj(obj,is.split('.'), value);
        else if (is.length==1 && value!==undefined)
            return obj[is[0]] = value;
        else if (is.length==0)
            return obj;
        else
            return this.dotsToObj(obj[is[0]],is.slice(1), value);
    };

    this.render = function() {
        var self = this;

        $('.chart').each(function(i, el) {
            self.renderChartFromElement($(el));
        });
    };

    this.renderChartFromElement = function(el) {
        var dataPath      = el.data('provider');
        var labelsPath    = el.data('labels');
        var labelProp     = el.data('label-prop');
        var valueProp     = el.data('value-prop');
        var datasetsLabel = el.data('datasets-label');
        var maxValue      = el.data('max-value') || 10;
        var chartType     = el.data('chart-type') || 'bar';
        var elementId     = el.attr('id');
        var dataset       = this.dotsToObj(this.data, dataPath);
        var labels        = this.dotsToObj(this.data, labelsPath);

        var extractedData = this.extracChartData(dataset, labelProp, valueProp);

        var props = {
            datasetsLabel: datasetsLabel,
            maxValue: maxValue
        };

        if(chartType == 'bar') {
            this.renderBarChart(elementId, extractedData, props);
        } else if(chartType == 'line') {
            this.renderLineChart(elementId, extractedData, props);
        } else if(chartType == 'stacked') {
            this.renderStackedLineChart(elementId, extractedData, labels);
        }
    };

    this.extracChartData = function(dataSource, labelProperty, valueProperty) {
        var labels = [];
        var values = [];
        var colors = [];
        var min = undefined;
        var max = undefined;

        if(!labelProperty || !valueProperty) {
            return dataSource;
        }

        for(var d in dataSource) {
            var info = dataSource[d];

            labels.push(info[labelProperty]);
            values.push(info[valueProperty]);
            colors.push('#696ffb');

            if(min === undefined || info[valueProperty] < min) {
                min = info[valueProperty];
            }

            if(max === undefined || info[valueProperty] > max) {
                max = info[valueProperty];
            }
        }

        return {
            labels: labels,
            values: values,
            colors: colors,
            minValue: min,
            maxValue: max
        };
    };

    this.renderBarChart = function(elementId, data, props) {
        var e = document.getElementById(elementId);

        new Chart(e, {
            type: "bar",
            data: {
                labels: data.labels,
                datasets: [{
                    label: props.datasetsLabel,
                    data: data.values,
                    backgroundColor: data.colors,
                    borderColor: chartColors[0],
                    borderWidth: 0
                }]
            },
            options: {
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                scales: {
                    responsive: !0,
                    maintainAspectRatio: !0,
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: "rgba(0, 0, 0, 0.03)",
                            drawBorder: false
                        },
                        ticks: {
                            min: props.minValue || 0,
                            max: props.maxValue || 10,
                            stepSize: 1,
                            fontColor: "#212529",
                            maxTicksLimit: 2,
                            /*callback: function (a, e, r) {
                                return a + " K"
                            },*/
                            padding: 10
                        }
                    }],
                    xAxes: [{
                        display: true,
                        barPercentage: .3,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                legend: {
                    display: !1
                }
            }
        });
    };

    this.renderLineChart = function(elementId, data, datasetsLabel) {
        var e = document.getElementById(elementId);

        var config = {
			type: 'line',
			data: {
				labels: data.labels,
				datasets: [{
					backgroundColor: window.chartColors.red,
					borderColor: '#696ffb',
                    data: data.values,
                    steppedLine: true,
					fill: true,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'Chart.js Line Chart'
                },
                legend: {
                    display: false
                },
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Período'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: false,
							labelString: 'Valor'
                        },
                        ticks: {
                            min: 0,
                            max: 20,
                            stepSize: 2,
                            fontColor: "#212529",
                            maxTicksLimit: 3,
                            /*callback: function (a, e, r) {
                                return a + " K"
                            },*/
                            padding: 10
                        }
					}]
				}
			}
		};

        var c = new Chart(e, config);
    };

    this.renderStackedLineChart = function(elementId, data, labels) {
        var e = document.getElementById(elementId);
        var i = 0;
        var datasets = [];        
        var colors = [
            '#4BC0C0',
            '#36A2EB',
            '#FF6384',
            '#FFCD56',
            '#a0a0a0',
        ];

        for(var p in data) {
            datasets.push({
                label: p,
                borderColor: colors[i],
                backgroundColor: colors[i],
                data: data[p].map(function(value) {
                    if(p != "APROVADO") {
                        return -value;
                    }
                    return value;
                })
            });
            i++;
        }

        var config = {
			type: 'line',
			data: {
				labels: labels,
				datasets: datasets
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'Chart.js Line Chart'
                },
                legend: {
                    display: false
                },
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Período'
						}
					}],
					yAxes: [{
                        stacked: true,
						scaleLabel: {
							display: true,
							labelString: 'Portentagem'
                        },
					}]
				}
			}
		};

        var c = new Chart(e, config);
    };
};

$(function() {
    APP.init();
});