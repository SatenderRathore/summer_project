var res=[];
var img=new Image();
img.src="train.png";
console.log(img);
var ctr=1;
var flag=0;

function rotate(el){
	
	if(el=="next2")
	{
		res[0]=document.getElementById("src").value;
		if(res[0]=='')
		{
			$(".errsrc").text("Please enter proper source !").fadeIn();
			return ;
		}
		$(".errsrc").empty().fadeOut();

		document.getElementById("source").style.display="none";
		document.getElementById("destn").style.display="block";
		//res[0]=document.getElementById("src").value + '<img src=' + img.src + '/>'    // add image instead of →
		document.getElementById("summary").innerHTML=res.join('  →  ');
		ctr++;
	}
	else if(el=="prev1")
	{
		document.getElementById("source").style.display="block";
		document.getElementById("destn").style.display="none";
		//document.getElementById("summary").innerHTML='';
		ctr--;
		
	}
	else if(el=="next3")
	{
		res[1]=document.getElementById("dest").value;
		if(res[1]=='')
		{
			$(".errdestn").text("Please enter proper destination !").fadeIn();
			return ;
		}
		$(".errdestn").empty().fadeOut();

		document.getElementById("destn").style.display="none";
		document.getElementById("date").style.display="block";					
		document.getElementById("summary").innerHTML=res.join('  →  ');
		ctr++;
	}
	else if(el=="prev2")
	{
		document.getElementById("destn").style.display="block";
		document.getElementById("date").style.display="none";
		//var src=document.getElementById("src").value;
		//document.getElementById("summary").innerHTML=src;	
		ctr--;
	}
	else if(el=="next4")
	{
		res[2]=document.getElementById("datepicker").value;
		if(res[2]=='')
		{
			$(".errdate").text("Please enter proper date !").fadeIn();
			return ;
		}
		$(".errdate").empty().fadeOut();
		document.getElementById("date").style.display="none";
		document.getElementById("selclass").style.display="block";	
		
		document.getElementById("summary").innerHTML=res.join('  →  ');
		flag=1;
		ctr++;
		
	}
	else if(el=="prev3")
	{
		document.getElementById("selclass").style.display="none";
		document.getElementById("date").style.display="block";
		ctr--;
	}
	else if(el=="next5")
	{
		document.getElementById("selclass").style.display="none";
		document.getElementById("quota").style.display="block";
		res[3]=document.getElementById("travel_class").value;
		document.getElementById("summary").innerHTML=res.join('  →  ');
		ctr++;
	}
	else if(el=="prev4")
	{
		document.getElementById("quota").style.display="none";
		document.getElementById("selclass").style.display="block";
		ctr--;
	}
	else if(el=="final")
	{
		
		res[4]=document.getElementById("quota").value;
		document.getElementById("summary").innerHTML=res.join('  →  ');
		console.log("hello");
	}

	document.getElementById("steps").innerHTML=ctr+'/5';

}
rotate();

/*function check()
{
		 to stop page to redirect to result page if unfilled 
		console.log(res[0]);
	if(res[0]=='')
	{
		window.alert("Please Enter The Details Properly!");
		return;
	}
}check();*/