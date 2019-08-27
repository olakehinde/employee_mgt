@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		@if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-error">
                {{ session()->get('error') }}
            </div>
        @endif
		<div class="card mt-5">
			<div class="card-header">
				<i class="fa fa-edit"></i> Edit Company
			</div>
		  	<div class="card-body">
			    @if ($errors->any())
					<div class="alert alert-danger">
						<ul>
						    @foreach ($errors->all() as $error)
						      <li>{{ $error }}</li>
						    @endforeach
						</ul>
					</div><br />
			    @endif
				
				<form method="post" action="{{ route('companies.update', $company->id) }}">
					@csrf
					@method('PATCH')
					@include('companies.fields')
					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
				</form>
		  	</div>
		</div>
	</div>
</div>

@endsection