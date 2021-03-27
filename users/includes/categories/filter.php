<form>
	<input type="text" class="form-control" value="<?php echo $_GET['c']; ?>">
	<div class="form-group">
		<label>Sort By</label>
		<select class="form-control">
			<option>Newest</option>
			<option>Oldest</option>
			<option>Price (Low-High)</option>
			<option>Price (High-Low)</option>
		</select>
	</div>
	<div class="form-group">
		<label>Region</label>
		<select class="form-control">
			<option>Newest</option>
			<option>Oldest</option>
			<option>Price (Low-High)</option>
			<option>Price (High-Low)</option>
		</select>
	</div>
	<button type="submit" class="btn btn-sm btn-info float-right"><i class="fas fa-filter mr-2"></i>Filter</button>
</form>
<hr>
<label>Categories</label>
<ul class="list-unstyled" style="font-size: 15px;">
	<li>
		<a href="" class="nav-link text-dark"><i class="fas fa-desktop text-red mr-2"></i> Electronics</a>
	</li>
	<li>
		<a href="" class="nav-link text-dark"><i class="fas fa-home text-red mr-2"></i> Home, Garden & Kids</a>
	</li>
	<li>
		<a href="" class="nav-link text-dark"><i class="fas fa-car text-red mr-2"></i> Vehicles</a>
	</li>
	<li>
		<a href="" class="nav-link text-dark"><i class="fas fa-wrench text-red mr-2"></i> Car Parts & Accessories</a>
	</li>
</ul>