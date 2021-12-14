$(document).ready(function(evt){
		$('#btnlogin').on('click', function(e){
				e.preventDefault();

				$('#frmlogin').submit();
		});

	        if(window.location.hash=="#passwordresetsuccess"){
        		        shownotif('success', 'Your password has been reset, you may now log in.');
        	}

});
