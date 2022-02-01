
    let nUnites = 0;
    let pInstalada = 0;
    let pInstantanea = 0;
    let eTotal = 0;
    let url1 = "http://ecologger.eng.br/fetch_data_test/data_array.php";
    //let url1 = "http://ecologger.eng.br/new_filter/data.php?nome=cliente";
     
    $(document).ready(function () {
        spamInfo();
    });
    
    function spamInfo()
        {
            $.get(url1,
            function (data)
            {
                //console.log(data);
                var wca = [];
                var ener = [];
                //var nps = [];
                //var pvar = [];
                //var wcc = [];
                //var wrn1 = [];
                //var wrn2 = [];
                //var wrn3 = [];
                //var temp = [];
                //var fp = [];
                //var vab = [];
                //var vbc = [];
                //var vca = [];
                //var ia = [];
                //var ib = [];
                //var ic = [];
                //var va = [];
                //var vb = [];
                //var vc = [];
                //var freq = [];
                for (var i in data) 
                {
                    ener.push(data[i].ener);
                    // console.log(ener);
                    wca.push(data[i].wca);
                    //nps.push(data[i].nps);
                    //pvar.push(data[i].pvar);
                    //wcc.push(data[i].wcc);
                    //wrn1.push(data[i].wrn1);
                    //wrn2.push(data[i].wrn2);
                    //wrn3.push(data[i].wrn3);
                    //temp.push(data[i].temp);
                    //fp.push(data[i].fp);
                    //vab.push(data[i].vab); 
                    //vbc.push(data[i].vbc);
                    //vca.push(data[i].vca);
                    //ia.push(data[i].ia);
                    //ib.push(data[i].ib);
                    //ic.push(data[i].ic);
                    //va.push(data[i].va);
                    //vb.push(data[i].vb);
                    //vc.push(data[i].vc);
                    //freq.push(data[i].freq);
                                                // console.log(wca);
                }
                //document.getElementById("ener").innerHTML = ener.join("");
                //document.getElementById("wca").innerHTML = wca.join("");
                //document.getElementById("nps").innerHTML = nps.join("");
                //document.getElementById("pvar").innerHTML = pvar.join("");
                //document.getElementById("wcc").innerHTML = wcc.join("");
                //document.getElementById("wrn1").innerHTML = wrn1.join("");
                //document.getElementById("wrn2").innerHTML = wrn2.join("");
                //document.getElementById("wrn3").innerHTML = wrn3.join("");
                //document.getElementById("temp").innerHTML = temp.join("");
                //document.getElementById("fp").innerHTML = fp.join("");
                //document.getElementById("vab").innerHTML = vab.join("");
                //document.getElementById("vbc").innerHTML = vbc.join("");
                //document.getElementById("vca").innerHTML = vca.join("");
                //document.getElementById("ia").innerHTML = ia.join("");
                //document.getElementById("ib").innerHTML = ib.join("");
                //document.getElementById("ic").innerHTML = ic.join("");
                //document.getElementById("va").innerHTML = va.join("");
                //document.getElementById("vb").innerHTML = vb.join("");
                //document.getElementById("vc").innerHTML = vc.join("");
                //document.getElementById("freq").innerHTML = freq.join("");
            });
        }


        function consult(funcao ,variavel, idAlteracaoHTML)
        {
            jQuery.ajax
            ({
                type: "POST",
                url: 'php/consultahead.php',
                dataType: 'json',
                data: {functionname: funcao},
                success: function (obj, textstatus) 
                {
                    if( !('error' in obj) ) {
                        variavel = obj.result;
                        document.getElementById(idAlteracaoHTML).innerHTML = variavel;
                        return;
                    }
                }
            });
        }

        function consultListaClientes(funcao)
        {
            jQuery.ajax
            ({
                type: "POST",
                url: 'php/consultahead.php',
                dataType: 'json',
                data: {functionname: funcao},
                success: function (obj, textstatus) 
                {
                    if( !('error' in obj) ) {
                        var newOptions = obj.result;
                        var newValue = obj.result;
                        selectField = document.getElementById("url1");
                        selectField.options.length = 0;
                        selectField.options[0] = new Option("Selecione uma Unidade", "*");
                        for(i=0; i<obj.result.length; i++)
                        {
                            selectField.options[selectField.length] = new Option(newOptions[i]['unitsName'], newValue[i]['unitsName']);
                        }
                        this.variavel = obj.result;
                        return obj.result;
                    }
                }
            });
        }

        function somaPotencias(funcao ,variavel, idAlteracaoHTML)
        {
            jQuery.ajax
            ({
                type: "POST",
                url: 'php/consultahead.php',
                dataType: 'json',
                data: {functionname: funcao},
                success: function (obj, textstatus) 
                {
                    if( !('error' in obj) ) {
                        console.log(obj.result);
                        variavel = obj.result;
                        document.getElementById(idAlteracaoHTML).innerHTML = variavel;
                        return;
                    }
                }
            });
        }

        function energiaGerada(funcao, idAlteracaoHTML)
        {
            document.getElementById(idAlteracaoHTML).innerHTML = 0;
            jQuery.ajax
            ({
                type: "POST",
                url: 'php/consultahead.php',
                dataType: 'json',
                data: {functionname: "energiaSomaUnidades"},
                success: function (obj, textstatus) 
                {
                    if( !('error' in obj) ) 
                    {   
                        document.getElementById(idAlteracaoHTML).innerHTML = obj.result;
                        document.getElementById('quantArvores').innerHTML = obj.result2;
                        document.getElementById('ecoGerada').innerHTML = obj.result3;
                        return;
                    }
                }
            });
        }

        function potenciaGerada(funcao, idAlteracaoHTML)
        {
            document.getElementById(idAlteracaoHTML).innerHTML = 0;
            jQuery.ajax
            ({
                type: "POST",
                url: 'php/consultahead.php',
                dataType: 'json',
                data: {functionname: "potenciaGeradasUnidades"},
                success: function (obj, textstatus) 
                {
                    if( !('error' in obj) ) 
                    {
                        console.log(obj.result);
                        document.getElementById(idAlteracaoHTML).innerHTML = obj.result;
                        return;
                    }
                }
            });
        }

        function AtualizarParametros(){
            somaPotencias('sumPotUnidade',pInstalada,"potInstalada");
            energiaGerada('energiaSomaUnidades','ener');
            potenciaGerada('potenciaGeradasUnidades','wca');
        }

        
        consult('countUnidadesClient',nUnites,"nUnidade");
        //document.getElementById("potInstantanea").innerHTML = pInstantanea;
        //document.getElementById("enerTotal").innerHTML = eTotal;
        AtualizarParametros();
