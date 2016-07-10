
/* IVAN - MEUS SCRIPTS */


function carregar_grafico(r_option,r_series,args){

  $.ajax({
        url: "ajax/data2.php",
        type: 'GET',
		data: args,
        async: true,
        dataType: "json",
        success: function (data){
	
			//dados para o grafico
			if(r_series==true){
		
				$('#container').highcharts({
					title: {
					text: '',
					x: -20 //center
				},
				subtitle: {
				text: '',
				x: -20
				},
				xAxis: {
					categories: ['00h', '01h', '02h', '03h', '04h', '05h',
					'06h', '07h', '08h', '09h', '10h', '11h', '12h', '13h','14h','15h',
					'16h','17h','18h','19h','20h','21h','22h','23h']
				},
				yAxis: {
				title: {
					text: '2016-05-20'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
				},
				tooltip: {
				valueSuffix: ''
				},
				series: data.series
				});
			}			
			
			//opções para a selectbox
			if(r_option==true){
				$.each( data.option, function( key, value ){
					 $('#JS_optionChart').append($("<option></option>")
                    .attr("value",key)
                    .text(value));
				});
			}			
        }
    });	
}



//inicializar
carregar_grafico(true,false,"");




$( document ).on( "click", ".JS_addNew", function() {

    //obter conteúdo da linha
    var objLinha=$(this).parent('td').parent('tr');
    var i=0;
    //percorrer dados do form
    $(".modal-body .row input[type=text]").each(function(){

        //adicionar valor as inputs
        $(this).val(objLinha.find('td:eq('+i+')').html());
        i++;
    });

});



$(document).ready(function() {

    //ao adicionar linha
    $("#JS_addTR").click(function () {
        var dados=new Array();
        var i = 0;
        $(".modal-body .row input[type=text]").each(function () {
            dados[i] = $(this).val();
           i++;
        });
        dados[i] ="<i>registo inserido</i>";
        $('#mainTable').DataTable().row.add(dados).draw(false);
    });
	
	
	
	//ao selecionar as options
	$("#JS_optionChart").change(function(){
			var args="opcoes=";	
			$('#JS_optionChart option:selected').each(function(){
				args=args+$(this).val()+"-";
				$("#JS_tituloAxis").html($(this).text());
				$("#srch-term").val("");
			});
		carregar_grafico(false,true,args);
	});
	
	
	
	
//pesquisa do gráfico	
$("#srch-term").keyup(function(){
	
	if($(this).val()==""){
		$('#JS_optionChart option').prop("selected",false);
		$("#container").html('');
		$("#JS_tituloAxis").html("");
		return false;
	}
	var re =new RegExp($(this).val(),"i");
	var args="";	
	$('#JS_optionChart option').each(function(){
		if(re.test($(this).text())){
		
			$(this).prop("selected",true);
			args=args+$(this).val()+"-";
			$("#JS_tituloAxis").html($(this).text());
		}
		else{
			$(this).prop("selected",false);
		}
	});
	if(args==""){
		$("#container").html('<div class="alert alert-warning">Pesquisa de dados não encontrada.</div>');
		$("#JS_tituloAxis").html("");
		}
		else{
		carregar_grafico(false,true,"opcoes="+args);
		}
});
	

});