<div class="form-group">
  	<label for="name">First Name:</label>
  	<input type="text" required="" class="form-control" name="f_name" value="{{ isset($company->name) ? $company->name : null}}"/>
</div>
<div class="form-group">
  	<label for="name">Last Name:</label>
  	<input type="text" required="" class="form-control" name="l_name" value="{{ isset($company->name) ? $company->name : null}}"/>
</div>
<div class="form-group row pl-3">
	<label for="gender">Gender</label>
	<div class="custom-control custom-radio px-5">
	    <input type="radio" class="custom-control-input" id="gender" name="gender" value="Male">
	    <label class="custom-control-label" for="gender">Male</label>
	</div>

	<div class="custom-control custom-radio">
	    <input type="radio" class="custom-control-input" id="gender" name="gender" value="Female">
	    <label class="custom-control-label" for="gender">Female</label>
	</div>
</div>
<div class="form-group">
	<label for="quantity">Email:</label>
	<input type="text" required="" class="form-control" name="email" value="{{isset($company->email) ? $company->email : null }}"/>
</div>
<div class="form-group">
	<label for="company">Company</label>
	<select class="form-control" name="company">
		<option class="" selected="selected" disabled="disabled">Select Company</option>
		@foreach($companies as $company)
			<option value="{{$company->id}}">{{$company->name}}</option>
		@endforeach
	</select>
</div>