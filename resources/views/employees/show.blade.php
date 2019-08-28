@extends('layouts.app')

@section('content')
	<div class="col-sm-6 col-md-d offset-md-3">
		<div class="card">
			<div class="card-header">
				<h3>{{ $company->name }}</h3>
			</div>
			<div class="card-body">
				<div><b>Address:</b> {{ $company->address }}</div>
				<div><b>Email:</b> {{ $company->email }}</div>
				<div><b>Sector:</b> {{ $company->sector ? $company->sector : 'Not Available' }}</div>
			</div>
		</div>
	</div>
@endsection