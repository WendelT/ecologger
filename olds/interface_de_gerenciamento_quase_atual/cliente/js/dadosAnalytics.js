var today_Date = new Date();
var selectedRange;
var finalRange;

var time_range;
var time_ans;
function selectCheck2(that) {
  sessionStorage.removeItem("Range_2");
  if (that.value == "time_no") {
      //alert("check");
      document.getElementById("ifTime").style.display = "none";
      time_range='no';
      //sessionStorage.setItem("Range_2", time_range);
    
  } else if(that.value == "no_choice"){
      document.getElementById("ifTime").style.display = "none";
      time_range='no';
      
  }else {
      document.getElementById("ifTime").style.display = "block";
      time_range='yes';
      //sessionStorage.setItem("Range_2", time_range);
      //time_range='no';
      //sessionStorage.setItem("Range_2", time_range);
  }
  //time_ans;
  sessionStorage.setItem("Range_2", time_range);
}

function selectCheck(that) {
  if (that.value == "today") {
      //alert("check");
      document.getElementById('today1').valueAsDate = today_Date;
      document.getElementById("ifToday").style.display = "block";
      document.getElementById("selectTime").style.display = "block";
      document.getElementById("ifYesterday").style.display = "none";
      document.getElementById("if7Days").style.display = "none";
      document.getElementById("if30Days").style.display = "none";
      document.getElementById("ifRange").style.display = "none";
      selectedRange = 'hoje';
      sessionStorage.setItem("Range_1", selectedRange);
    
  } else if (that.value == "yesterday") {
      var yesterday_Date = new Date(today_Date);
      yesterday_Date.setDate(yesterday_Date.getDate() - 1);
      document.getElementById('yesterday1').valueAsDate = yesterday_Date;
      document.getElementById("ifYesterday").style.display = "block";
      document.getElementById("selectTime").style.display = "block";
      document.getElementById("ifToday").style.display = "none";
      document.getElementById("if7Days").style.display = "none";
      document.getElementById("if30Days").style.display = "none";
      document.getElementById("ifRange").style.display = "none";
      selectedRange = 'ontem';
      sessionStorage.setItem("Range_1", selectedRange);
    
  } else if (that.value == "last7Days") {
    //alert("check");
      var last_7Days = new Date(today_Date);
      last_7Days.setDate(today_Date.getDate() - 7);
      document.getElementById('last7').valueAsDate = last_7Days;
      document.getElementById('nowToday').valueAsDate = today_Date;
      document.getElementById("if7Days").style.display = "block";
      document.getElementById("ifToday").style.display = "none";
      document.getElementById("ifYesterday").style.display = "none";
      document.getElementById("if30Days").style.display = "none";
      document.getElementById("ifRange").style.display = "none";
      document.getElementById("selectTime").style.display = "none";
      selectedRange = '7daysAgo';
      sessionStorage.setItem("Range_1", selectedRange);
    
  } else if (that.value == "last30Days"){
      var last_30Days = new Date(today_Date);
      last_30Days.setDate(today_Date.getDate() - 30);
      document.getElementById('last30').valueAsDate = last_30Days;
      document.getElementById('nowToday2').valueAsDate = today_Date;
      document.getElementById("if30Days").style.display = "block";
      document.getElementById("ifToday").style.display = "none";
      document.getElementById("ifYesterday").style.display = "none";
      document.getElementById("if7Days").style.display = "none";
      document.getElementById("ifRange").style.display = "none";
      document.getElementById("selectTime").style.display = "none";
      selectedRange = '30daysAgo';
      sessionStorage.setItem("Range_1", selectedRange);
  } else if(that.value == "chooseRange"){
      document.getElementById("ifRange").style.display = "block";
      document.getElementById("if30Days").style.display = "none";
      document.getElementById("ifToday").style.display = "none";
      document.getElementById("ifYesterday").style.display = "none";
      document.getElementById("if7Days").style.display = "none";
      document.getElementById("selectTime").style.display = "none";
      selectedRange = 'chooseRange';
      sessionStorage.setItem("Range_1", selectedRange);
  }
  
  else {
      
      document.getElementById("ifToday").style.display = "none";
      document.getElementById("ifYesterday").style.display = "none";
      document.getElementById("if7Days").style.display = "none";
      document.getElementById("if30Days").style.display = "none";
      document.getElementById("ifRange").style.display = "none";
      document.getElementById("selectTime").style.display = "none";
  }
  finalRange = sessionStorage.getItem("Range_1");
  console.log(finalRange);
}
function savedata() { 
      var data;
      var data2;
      var data2 = document.getElementById("dt2");
      var time1 = document.getElementById("tm1");
      var time2 = document.getElementById("tm2");
      var client = document.getElementById("cl");
      var type = document.getElementById("variablePosition");
      
      console.log( document.getElementById("dt1").value);
      console.log( document.getElementById("dt2").value);
      console.log( document.getElementById("tm1").value);
      console.log( document.getElementById("tm2").value);
      console.log( document.getElementById("variablePosition").value);
      sessionStorage.setItem("cl", client.value);
      if(finalRange=='hoje'){
      data = document.getElementById("today1");
      sessionStorage.setItem("dt1", data.value);
      } else if (finalRange=='ontem'){
      data = document.getElementById("yesterday1");
      sessionStorage.setItem("dt1", data.value);
      } else if (finalRange=='7daysAgo'){
      data = document.getElementById("last7");
      data2 = document.getElementById("nowToday");
      sessionStorage.setItem("dt1", data.value);
      sessionStorage.setItem("dt2", data2.value);
      } else if (finalRange=='30daysAgo'){
      data = document.getElementById("last30");
      data2 = document.getElementById("nowToday2");
      sessionStorage.setItem("dt1", data.value);
      sessionStorage.setItem("dt2", data2.value);
      } else if (finalRange=='chooseRange'){
      data = document.getElementById("dt1");
      data2 = document.getElementById("dt2");
      sessionStorage.setItem("dt1", data.value);
      sessionStorage.setItem("dt2", data2.value);
      }
      
      
      sessionStorage.setItem("tm1", time1.value);
      sessionStorage.setItem("tm2", time2.value);
      sessionStorage.setItem("variablePosition", type.value);

      
      return true;
  }
var th = sessionStorage.getItem("variablePosition");
console.log(th);
//console.log(tm2.value);


document.getElementById("ener").innerHTML = th; //não necessário

let url2 = "http://ecologger.eng.br/graph_2408/data.php?range=" + sessionStorage.getItem("Range_1") + "&range2=" + sessionStorage.getItem("Range_2") + "&nome=" + sessionStorage.getItem("cl") + "&data_inicial=" + sessionStorage.getItem("dt1") + "&data_final=" + sessionStorage.getItem("dt2") + "&time1=" + sessionStorage.getItem("tm1") + "&time2=" + sessionStorage.getItem("tm2") + "&position=" + sessionStorage.getItem("variablePosition")+"&";

console.log(url2.value);
$(document).ready(function () {
      createGraph();
});
  
function createGraph()
    {
      {
        $.get(url2,
          function (data)
          {
            
            console.log(data);
            var xAxis = [];
            var yAxis = [];
            var label1;
            //preparando eixo x e eixo y com os dados do banco
            for (var i in data) {
             
                xAxis.push(data[i].x);
                yAxis.push(data[i].y);
            
                switch(th!=''){
                  case th==5:
                    yAxis[i] = yAxis[i]*10; //linha de correção (retirar quando problema do logger for resolvido)
                    label1 = 'Energia (kWh)';
                    break;
                  case th==2:
                    yAxis[i] = yAxis[i]/10; //linha de correção (retirar quando problema do logger for resolvido)
                    label1 = 'Potência Ativa (kW)';
                    break;
                  case th==155:
                    label1 = 'Potência Reativa (kVAr)';
                    break;
                  case th == 176:
                    label1 = 'Tensão de Linha AB (V)';
                    break;
                  case th == 179:
                    label1 = 'Tensão de Linha BC (V)';
                    break;
                  case th == 182:
                    label1 = 'Tensão de Linha CA (V)';
                    break;
                  case th == 185:
                    label1 = 'Corrente de Fase A (A)';
                    break;
                  case th == 188:
                    label1 = 'Corrente de Fase B (A)';
                    break;
                  case th == 191:
                    label1 = 'Corrente de Fase C (A)';
                    break;
                  case th == 194:
                    label1 = 'Tensão de Fase A (V)';
                    break;
                  case th == 197:
                    label1 = 'Tensão de Fase B (V)';
                    break;
                  case th == 197:
                    label1 = 'Tensão de Fase C (V)';
                    break;
                  default:
                    label1 = 'Variável não selecionada';
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
            var gTarget = $("#myChart");
            var myChart = new Chart(gTarget, {
                type: 'line',
                data: dados,
                options: {
                  responsive: true,

                  scales: {
                    x: {
                      title: {
                          display: true,
                          text: 'Tempo'
                      },
                      ticks: {
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
