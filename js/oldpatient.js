$('#a_submit').click(function() {
	
	var pid = $('#a_pid').val();
	
	if(!pid || pid == 'Registered Patient ID')
	{
		alert('Enter the Patient ID');
		return false;
	}

	var form_data = {
		a_pid: $('#a_pid').val(),
		a_doctor: $('#a_doctor').val(),
		a_remarks: $('#a_remarks').val(),
		ajax: 1
	};

	$.ajax({
		url: "<?php echo base_url('index.php/registration/olgreg'); ?>"
		type: 'POST',
		data: form_data,
		success: function(msg){
			alert(msg);
		}
	});
	return false;
});