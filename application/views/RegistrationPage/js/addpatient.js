     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><select class='form-control' name='from"+i+"'><option>Store</option><option>Others</option></select></td><td><select class='form-control' name='unit"+i+"'><option>TU</option><option>TB</option><option>CP</option><option>SY</option></select></td><td><input type='text' class='form-control' placeholder='Brand' size='10' name='brand"+i+"'></td><td><input type='text' class='form-control' placeholder='Generic' size='15' name='generic"+i+"'></td><td><select class='form-control' name='sch"+i+"'><option>1 OD</option><option>1 BD</option><option>LA</option><option>SOS</option><option>STAT</option></select></td><td><input type='text' class='form-control' placeholder='Days' size='3' name='days"+i+"'></td><td><select class='form-control' name='advise"+i+"'><option>Before Meal</option><option>After Meal</option><option>With Meal</option></select></tr>");

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