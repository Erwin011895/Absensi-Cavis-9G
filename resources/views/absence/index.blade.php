<!DOCTYPE html>
<html>
<head>
	<title>Absen Cavis Nindya 9G</title>
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<script   src="http://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
</head>
<body style="background-image: url({{asset('img/absensi-cavis-9g.png')}});">
	<div id="input-groups">
    	<input type="text" name="nim" placeholder="Your nim here" size="17" id="input-nim">
    	<button type="button" class="" id="btn-logging">Log IN/OUT</button>
    	<div id="msg">
    		
    	</div>
	</div>

	<div id="cavis-log">
		<ol id="ol-log">
			
		</ol>
	</div>

    <script>
	    function getLoginList() {
	    	console.log("getLoginList");
	    	$.ajax({
	    		url: "{{action('PicketController@getLoginList')}}",
	    		type: 'GET',
	    		data: {
	    			
	    		},
	    		success: function(result) {
	    			console.log(result);

	    			$('#ol-log').empty();
	    			for (var i = 0; i < result.cavisName.length; i++) {
	    				$('#ol-log').append('<li>' + result.cavisName[i] + '</li>');
	    			}
	    		},
	    		error: function(xhr) {
	    			console.log(xhr.responseText);
	    		}
	    	});
	    }

    	$(document).ready(function() {
    		getLoginList();
	    	$('#btn-logging').click(function(event) {
		    	$.ajax({
		    		url: "{{action('PicketController@logging')}}",
		    		type: 'POST',
		    		data: {
		    			nim: $("input[name='nim']").val()
		    		},
		    		success: function(result) {
		    			console.log(result);
		    			$('#msg').html(result.message);
		    			$("input[name='nim']").val("");
		    			getLoginList();
		    		},
		    		error: function(xhr) {
		    			console.log(xhr.responseText);
		    		}
		    	});
	    	});
    		
    	});
    	
    </script>
</body>
</html>