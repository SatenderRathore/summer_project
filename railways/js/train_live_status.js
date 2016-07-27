function submitForm(trainNum)
{
	var col = document.getElementById('title');
	col.style.display='none';
	var result=document.getElementById('results');
	result.style.display='block';
	document.getElementById('train_num').value=trainNum;
	// var live=document.getElementById('livestatus');
	// live.style.display='block';
}
