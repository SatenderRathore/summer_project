function swap(){
	var src=document.getElementById('src').value;
	var dest=document.getElementById('dest').value;
	document.getElementById('src').value=dest;
	document.getElementById('dest').value=src;


}

function update_pnr_details(){
	var table = document.getElementById("trains_list");
	var train_details="DHN ANVT SPL( 02395)";
	// var train_num = '<?php echo $trainnum ?>';
	var dept="21:35";
	var arr="15:00";
	var durr="17:25 hr";
	var days="M T W T F S S";
	var classes="2A 3A SL";
	var cstatus="GNWL603/WL400";
	var sjstatus="No more booking";
	var row1=table.insertRow(1);
	var cell11=row1.insertCell(0);
	var cell12=row1.insertCell(1);
	var cell13=row1.insertCell(2);
	var cell14=row1.insertCell(3);
	var cell15=row1.insertCell(4);
	var cell16=row1.insertCell(5);
	var cell17=row1.insertCell(6);
	var cell18=row1.insertCell(7);
	cell11.innerHTML=train_details;
	cell12.innerHTML=dept;
	cell13.innerHTML=arr;
	cell14.innerHTML=durr;
	cell15.innerHTML=days;
	cell16.innerHTML=classes;
	cell17.innerHTML=cstatus;
	cell18.innerHTML=sjstatus;

	/*var row2=table.insertRow(2);
	var cell21=row2.insertCell(0);
	var cell22=row2.insertCell(1);
	var cell23=row2.insertCell(2);
	var cell24=row2.insertCell(3);
	var cell25=row2.insertCell(4);
	var cell26=row2.insertCell(5);
	var cell27=row2.insertCell(6);
	var cell28=row2.insertCell(7);
	cell21.innerHTML=train_details;
	cell22.innerHTML=dept;
	cell23.innerHTML=arr;
	cell24.innerHTML=durr;
	cell25.innerHTML=days;
	cell26.innerHTML=classes;
	cell27.innerHTML=cstatus;
	cell28.innerHTML=sjstatus;*/

}
update_pnr_details();