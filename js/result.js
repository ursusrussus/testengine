
function res_swap(obj) {
	/*
	 * Скрываем и раскрываем вопросы
	 * 
	 */
	
	qTextPrev=$(obj).find(".qcollapsed");
	qTextFull=$(obj).find(".qfull").show();
	if($(qTextPrev).is(":visible")) {
		$(obj).find(".qcollapsed").hide();
		$(obj).find(".qfull").show();
		}
	else {
		$(obj).find(".qcollapsed").show();
		$(obj).find(".qfull").hide();
	
	}
	
	/*
	 * Показать правильные и неправильные варианты
	 * 
	 * 
	 */
	
	
	
	
}
	

function res_init() {
	//Отправляем запрос с 
	function jsonrequest () {
		this.type="tresult";
		this.action="pageload";
		this.session=0;
	}
	
	var request= new jsonrequest ();
	request.session=window.location.hash;
	var d = JSON.stringify(request);
	alert(d);
}