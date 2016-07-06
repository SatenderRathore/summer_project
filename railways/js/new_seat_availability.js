var res=[];
var img=new Image();
img.src="../images/next.png";
console.log(img);

function rotate(el){
	if(el=="next2")
	{
		document.getElementById("source").style.display="none";
		document.getElementById("destn").style.display="block";
		res[0]=document.getElementById("src").value + '  →  ' ;    // add image instead of →
		document.getElementById("summary").innerHTML=res.join('');
	}
	else if(el=="prev1")
	{
		document.getElementById("source").style.display="block";
		document.getElementById("destn").style.display="none";
		//document.getElementById("summary").innerHTML='';
		
	}
	else if(el=="next3")
	{
		document.getElementById("destn").style.display="none";
		document.getElementById("date").style.display="block";				
		res[1]=document.getElementById("dest").value + '  →  ';
		document.getElementById("summary").innerHTML=res.join('');
	}
	else if(el=="prev2")
	{
		document.getElementById("destn").style.display="block";
		document.getElementById("date").style.display="none";
		//var src=document.getElementById("src").value + '  →  ';
		//document.getElementById("summary").innerHTML=src;	
	}
	else if(el=="next4")
	{
		document.getElementById("date").style.display="none";
		document.getElementById("selclass").style.display="block";	
		res[2]=document.getElementById("datepicker").value + '  →  ';
		document.getElementById("summary").innerHTML=res.join('');
		
	}
	else if(el=="prev3")
	{
		document.getElementById("selclass").style.display="none";
		document.getElementById("date").style.display="block";
	}
	else if(el=="next5")
	{
		document.getElementById("selclass").style.display="none";
		document.getElementById("quota").style.display="block";
		res[3]=document.getElementById("travel_class").value + '  →  ';
		document.getElementById("summary").innerHTML=res.join('');
	}
	else if(el=="prev4")
	{
		document.getElementById("quota").style.display="none";
		document.getElementById("selclass").style.display="block";
	}

}