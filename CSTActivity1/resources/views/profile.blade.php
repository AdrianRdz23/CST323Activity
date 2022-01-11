@extends('layouts.appmaster') @section('title','HomePage')

@section('content')
<div class="containerfull">
	
	
                <!-- Fixed header table-->
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                
                                <th scope="col" class="col-3">Firstname</th>
                               <th scope="col" class="col-3">Lastname</th>
                                 <th scope="col" class="col-3">Email </th>
                                 <th scope="col" class="col-3">Age </th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($users))
						@foreach ($users as $u)
                             <td class="col-3">{{ $u['FIRSTNAME']}}</td>
                             <td class="col-3">{{ $u['LASTNAME']}}</td>
                             <td class="col-3">{{ $u['EMAIL']}}</td>
                             <td class="col-3">{{ $u['AGE']}}</td>
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