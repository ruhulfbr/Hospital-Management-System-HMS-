$(document).ready(function(){
    $('#printmodal').click(function(){
        
        // variables
        var contents = $('#printable').html();
        var frame = $('#printframe')[0].contentWindow.document;
         
        
       
        
        // print just the modal div
        $('#printframe')[0].contentWindow.print();
    });
});