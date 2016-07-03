function submitForm()
{
	var col = document.getElementById('title');
	col.style.display='none';
	var result=document.getElementById('results');
	result.style.display='block';
	// var live=document.getElementById('livestatus');
	// live.style.display='block';
}

function opacityHalf()
{
    var column = document.getElementById('station');
    column.style.opacity = "0.5";
    // console.log("hello opacity");
}

function opacityOne()
{
    var column = document.getElementById('station');
    column.style.opacity = "1";
    // console.log("hello opacity");
}

