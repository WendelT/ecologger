
              
              function savedata() { 
                  var data = document.getElementById("dt1");
                  var data2 = document.getElementById("dt2");
                  var input = document.getElementById("url1");
                  
                  console.log( document.getElementById("dt1").value);
                  console.log( document.getElementById("dt2").value);
                  sessionStorage.setItem("url1", input.value);
                  sessionStorage.setItem("dt1", data.value);
                  sessionStorage.setItem("dt2", data2.value);
                  return true;
              }
              let url2 = "http://ecologger.eng.br/interface_de_gerenciamento/cliente/php/data.php?nome=" + sessionStorage.getItem("url1") + "&data_inicial=" + sessionStorage.getItem("dt1") + "&data_final=" + sessionStorage.getItem("dt2");
              //let url1 = "http://ecologger.eng.br/new_filter/data.php?nome=cliente";
              console.log( url2.value);
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
                              var id = [];
                              var ener = [];
          
                              for (var i in data) {
                                  id.push(data[i].DATE);
                                  ener.push(data[i].totalEner);
                              }
                              var dados = {
                                  labels: id,
                                  datasets: [
                                      {
                                          label: 'Energia',
                                          backgroundColor: '#3DDC97',
                                          borderColor: '#46d5f1',
                                          hoverBackgroundColor: '#CCCCCC',
                                          hoverBorderColor: '#666666',
                                          data: ener,
                                          fill: true,
                                          tension: 0.1
                                      }
                                  ]
                              };
          
                              var gTarget = $("#graphteste");
                              var barGraph = new Chart(gTarget, {
                                  type: 'line',
                                  data: dados
                              });
                          });
                      }
                  }