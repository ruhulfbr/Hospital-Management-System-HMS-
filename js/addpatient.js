     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><select class='form-control' name='from"+i+"'><option value='Store'>Store</option><option value='Others'>Others</option></select></td><td><select class='form-control' name='unit"+i+"'><option value='TU'>TU</option><option value='TB'>TB</option><option value='CP'>CP</option><option value='SYP'>SY</option></select></td><td><input type='text' class='form-control' placeholder='Brand' size='10' name='brand[]'></td><td><input type='text' class='form-control' placeholder='Generic' size='15' name='generic[]'></td><td><select class='form-control' name='sch"+i+"'><option value='1 OD'>1 OD</option><option value='1 BD'>1 BD</option><option value='LA'>LA</option><option value='SOS'>SOS</option><option value='STAT'>STAT</option></select></td><td><input type='text' class='form-control' placeholder='Days' size='3' name='days"+i+"'></td><td><select class='form-control' name='advise"+i+"'><option value='-'>-</option><option value='Before Meal'>Before Meal</option><option value='After Meal'>After Meal</option><option value='With Meal'>With Meal</option></select></tr>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});