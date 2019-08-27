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
						<a href="{{ route('companies.show', $company->id)}}"><span class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </span>
						</a>
						<a href="{{ route('companies.edit', $company->id)}}"><span class="btn btn-sm btn-success"><i class="fa fa-edit"></i> </span>
						</a>

						<form action="{{ route('companies.destroy', $company->id)}}" method="post">
		                  	@csrf
		                  	@method('DELETE')
		                  	<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> </button>
		                </form>
					</td>
			    </tr>
			    @endforeach
		  </tbody>
		</table>
	</div>
@endsection