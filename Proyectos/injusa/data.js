function EnviarPeriodo(date_range){
 
    var y_values_temp = [];
    var y_values_hum = [];
    var y_values_pres = [];
    var y_values_ilu = [];
    var x_values = [];
    var switch1 = true;
    var switchCons = true;
    var switchWorkMode = false;
    var switchCicles = false;
    var switchIlum = false;



// recogemos todos los datos.
    $.post('values.php', {'periodo': date_range}, function (data) {

        data = data.split('/');
        for (var i in data)
        {
            if (switch1 == true)
            {
                var ts = timeConverter(data[i]);
                x_values.push(ts);
                switch1 = false;
            }
            else
            {
				if (switchCons == true)
				{
					y_values_temp.push(parseFloat(data[i]));
					switchCons = false;
					switchWorkMode = true;
				}
				else if (switchWorkMode == true)
				{
					y_values_hum.push(parseFloat(data[i]));
					switchWorkMode = false;
					switchCicles = true;
				}
				else if (switchCicles == true)
				{
					y_values_pres.push(parseFloat(data[i]));
					switchCicles = false;
					//switchIlum = true;
				}
				/*else if (switchIlum == true)
				{
					y_values_ilu.push(parseFloat(data[i]));
					switchIlum = false;
					switchCons = true;
					switch1 = true;
				}*/

            }
 
        }
        x_values.pop();

       // Pintamos los datos de temperatura.
        $('#chartCons').highcharts({
            chart : {
	        animation: Highcharts.svg,
                type : 'line'
            },
            title : {
                text : 'Datos consumos'
            },
            subtitle : {
                text : 'Source: Medición consumos'
            },
            xAxis : {
                title : {
		    text : 'Tiempo'
                },
                categories : x_values
            },
            yAxis : {
                title : {
                    text : 'Kilowatios'
                },
                labels : {
                    formatter : function() {
                        return this.value + ' KW'
                    }
                }
            },
            tooltip : {
                crosshairs : true,
                shared : true,
                valueSuffix : ''
            },
            plotOptions : {
                line : {
                    marker : {
                        lineColor : '#666666',
                        lineWidth : 1
                    }
                }
            },
            series : [{
 
                name : 'Consum',
                data : y_values_temp
            }]
        });



	// pintamos los datos humedad relativa
        $('#chartWorkMode').highcharts({ 
            chart : {
                type : 'line' 
            }, 
            title : {
                text : 'Datos modo de trabajo' 
            },
            subtitle : { 
                text : 'Source: Modos de trabajo / tiempo' 
            },
             xAxis : {
                title : {
                    text : 'Tiempo'
                },
                categories : x_values
            },
            yAxis : {
                title : {
                    text : 'Modos de trabajo'
                },
                labels : {
                    formatter : function() {
                        return this.value + ' 1 - Apagada, 2 - Manual, 3 - Automatica'
                    }
                }
            },
            tooltip : {
                crosshairs : true,
                shared : true,
                valueSuffix : ''
            },
            plotOptions : {
                line : {
                    marker : {
                        lineColor : '#00FF00',
                        lineWidth : 1
                    }
                }
            },
            series : [{
                name : 'Modo de funcionamiento',
                data : y_values_hum
            }]
		});


	// pintamos los datos presion
        $('#chartCicles').highcharts({ 
            chart : {
                type : 'line' 
            }, 
            title : {
                text : 'Ciclos de trabajo' 
            },
            subtitle : { 
                text : 'Source: ciclos de trabajo / tiempo' 
            },
             xAxis : {
                title : {
                    text : 'Tiempo'
                },
                categories : x_values
            },
            yAxis : {
                title : {
                    text : 'Ciclos'
                },
                labels : {
                    formatter : function() {
                        return this.value + ' ciclos/hora'
                    }
                }
            },
            tooltip : {
                crosshairs : true,
                shared : true,
                valueSuffix : ''
            },
            plotOptions : {
                line : {
                    marker : {
                        lineColor : '#FE2E64',
                        lineWidth : 1
                    }
                }
            },
            series : [{
                name : 'Ciclos de trabajo',
                data : y_values_pres
            }]
		});

			/* pintamos los datos iluminacion
        $('#chartIlu').highcharts({ 
            chart : {
                type : 'line' 
            }, 
            title : {
                text : 'Datos iluminacion' 
            },
            subtitle : { 
                text : 'Source: Estacion meteorologica privada' 
            },
             xAxis : {
                title : {
                    text : 'Tiempo'
                },
                categories : x_values
            },
            yAxis : {
                title : {
                    text : 'Iluminacion'
                },
                labels : {
                    formatter : function() {
                        return this.value + ' %'
                    }
                }
            },
            tooltip : {
                crosshairs : true,
                shared : true,
                valueSuffix : ''
            },
            plotOptions : {
                line : {
                    marker : {
                        lineColor : '##FFFF00',
                        lineWidth : 1
                    }
                }
            },
            series : [{
                name : 'Iluminacion',
                data : y_values_ilu
            }]
		});*/
	});
}

function timeConverter(fecha){
  var a = new Date(fecha);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes() < 10 ? '0' + a.getMinutes() : a.getMinutes();
  var sec = a.getSeconds() < 10 ? '0' + a.getSeconds() : a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min ;
  return time;
}
