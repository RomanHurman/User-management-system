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
			$("#delete").modal('show');
		}
				$(document).on('click','#btn_delete_record',function()
			{			
				var selected_values = user.join(","); 
				$.ajax({ 
					type: "POST",  
					url: "back.php",  
					cache:false,  
					data: 
					'id='+selected_values, 
					success: function(data) {
						$('#delete').modal('hide');
						refData();								
					}   
				});	
			})			
			}
	// select choiceUp
	if (conceptState == 'choiceUp') {    
		$(".us_checkbox:checked").each(function() {  
			user.push($(this).data('sample-id'));
		});	
		if(user.length <=0)  {   
			errorData();
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
		$("#exchange").modal('show');  
	}
	$(document).on('click','#activs',function()
	{		
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false, 
				data:
					'sample-id='+selected_values,
				success: function(data) {
					$("#exchange").modal('hide');
						refData();							
				}   
			});	
		})			
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
		$("#exchange-status").modal('show'); 
	}
	$(document).on('click','#activs',function()
	{	
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false,  
				data:	
					'samp-id='+selected_values,
				success: function(data) {
					$("#exchange-status").modal('hide');	
					refData();						
				}   
			});	
		})			
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
			$("#delete").modal('show');
		}
		$(document).on('click','#btn_delete_record',function()
		{	  			
				var selected_values = user.join(","); 
				$.ajax({ 
					type: "POST",  
					url: "back.php",  
					cache: false,  
					data: 
					'id='+selected_values, 
					success: function(response) {	
						$('#delete').modal('hide');
						refData();							
					}   
				});	
			})			
			}
	// select choiceDown
	if (concept == 'choiceDown') {    
		$(".us_checkbox:checked").each(function() {  
			user.push($(this).data('sample-id'));
		});	
		if(user.length <=0)  {   
			errorData();
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
		$("#exchange").modal('show');  
	}
	$(document).on('click','#activs',function()
	{	
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false, 
				data:
					'sample-id='+selected_values,
				success: function(response) {
					$("#exchange").modal('hide');
					refData();					
				}   
			});	
			})			
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
		$("#exchange-status").modal('show'); 
	}
	$(document).on('click','#activs',function()
	{		
			var selected_values = user.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "back.php",  
				cache:false,  
				data:	
					'samp-id='+selected_values,
				success: function(response) {
					$("#exchange-status").modal('hide');
					refData();							
				}   
			});
		})				
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
			$('.results').show().text('Please fill in the fields!');
		setTimeout(function() { 
		$('.results').fadeOut(1000); 
			}, 1000);
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
				$("#luck").modal('show');
				$("#myModal").modal('hide');
				setTimeout(function() { 
					$('#luck').modal('hide'); 
				}, 3000);
					refData();
					$('#name').val("");
					$('#last').val("");
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
	$("#delete").modal('show');
	$(document).on('click','#btn_delete_record',function()
	{
		$.ajax(
			{
				url: 'back.php',
				method: 'post',
				data:"del-id="+Delete_ID,
				success: function(data)
				{
					$("#luck").modal('show');
					$('#delete').modal('hide');
					setTimeout(function() { 
					$('#luck').modal('hide'); 
				}, 3000);
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
	var update_name = $(this).data("upd-name");
	var update_last = $(this).data("upd-last");
	console.log(update_id);
	console.log(update_name);
	console.log(update_last);
	$('#upd-id').val(update_id);
	$('#upd-name').val(update_name);
	$('#upd-last').val(update_last);
	$.ajax(
		{
			url: 'back.php',
			method: 'post',
			data:{"upd-id":Id,
				"upd-name": update_name,
				"upd-last": update_last
		},
			success: function(data)
			{
			$('#upd-id').val();
			$('#upd-name').val();
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
		$('.res').show().text('Please fill in the fields!');
		setTimeout(function() { 
			$('.res').fadeOut(1000); 
		}, 1000);
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
				$("#luck").modal('show');
				$("#update").modal('hide'); 
				setTimeout(function() { 
					$('#luck').modal('hide'); 
				}, 3000);
				$('#upd-name').val();
					refData();
				}
			})
	}
})
function refData() {
    $.ajax({
        type: "POST",
        url: 'get-info.php',
        success: function (response) {
            $('#content').html(response);
        },
    });
};
function errorData() {
	$('#mistake').modal('show');
		setTimeout(function() { 
		$('#mistake').modal('hide'); 
	}, 3000);
};