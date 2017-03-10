@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">    	
        @if(Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
          
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td colspan="8" class="bg-primary" >
						<span class="glyphicon glyphicon-list"></span> Employee List
					</td>
				</tr>				
			</thead>
			<tbody>
				<tr><th>Name</th><th>Address</th><th>Mobile</th><th>Email</th><th>Joining Date</th><th>Salary</th><th>Role</th><th class="text-center">Actions</th></tr>
				<?php 
				$result = App\Employee::all();
				foreach ($result as $employee) {
				    echo '<tr>
				    		<td>'.$employee->name.'</td>
				    		<td>'.$employee->address.'</td>
				    		<td>'.$employee->mobile.'</td>
				    		<td>'.$employee->email.'</td>
				    		<td>'.$employee->dateOfJoinning.'</td><td>'.$employee->salary.' Rs.</td>
				    		<td>'.$employee->role.'</td>
				    		<td class="text-center">
				    			<a class="btn-xs btn-warning" href="edit-employee/'.$employee->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
				    			<a class="btn-xs btn-danger" onclick="checkDelete('.$employee->id.')" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i> Delete</a>
				    		</td>
				    	</tr>';
				}
				?>
			</tbody>
		</table>
    </div>
</div>
@endsection