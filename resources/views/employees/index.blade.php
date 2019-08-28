@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row mx-3">
			@if(session()->has('success'))
	            <div class="alert alert-success">
	                {{ session()->get('success') }}
	            </div>
	            @elseif(session()->has('error'))
	            <div class="alert alert-error">
	                {{ session()->get('error') }}
	            </div>
	        @endif
			<div class="col-sm-6 col-md-10 pull-left">
				<h2>Employees Record</h2>
			</div>
			<div class="pull-right">
				<a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Employee</a>
			</div>
		</div>
		@if(!isset($employees))
			<div class="px-3 mx-3 py-3 card">
				<h5>No Employee created yet.</h5>
			</div>
		@else
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Gender</th>
					<th scope="col">Email</th>
					<th scope="col">Company name</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
		  	<tbody>
		  		@foreach($employees as $employee)
		  		<tr>
			      <td>{{ $employee->first_name .' '.$employee->last_name }}</td>
					<td>{{ $employee->gender }}</td>
					<td>{{ $employee->email }}</td>
					<td>{{ $employee->company['name'] }}</td>
					<td>
						<div class="row">
							<div>
								<a href="{{ route('employees.show', $employee->id)}}"><span class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</span>
								</a>
							</div>
							<div class="px-1">
								<a href="{{ route('employees.edit', $employee->id)}}"><span class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</span>
								</a>
							</div>
							<div>
								<form action="{{ route('employees.destroy', $employee->id)}}" method="post">
				                  	@csrf
				                  	@method('DELETE')
				                  	<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> Delete</button>
				                </form>
							</div>
						</div>
					</td>
			    </tr>
			    @endforeach
		  </tbody>
		</table>
		@endif
	</div>
@endsection