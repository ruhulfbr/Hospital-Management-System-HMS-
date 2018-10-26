var counter = 1;
var limit = 100;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('tr');
          newdiv.id = "child";
          newdiv.innerHTML = "<td><select class='form-control' name='fromm[]'><option value='Store'>Store</option><option value='Others'>Others</option></select></td><td><select class='form-control' name='unit[]'><option value='TABLET'>TABLET</option><option value='CAPSULE'>CAPSULE</option><option value='SYRUP'>SYRUP</option><option value='TUBE'>TUBE</option><option value='DROP'>DROP</option><option value='INJECTION'>INJECTION</option><option value='LOTION'>LOTION</option><option value='SPRAY'>SPRAY</option><option value='POWDER'>POWDER</option></select></td><td><input type='text' class='form-control' placeholder='Brand' size='10' name='brand[]'></td><td><input type='text' class='form-control' placeholder='Generic' size='15' name='generic[]'></td><td><select class='form-control' name='schedule[]'><option value='BIS'>BIS</option><option value='1OD'>1OD</option><option value='3OD'>3OD</option><option value='SOS'>SOS</option><option value='STAT'>STAT</option><option value='BT'>BT</option><option value='DA'>DA</option><option value='OM'>OM</option><option value='ON'>ON</option><option value='OPD'>OPD</option><option value='PO'>PO</option><option value='SA'>SA</option><option value='SUPP'>SUPP</option><option value='QQN'>QQN</option><option value='UD'>UD</option></select></td><td><input type='text' class='form-control' placeholder='Days' size='3' name='days[]'></td><td><input type='text' class='form-control' placeholder='Qty' size='3' name='quantity[]'></td><td><select class='form-control' name='advise[]'><option value='-'>-</option><option value='Before Meal'>Before Meal</option><option value='After Meal'>After Meal</option><option value='With Mea'>With Meal</option></select></td>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}