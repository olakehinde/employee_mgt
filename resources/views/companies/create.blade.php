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
				<i class="fa fa-plus"></i> New Company
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
				<form method="post" action="{{ route('companies.store') }}">
					<div class="form-group">
					  @csrf
					  <label for="name">Company Name:</label>
					  <input type="text" class="form-control" name="name"/>
					</div>
				  	<div class="form-group">
				      	<label for="price">Address:</label>
				      	<input type="text" class="form-control" name="address"/>
				  	</div>
				  	<div class="form-group">
				      	<label for="quantity">Email:</label>
				      	<input type="text" class="form-control" name="email"/>
				  	</div>
				  	<div class="form-group">
				      	<label for="quantity">Sector <small>(optional)</small>:</label>
				      	<input type="text" class="form-control" name="sector"/>
				  	</div>
				  	<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Create Company</button>
				</form>
		  	</div>
		</div>
	</div>
</div>

@endsection