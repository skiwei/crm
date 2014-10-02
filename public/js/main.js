$(function()
{
	$('input[data-confirm], button[data-cofirm]').on('click', function(e)
	{
		var input = $(this);		
		var form = input.closest('form');
		
		e.preventDefault();		
		input.prop('disabled', 'disabled');		
		
		bootbox.confirm(input.data('confirm'), function(result)
		{
			if (result) 
			{
				form.submit();
			}
		});
		
		input.removeAttr('disabled');
	});
	
	$('form[data-remote]').on('submit', function(e)
	{
		var form = $(this);
		var method = form.find("input[name='_method']").val() || 'POST';
		var url = form.prop('action');
		
		$.ajax({
		    type : method,
			url : url,
			data : form.serialize(),
			success : function()
			{
				var message = form.data('remote-sucess-message');
			}
		});
		
		e.preventDefault();
	});
});