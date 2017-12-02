	<script>
	$(document).ready(function(e){
		$('#Form').validate({
			rules:{
				field:{
					alphanumeric: true
				}
			}
		});
    });
    </script>