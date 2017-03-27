
function addField(){
	var container = document.getElementById('field-container');
	var field = document.createElement('div');
	field.innerHTML = "<input type='text' name='awards[]' placeholder='Enter Award' ><input type='text' name='years[]' placeholder='Enter Year' > " ;
	container.appendChild(field);
}











  