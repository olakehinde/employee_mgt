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
				<h2>Company Records</h2>
			</div>
			<div class="pull-right">
				<a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Company</a>
			</div>
		</div>
		@if(!isset($companies))
			<div class="px-3 mx-3 py-3 card">
				<h5>No Company created yet.</h5>
			</div>
		@else
		<table class="table">
			<thead class="thead-dark">
				<tr>
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
			      <td>{{ $company->name }}</td>
					<td>{{ $company->address }}</td>
					<td>{{ $company->email }}</td>
					<td>{{ is_null($company->sector) ? 'Not available' : $company->sector }}</td>
					<td>
						<div class="row">
							<div>
								<a href="{{ route('companies.show', $company->id)}}"><span class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</span>
								</a>
							</div>
							<div class="px-1">
								<a href="{{ route('companies.edit', $company->id)}}"><span class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</span>
								</a>
							</div>
							<div>
								<form action="{{ route('companies.destroy', $company->id)}}" method="post">
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