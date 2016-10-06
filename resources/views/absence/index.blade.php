<!DOCTYPE html>
<html>
<head>
	<title>Absen Cavis Nindya 9G</title>
	<link href="{{asset('/css/app.css')}}" rel="stylesheet">
	<script   src="http://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
</head>
<body>
    	{{ Form::text('nim') }}
    	<button type="button" class="btn btn-success" id="btn-logging">Log IN/OUT</button>
    	<div id="msg">
    		
    	</div>

    <script>
    	$('#btn-logging').click(function(event) {
	    	$.ajax({
	    		url: "{{action('PicketController@logging')}}",
	    		type: 'POST',
	    		data: {
	    			nim: $("input[name='nim']").val()
	    		},
	    		success: function(result) {
	    			console.log(result);
	    			$('#msg').text(result.message);
	    		},
	    		error: function(xhr) {
	    			console.log(xhr.responseText);
	    		}
	    	})
    	});
    	
    </script>
</body>
</html>