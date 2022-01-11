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
    						<label >Title</label>
    						<input type="text" name ="title" class="form-control" required>
    					</div>
    				</div>
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >Company</label>
    						<input type="text" name ="company" class="form-control" required>
    					</div>
    				</div>
    				<div class="row form-group">
    					<div class="col-md-12">
    						<label >Description</label>
    						<input type="text" name ="description" class="form-control" required>
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
    				 @if(isset($jobs))
    				@foreach($jobs as $job)
        				<tr>
        					<td>{{$job['TITLE']}}</td>
        					
        				
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
    				 @if(isset($jobs))
    				@foreach($jobs as $job)
        				<tr>
        					<td>{{$job['COMPANY']}}</td>
        					
        				
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
    				 @if(isset($jobs))
    				@foreach($jobs as $job)
        				<tr>
        					<td>{{$job['DESCRIPTION']}}</td>
        					
        				
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