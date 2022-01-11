<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
	  content ="width=device-width, user-scalable=no,maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content = "ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Skill </title>
</head>
<body>
	<div class="container-fluid">
    	<div class="row">
    		<div class="col-md-6">
    			<form action="addJob" method="post">
    				@csrf
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >Skill</label>
    						<input type="text" name ="skill" class="form-control" required>
    					</div>
    				</div>

    			</form>
    		</div>
    		<form>
    		<div class="col-md-6">
    			<table class="table table-striped table-hover">
    				<tr>
    					<th>Skill</th>
    					
    				</tr>
    				 @if(isset($skills))
    				@foreach($skills as $skill)
        				<tr>
        					<td>{{$skill['SKILL']}}</td>
        					
        				
        				</tr>       				
        			@endforeach
        			@endif
    			</table>
    		</div>
    		

    			</table>
    		</div>
    		</form>
    	</div>
	</div>
</body>
</html>