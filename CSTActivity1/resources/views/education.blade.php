<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
	  content ="width=device-width, user-scalable=no,maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content = "ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Job Openings</title>
</head>
<body>
	<div class="container-fluid">
    	<div class="row">
    		<div class="col-md-6">
    			<form action="addJob" method="post">
    				@csrf
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >School</label>
    						<input type="text" name ="school" class="form-control" required>
    					</div>
    				</div>
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >Degree</label>
    						<input type="text" name ="degree" class="form-control" required>
    					</div>
    				</div>
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >Field</label>
    						<input type="text" name ="field" class="form-control" required>
    					</div>
    				</div>
    				<div class="row form-group">
    					<div class="col-md-12">
    						<button type ="submit" class="btn btn-success w-50 float-right">Create</button>
    					</div>
    				</div>
    			</form>
    		</div>
    		<form>
    		<div class="col-md-6">
    			<table class="table table-striped table-hover">
    				<tr>
    					<th>Title</th>
    					
    				</tr>
    				 @if(isset($educations))
    				@foreach($educations as $e)
        				<tr>
        					<td>{{$e['SCHOOL']}}</td>
        					
        				
        				</tr>
        			@endforeach
        			@endif
    			</table>
    		</div>
    		
    		<div class="col-md-6">
    			<table class="table table-striped table-hover">
    				<tr>
    					<th>Company</th>
    					
    				</tr>
    				 @if(isset($educations))
    				@foreach($educations as $e)
        				<tr>
        					<td>{{$e['DEGREE']}}</td>
        					
        				
        				</tr>
        			@endforeach
        			@endif
    			</table>
    		</div>
    		
    		<div class="col-md-6">
    			<table class="table table-striped table-hover float-right">
    				<tr>
    					<th>Description</th>
    					
    				</tr>
    				 @if(isset($educations))
    				@foreach($educations as $e)
        				<tr>
        					<td>{{$e['FIELD']}}</td>
     				
        				</tr>       				
        			@endforeach
        			@endif
    			</table>
    		</div>
    		</form>
    	</div>
	</div>
</body>
</html>