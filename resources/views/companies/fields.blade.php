<div class="form-group">
  	<label for="name">Company Name:</label>
  	<input type="text" required="" class="form-control" name="name" value="{{$company->name}}"/>
</div>
<div class="form-group">
	<label for="price">Address:</label>
	<input type="text" required="" class="form-control" name="address" value="{{$company->address}}"/>
</div>
<div class="form-group">
	<label for="quantity">Email:</label>
	<input type="text" required="" class="form-control" name="email" value="{{$company->email}}"/>
</div>
<div class="form-group">
	<label for="quantity">Sector <small>(optional)</small>:</label>
	<input type="text" class="form-control" name="sector"  value="{{$company->sector}}"/>
</div>


