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
			errorData();
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
					success: function(data) {
						refData();								
					}   
				});				
			}
	}
//Change status in active
if (conceptState == 'active') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
		errorData();
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
				success: function(data) {
						refData();							
				}   
			});				
		}
}
//Change status in not_active
if (conceptState == 'not_active') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {   
		errorData();
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
				success: function(data) {	
					refData();						
				}   
			});				
		}
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
			errorData();
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
						refData();							
					}   
				});				
			}
	}
//Change status in active
if (concept == 'online') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
			errorData();
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
					refData();					
				}   
			});				
		}
}
//Change status in not_active
if (concept == 'not_online') {  
	$(".us_checkbox:checked").each(function() {  
		user.push($(this).data('sample-id'));
	});	
	if(user.length <=0)  {  
			errorData();
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
					refData();							
				}   
			});				
		}
}
});
// add ajax
$(document).ready(function () {
    $('.btn-dark').click(function (e) {
      e.preventDefault();
      var name = $('#name').val();
	  var last = $('#last').val();
	  var role = $("#rols").val();
	  var status = $("#status")[0].checked;
			if (status === false) {
                status = '0';
            } 
            else if (status === true){
                status = '1';
            }
	  		if(name === "" || last === ""){
			alert("Please fill in the fields!");
				return false;
	}
      $.ajax
        ({
          type: "POST",
          url: "back.php",
          data: {
			  "add": true,
			  "name": name, 
			  "last": last,
			   "role": role, 
			   "status": status,
			},
          success: function (data) {
				$("#myModal").modal('hide');
					refData();
          }
        });
    });
  })
  //delete
$(document).on('click','#btn_delete',function(e)
{
	e.preventDefault();
	var Delete_ID = $(this).attr('data-del-id');
	console.log(Delete_ID);
	$('#delete').modal('show');
	$(document).on('click','#btn_delete_record',function()
	{
		$.ajax(
			{
				url: 'back.php',
				method: 'post',
				data:"del-id="+Delete_ID,
				success: function(data)
				{
					$("#delete").modal('hide');
					refData();
				}
			})
	})
})
//edit button
$(document).on('click','#btn_edit',function(e)
{
	e.preventDefault();
	$('#update').modal('show');
	var Id = $(this).attr('data-upd-id');
	var update_id = $(this).data("upd-id");
	$('#upd-id').val(update_id);
	$.ajax(
		{
			url: 'back.php',
			method: 'post',
			data:{"upd-id":Id,
		},
			success: function(data)
			{
			$('#upd-id').val();
			}
		})
})

$(document).on('click','#btn_update',function(e)
{
	e.preventDefault();
	$('#update').modal('show');
	var id = $('#upd-id').val();
    var name = $('#upd-name').val();
	var last = $('#upd-last').val();
	var role = $("#rol").val();
	var status = $("#stats")[0].checked;
	if (status === false) {
		status = '0';
	} 
	else if (status === true){
		status = '1';
	}
	if(name === "" || last === ""){
		alert("Please fill in the fields!");
		return false;
	}
	{
		$.ajax(
			{
				url: 'back.php',
				method: 'post',
				data:{
					"update": id,
					name: name,
					last: last,
					role: role,
					status: status,
				},
				success: function(data)
				{
				$("#update").modal('hide');
					refData();
				}
			})
	}
})

function refData() {
    $.ajax({
        type: "GET",
        url: 'get-info.php',
        success: function (response) {
            $('#content').html(response);
        },
    });
};
function errorData() {
	$('.alert.alert-warning').show();
	setTimeout(function() { 
		$('.alert.alert-warning').fadeOut(1000); 
	}, 1000);
};