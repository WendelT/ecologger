//var url;

      function dayBeforeThisDay(day){
          var dayX = day + ' 00:00:00';
          var date = new Date(dayX);
          var dayBefore = date.setDate(date.getDate()-1);
          dayBefore = new Date(dayBefore);
          dayBefore = new Date(dayBefore.getTime() - (dayBefore.getTimezoneOffset() * 60000 ))
          .toISOString()
          .split("T")[0];
          return dayBefore;
      }

      function todaysDate(){
        var todayDate = new Date(); //seleciona a data
        todayDate = new Date(todayDate.getTime() - (todayDate.getTimezoneOffset() * 60000 ))
          .toISOString()
          .split("T")[0];
          return todayDate;
      }

      function firstDayOfTheWeek(){
        var todayDate = new Date();
        var todayDay = todayDate.getDate(); //returns the day of the month
        var dayOfWeek = todayDate.getDay(); //get the day of the week (sunday is 0 and monday is 6)
        var firstDayThisWeek = todayDate.setDate(todayDay - dayOfWeek);
        firstDayThisWeek = new Date(firstDayThisWeek);

        //get rid of timezone differences 
        firstDayThisWeek = new Date(firstDayThisWeek.getTime() - (firstDayThisWeek.getTimezoneOffset() * 60000 ))
          .toISOString()
          .split("T")[0]; 

        return firstDayThisWeek;
      }

      function lastDayOfTheWeek(){
        var todayDate = new Date();
        var todayDay = todayDate.getDate(); //returns the day of the month
        var dayOfWeek = todayDate.getDay(); //get the day of the week (sunday is 0 and monday is 6)
        var lastDayThisWeek = todayDate.setDate(todayDay - dayOfWeek + 6);
        lastDayThisWeek = new Date(lastDayThisWeek);

        //get rid of timezone differences 
        lastDayThisWeek = new Date(lastDayThisWeek.getTime() - (lastDayThisWeek.getTimezoneOffset() * 60000 ))
          .toISOString()
          .split("T")[0]; 
        console.log(lastDayThisWeek);
        return lastDayThisWeek;
      }

      function firstDayOfTheMonth(){
        var todayDate = new Date();
        var firstDay = new Date(todayDate.getFullYear(), todayDate.getMonth(),1);
        firstDay = new Date(firstDay.getTime() - (firstDay.getTimezoneOffset()*6000))
          .toISOString()
          .split("T")[0];

        return firstDay;
      }

      function lastDayOfTheMonth(){
        var todayDate = new Date();
        var lastDay = new Date(todayDate.getFullYear(), todayDate.getMonth() + 1, 0);
        lastDay = new Date(lastDay.getTime() - (lastDay.getTimezoneOffset()*6000))
          .toISOString()
          .split("T")[0];

        return lastDay;
      }

      function firstDayOfTheYear(){
        var today = new Date();
        var firstDay = new Date(today.getFullYear(),0,1);
        firstDay = new Date(firstDay.getTime() - (firstDay.getTimezoneOffset()*6000))
          .toISOString()
          .split("T")[0];

        return firstDay;
      }

      function lastDayOfTheYear(){
        var today = new Date();
        var lastDay = new Date(today.getFullYear(),11,31);
        lastDay = new Date(lastDay.getTime() - (lastDay.getTimezoneOffset()*6000))
          .toISOString()
          .split("T")[0];

        return lastDay;
      }

      

      function savedata() { 
            var client = document.getElementById("url1");
            var pos = document.getElementById("variablePosition"); //posição da variável na string de dados
            var type = pos.value; //tipo de gráfico
            sessionStorage.setItem("variableType", type);
            
            switch(pos!=null){
              case pos.value == "dailyTotalEnergy":
                
                var todayDate = todaysDate();
                var yesterdayDate = dayBeforeThisDay(todaysDate());
                console.log(todayDate);
                console.log(yesterdayDate);
                sessionStorage.setItem("today", todayDate);
                sessionStorage.setItem("yesterday", yesterdayDate);
                sessionStorage.setItem("variablePosition", 8);


                var urlString = "type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") 
                + "&date1=" + sessionStorage.getItem("yesterday") + "&date2=" + sessionStorage.getItem("today");
                sessionStorage.setItem("urlString", urlString);
                break;

              case pos.value == "weeklyTotalEnergy": //energia semanal
                
                //var firstDayWeek = firstDayOfTheWeek(); //primeiro dia da semana (domingo)
                var firstDay = dayBeforeThisDay(firstDayOfTheWeek());
                var lastDayWeek = lastDayOfTheWeek(); //último dia da semana (sábado)

                console.log(firstDay);
                console.log(lastDayWeek);
                sessionStorage.setItem("firstDay", firstDay);
                sessionStorage.setItem("lastDay", lastDayWeek);
                sessionStorage.setItem("variablePosition", 8);

                var urlString = "type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") 
                + "&date1=" + sessionStorage.getItem("firstDay") + "&date2=" + sessionStorage.getItem("lastDay");
                sessionStorage.setItem("urlString", urlString);

                break;

              case pos.value == "monthlyTotalEnergy":
                //var firstDayMonth = firstDayOfTheMonth(); //primeiro dia do mês
                var firstDay = dayBeforeThisDay(firstDayOfTheMonth()); // pega o dia antes do primeiro dia do mês
                var lastDayMonth = lastDayOfTheMonth(); //último dia do mês
                sessionStorage.setItem("firstDay", firstDay);
                sessionStorage.setItem("lastDay", lastDayMonth);
                sessionStorage.setItem("variablePosition", 8);

                console.log(firstDay);
                console.log(lastDayMonth);
                
                var urlString = "type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") 
                + "&date1=" + sessionStorage.getItem("firstDay") + "&date2=" + sessionStorage.getItem("lastDay");
                sessionStorage.setItem("urlString", urlString);
                break;

              case pos.value == 'annualTotalEnergy':
                var firstDayYear = dayBeforeThisDay(firstDayOfTheYear());
                var lastDayYear = lastDayOfTheYear();

                sessionStorage.setItem("firstDay", firstDayYear);
                sessionStorage.setItem("lastDay", lastDayYear);
                sessionStorage.setItem("variablePosition", 8);

                console.log(firstDayYear);
                console.log(lastDayYear);
                var urlString = "type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") 
                + "&date1=" + sessionStorage.getItem("firstDay") + "&date2=" + sessionStorage.getItem("lastDay");
                sessionStorage.setItem("urlString", urlString);

                break;

              case pos.value == "dailyTotalPower":
                var todayDate = todaysDate(); //seleciona a data de hoje
            
                console.log(todayDate);
                sessionStorage.setItem("today", todayDate);
                //var today = sessionStorage.getItem("today");
                //console.log(today);

                type = "totalPower";
                sessionStorage.setItem("variablePosition", 5);
                sessionStorage.setItem("variableType", type);

                var urlString = "type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") 
                + "&date1=" + sessionStorage.getItem("today");
                sessionStorage.setItem("urlString", urlString);
                break;

              default:
                var urlString = "type=" + null +"&position=" + null
                + "&date1=" + null + "&date2=" + null;;
                sessionStorage.setItem("urlString", urlString);
            }
           
            console.log( document.getElementById("variablePosition").value);
            sessionStorage.setItem("url1", client.value);
            
            return true;
        }
      var th = sessionStorage.getItem("variablePosition");
      var tipo = sessionStorage.getItem("variableType");
      console.log(th);
    
      document.getElementById("ener").innerHTML = th; //não necessário
      
      //let url1 = "http://ecologger.eng.br/graph_2408/data.php?range=" + sessionStorage.getItem("Range_1") + "&range2=" + sessionStorage.getItem("Range_2") + "&nome=" + sessionStorage.getItem("cl") + "&data_inicial=" + sessionStorage.getItem("dt1") + "&data_final=" + sessionStorage.getItem("dt2") + "&time1=" + sessionStorage.getItem("tm1") + "&time2=" + sessionStorage.getItem("tm2") + "&position=" + sessionStorage.getItem("variablePosition")+"&";
      //let url1 = "http://ecologger.eng.br/graph_front/data.php?type=" + sessionStorage.getItem("variableType") +"&position=" +sessionStorage.getItem("variablePosition") + "&nome=" + sessionStorage.getItem("cl");
      
      let url = "http://ecologger.eng.br/interface_graph/cliente/php/data.php?" +sessionStorage.getItem("urlString") + "&nome=" + sessionStorage.getItem("url1");
      console.log( url.value);
      $(document).ready(function () {
        
            createGraph();
            
      });
        
      function createGraph()
          {
            {
              $.get(url,
                function (data)
                {
                  
                  console.log(data);
                  var xAxis = [];
                  var yAxis = [];
                  var label1;
                  var timeLabel = 'day';
                  var graphType = 'bar';
                  if(tipo == "totalPower"){
                        graphType = 'line';
                  } 
                  //preparando eixo x e eixo y com os dados do banco
                  for (var i in data) {
                      if(data[i].y != 1431655765 || data[i].y != 2004318071|| data[i].y != 286331153){
                        xAxis.push(data[i].x);
                        yAxis.push(data[i].y);

                        
                        switch(tipo!=''){
                          case tipo =='totalPower':
                            yAxis[i] = yAxis[i];
                            //yAxis[i] = yAxis[i]*10; //linha de correção (retirar quando problema do logger for resolvido)
                            //label1 = 'Energia (kWh)';
                            label1 = 'Potência Ativa Total Diária (kW)';
                            break;
                          case tipo =='dailyTotalEnergy':
                            yAxis[i] = yAxis[i];
                            //yAxis[i] = yAxis[i]/10; //linha de correção (retirar quando problema do logger for resolvido)
                            label1 = 'Energia Total Diária (kWh)';
                            break;
                          case tipo =='weeklyTotalEnergy':
                            label1 = 'Energia Total Semanal (kWh)';
                            break;
                          case tipo =='monthlyTotalEnergy':
                            label1 = 'Energia Total Mensal (kWh)';
                            break;
                          case tipo =='annualTotalEnergy':
                            label1 = 'Energia Total Anual (kWh)';
                            break;
                          default:
                            label1 = 'Variável não selecionada';
                        }
                      }
                      
                  }
                  //preparando os dados com os eixos x e y
                  var dados = {
                    labels: xAxis,
                    datasets: [
                      {
                        label: label1,
                        backgroundColor: '#3DDC97',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: yAxis
                      }
                    ]
                  };
                  //construção do gráfico
                  //var timeFormatter = {day:'numeric', month:'short'};
                  var gTarget = $("#myChart");
                  var myChart = new Chart(gTarget, {
                      type: graphType,
                      data: dados,
                      options: {
                        responsive: true,
    
                        scales: {
                          x: {
                            //type: 'time',
                            //bounds: 'ticks',
                            //display: true,
                            //offset: true,
                            /*time: {
                              unit: 'day',
                              displayFormats: {
                                'millisecond': 'DD MMM',
                                'second': 'DD MMM',
                                'minute': 'DD MMM',
                                'hour': 'DD MMM',
                                'day': 'YYYY',
                                'week': 'DD MMM',
                                'month': 'DD MMM',
                                'quarter': 'DD MMM',
                                'year': 'MMM YYYY',
                              }
                           },*/
                           // title: {
                              //  display: true,
                              //  text: 'Tempo'
                            //},
                            ticks: {
                             // autoSkip: true,
                             // maxRotation: 0,
                             // major: {
                              //  enabled: true
                             // },
                              /*callback: function(value) { 
                                if(tipo == 'monthlyTotalEnergy'){
                                  return new Date(value+' 00:00:00').toLocaleDateString('pt-BR',{day:'numeric', month:'short'});
                                } else if (tipo =='annualTotalEnergy' ){
                                  return new Date(value +' 00:00:00').toLocaleDateString('pt-BR',{month:'short'});
                                }
                                   
                              },*/
                              maxTicksLimit:10,
                            } 
                          },
                          y: {
                            
                            ticks: {
                              maxTicksLimit:10,
                              callback: function(value) {
                                    var dataRange = [
                                      { divider: 1e6, suffix: 'M' },
                                      { divider: 1e3, suffix: 'k' }
                                    ];
                                    function nFormatter(number) {
                                      for (var i = 0; i < dataRange.length; i++) {
                                        if (number >= dataRange[i].divider) {
                                          console.log(number);
                                          console.log(number / dataRange[i].divider);
                                          return (number / dataRange[i].divider).toLocaleString() + dataRange[i].suffix;
                                      }
                                    }
                                  
                                  return number;
                                }
                                return nFormatter(value);
                                /*const valueLegend = this.getLabelForValue(value);
                                function nFormatter(number){
                                  if(valueLegend.length>3){
                                    number = number/1000;
                                    number = Math.round(number*100)/100;
                                    return number.toLocaleString() + ' K';
                                  }
                                }
                                return nFormatter(value);*/
                                
                              }
                            }
                          }
                        }
                      },    
                  });
                  
                });
              } 
                   
            }