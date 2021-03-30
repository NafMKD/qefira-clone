
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Search for Items:</h3>
    </div>
    <div class="card-body">
        <div class="row">
        	<div class="col-md-4">
        		<form>
        			<label>General Search:</label>
        			<div class="form-group">
        				<input type="text" name="q" class="form-control" style="width: 80%;" required>
        			</div>
        			<button class="btn btn-primary float-right mr-5">
        				<i class="fas fa-search"></i>
        				Search
        			</button>
        		</form>
        	</div>
        	<div class="col-md-4">
        		<form>
        			<label>Search By ID:</label>
        			<div class="form-group">
        				<input type="text" name="i" class="form-control" style="width: 80%;" required>
        			</div>
        			<button class="btn btn-primary float-right mr-5">
        				<i class="fas fa-search"></i>
        				Search
        			</button>
        		</form>
        	</div>
        	<div class="col-md-4">
        		<form>
        			<label>Filter By Category:</label>
        			<div class="form-group">
        				<select class="form-control select2" name="c" required>
        					<?php foreach($catagories as $key):?>
        						<option value="<?php echo $key['cat_id'];?>"><?php echo ucwords($key['name']);?></option>
        					<?php endforeach?>
        				</select>
        			</div>
        			<button class="btn btn-primary float-right mr-5">
        				<i class="fas fa-search"></i>
        				Search
        			</button>
        		</form>
        	</div>
        </div>
    </div>
</div>