@extends('layouts.appmaster') @section('title','HomePage')

@section('content')
 <a href="logout">Log out</a>
<div class="containerfull">
	
	
                <!-- Fixed header table-->
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                
                                <th scope="col" class="col-3">Name</th>
                               <th scope="col" class="col-3">View Profile</th>
                                <th scope="col" class="col-3">Suspend</th>
                                 <th scope="col" class="col-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @if(isset($users))
						@foreach ($users as $u)
                            <tr>
                            
                                <td class="col-3">{{ $u['FIRSTNAME']}}</td>
                                
                               <td class="col-3"><form action="userProfile" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token()}}" /> <input
								type="hidden" name="userid" value="{{ $u['ID'] }}" />
								 <input type="submit" class="btn btn-secondary btn-large" value="View Profile" />
								</form></td>
								
                               
                               <td class="col-3"><form action="suspendUser" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token()}}" /> <input
								type="hidden" name="userid" value="{{ $u['ID'] }}" />
								 <input type="submit" class="btn btn-secondary btn-large" value="Suspend" />
								</form></td>
								
							<td class="col-3"><form action="deleteUser" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token()}}" /> <input
								type="hidden" name="userid" value="{{ $u['ID'] }}" />  <input
								type="submit" class="btn btn-secondary btn-large"
								value="delete" />
						</form></td>
						
						</tr>
                   		@endforeach   
                   		@endif
                        </tbody>

                    </table>
                </div><!-- End -->
                
     
         <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
</div>
@endsection