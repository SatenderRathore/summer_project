function update_passenger_list(){
	var table = document.getElementById("passengers");
	var i=0;
	var srno=[1,2,3,4];
	var booking_status=[2,3,4,5];
	var current_status=[3,4,5,6];
	var seatjugaad_status=[4,5,6,7];
	for(i=0;i<srno.length;i++)  
	{
		var row=table.insertRow(i+1);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		var cell3=row.insertCell(2);
		var cell4=row.insertCell(3);
		cell1.innerHTML=srno[i];
		cell2.innerHTML=booking_status[i];
		cell3.innerHTML=current_status[i];
		cell4.innerHTML=seatjugaad_status[i];
		console.log(cell1.innerHTML);
	}
}

update_passenger_list();

function update_pnr_details(){
	var table = document.getElementById("pnr_detail");
	var trainno=19482;
	var train_name="seat batao express";
	var boarding_date="13-11-2016";
	var from="svnit";
	var to="gandhi";
	var reserved_upto="gandhi";
	var boarding_point="svnit";
	var clas="1 AC";
	var row=table.insertRow(1);
	var cell1=row.insertCell(0);
	var cell2=row.insertCell(1);
	var cell3=row.insertCell(2);
	var cell4=row.insertCell(3);
	var cell5=row.insertCell(4);
	var cell6=row.insertCell(5);
	var cell7=row.insertCell(6);
	var cell8=row.insertCell(7);
	cell1.innerHTML=trainno;
	cell2.innerHTML=train_name;
	cell3.innerHTML=boarding_date;
	cell4.innerHTML=from;
	cell5.innerHTML=to;
	cell6.innerHTML=reserved_upto;
	cell7.innerHTML=boarding_point;
	cell8.innerHTML=clas;
	
}
update_pnr_details();