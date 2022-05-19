	$(document).on('click', '#select_all', function() {          	
	$(".us_checkbox").prop("checked", this.checked);
	
	});	
	$(document).on('click', '.us_checkbox', function() {		
		if ($('.us_checkbox:checked').length == $('.us_checkbox').length) {
		$('#select_all').prop('checked', true);
		} else {
		$('#select_all').prop('checked', false);
		}
		
	});
//Top select menu
// delete selected users
$('#ok').on('click', function(e) {
	e.preventDefault();
	var user = []; 
	var conceptState = $('#state').find(":selected").attr('id');
	if (conceptState == 'remove1') {    
		$(".us_checkbox:checked").each(function() {  
			user.push($(this).data('sample-id'));
		});	
		if(user.length <=0)  {  
			$('.alert.alert-warning').show(); 
		}  
		else { 	
			WRN_PROFILE_DELETE = "Are you sure you want to remove "+(user.length>1?"these":"this")+" Users?";  
		}
			var checked = confirm(WRN_PROFILE_DELETE);  
			if(checked == true) {			
				var selected_values = user.join(","); 
				$.ajax({ 
					type: "POST",  
					url: "back.php",  
					cache:false,  
					data: 
					'id='+selected_values, 
					success: function(response) {
						window.location.reload();								
					}   
				});				
			}
	} else {
		console.log('error');
	}
//Change status in active
if (conceptState == 'active') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
		$('.alert.alert-warning').show(); 
	}  
	else { 	
		WRN_PROFILE_UPDATE = "You want to change status to active? "+(user.length>1?"these":"this")+" Users?";  
	}
		var checked = confirm(WRN_PROFILE_UPDATE);  
		if(checked == true) {			
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false, 
				data:
					'sample-id='+selected_values,
				success: function(response) {
					window.location.reload();							
				}   
			});				
		}
} else {
	console.log('error');
}
//Change status in not_active
if (conceptState == 'not_active') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
		$('.alert.alert-warning').show(); 
	}  
	else { 	
		WRN_PROFILE_UPDATE = "You want to change status to not_active? "+(user.length>1?"these":"this")+" Users?";  
	}
		var checked = confirm(WRN_PROFILE_UPDATE);  
		if(checked == true) {			
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false,  
				data:	
					'samp-id='+selected_values,
				success: function(response) {
						window.location.reload();							
				}   
			});				
		}
} else {
	console.log('error');
}
});
//Down select menu
// delete selected users
$('#oki').on('click', function(e) {
	e.preventDefault();
	var user = []; 
	var concept = $('#stat').find(":selected").attr('id');
	if (concept == 'clear') {    
		$(".us_checkbox:checked").each(function() {  
			user.push($(this).data('sample-id'));
		});	
		if(user.length <=0)  {  
			$('.alert.alert-warning').show(); 
		}  
		else { 	
			WRN_PROFILE_DELETE = "Are you sure you want to remove "+(user.length>1?"these":"this")+" Users?";  
		}
			var checked = confirm(WRN_PROFILE_DELETE);  
			if(checked == true) {			
				var selected_values = user.join(","); 
				$.ajax({ 
					type: "POST",  
					url: "back.php",  
					cache:false,  
					data: 
					'id='+selected_values, 
					success: function(response) {
						window.location.reload();								
					}   
				});				
			}
	} else {
		console.log('error');
	}
//Change status in active
if (concept == 'online') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
		$('.alert.alert-warning').show(); 
	}  
	else { 	
		WRN_PROFILE_UPDATE = "You want to change status to active? "+(user.length>1?"these":"this")+" Users?";  
	}
		var checked = confirm(WRN_PROFILE_UPDATE);  
		if(checked == true) {			
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false, 
				data:
					'sample-id='+selected_values,
				success: function(response) {
					window.location.reload();					
				}   
			});				
		}
} else {
	console.log('error');
}
//Change status in not_active
if (concept == 'not_online') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
		$('.alert.alert-warning').show(); 
	}  
	else { 	
		WRN_PROFILE_UPDATE = "You want to change status to not_active? "+(user.length>1?"these":"this")+" Users?";  
	}
		var checked = confirm(WRN_PROFILE_UPDATE);  
		if(checked == true) {			
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false,  
				data:	
					'samp-id='+selected_values,
				success: function(response) {
					window.location.reload();							
				}   
			});				
		}
} else {
	console.log('error');
}
});
