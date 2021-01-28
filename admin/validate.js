function validateAll(form){
	fail = validateComplain(form.complain.value);

	if (fail == "") return true
		else 
			alert(fail);
		return false
}
function validateComplain(field){
	if(field.length == ""){
		return "this can not be left empty"; 
	}else
		return "";
}