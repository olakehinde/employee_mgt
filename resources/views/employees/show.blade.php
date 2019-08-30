@extends('layouts.app')

@section('content')
	<div class="col-sm-6 col-md-d offset-md-3">
		<div class="card">
			<div class="card-header">
				<h3>{{ $employee->first_name . ' '. $employee->last_name }} <span class="small"> - {{ $employee->company['name'] }} </span></h3>
			</div>
			<div class="card-body">
				<div><b>Email:</b> {{ $employee->email }}</div>
				<div><b>Gender:</b> {{ $employee->gender }}</div>
			</div>
		</div>
	</div>
@endsection