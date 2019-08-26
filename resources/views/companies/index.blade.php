@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row mx-3">
			<div class="col-sm-6 col-md-10 pull-left">
				<h3>Company Records</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-sm btn-primary">New Company</a>
			</div>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Company</th>
					<th scope="col">Address</th>
					<th scope="col">Email</th>
					<th scope="col">Sector</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
		  	<tbody>
		  		@foreach($companies as $company)
		  		<tr>
			      <th scope="row">{{ $company->id }}</th>
			      <td>{{ $company->name }}</td>
					<td>{{ $company->address }}</td>
					<td>{{ $company->email }}</td>
					<td>{{ is_null($company->sector) ? 'Not available' : $company->sector }}</td>
					<td>
						<a href="#"><span class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i> View</span>
						</a>
						<a href="#"><span class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i> Edit</span>
						</a>
						<a href="#"><span class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i> Delete</span>
						</a>
					</td>
			    </tr>
			    @endforeach
		  </tbody>
		</table>
	</div>
@endsection