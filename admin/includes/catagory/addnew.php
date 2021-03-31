<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Category:</h3>
    </div>
    <div class="card-body">
        <?php if(isset($cat_reg_ret)): ?>
            <div class="alert <?php echo $cat_reg_ret[0]; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?php echo $cat_reg_ret[1]; ?>
            </div>
        <?php endif?>
        <form method="post">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" name="catagoryNameEnter" placeholder="Enter Category Name.." class="form-control" required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category Keys:</label>
                        <button type="button" class="btn btn-tool float-right" id="btnCancleInput"></button>
                        <button type="button" class="btn btn-tool float-right mr-2" id="btnAddInput"><i class="fas fa-plus"></i></button>
                        <input id="counter" name="input_counter" hidden>
                        <input type="text" name="catagoryName0" placeholder="Enter Category Key #1.." class="form-control" required>
                        <input type="text" name="catagoryName1" id="one" placeholder="Enter Category Key #2.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName2" id="two" placeholder="Enter Category Key #3.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName3" id="three" placeholder="Enter Category Key #4.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName4" id="four" placeholder="Enter Category Key #5.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName5" id="five" placeholder="Enter Category Key #6.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName6" id="six" placeholder="Enter Category Key #7.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName7" id="seven" placeholder="Enter Category Key #8.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName8" id="eight" placeholder="Enter Category Key #9.." class="form-control mt-2" hidden>
                        <input type="text" name="catagoryName9" id="nine" placeholder="Enter Category Key #10.." class="form-control mt-2" hidden>
                    </div>
                </div>
            </div>
            <hr>
            <button class="btn btn-success float-right mr-5" name="btnRegisterCatagory">
                Register
            </button>
        </form>
   </div>
</div>