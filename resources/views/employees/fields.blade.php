<div class="form-group">
  	<label for="name">Company Name:</label>
  	<input type="text" required="" class="form-control" name="name" value="{{ isset($company->name) ? $company->name : null}}"/>
</div>
<div class="form-group">
	<label for="price">Address:</label>
	<input type="text" required="" class="form-control" name="address" value="{{isset($company->address) ? $company->address : null}}"/>
</div>
<div class="form-group">
	<label for="quantity">Email:</label>
	<input type="text" required="" class="form-control" name="email" value="{{isset($company->email) ? $company->email : null }}"/>
</div>
<div class="form-group">
	<label for="quantity">Sector <small>(optional)</small>:</label>
	<input type="text" class="form-control" name="sector"  value="{{isset($company->sector) ? $company->sector : null}}"/>
</div>


