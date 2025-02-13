
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Add Temporary Transfer</h1>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=store&query=add-temporary-transfer" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
    <div class="col-sm-3">
      <label class="col-form-label">Item Code <span class="mendetory">*</span></label>
      <input type="text" value="" class="form-control form-control-sm" name="item_code" required>
    </div>
    <div class="col-sm-3">
      <label class="col-form-label">Date <span class="mendetory">*</span></label>
      <input type="date" value="" class="form-control form-control-sm" name="date" required>
    </div>
    <div class="col-sm-3">
      <label class="col-form-label">Time <span class="mendetory">*</span></label>
      <input type="time" value="" class="form-control form-control-sm" name="time" required>
    </div>
  
    <div class="col-sm-3">
      <label class="col-form-label">User Name <span class="mendetory">*</span></label>
      <select class="form-control form-control-sm" name="user_name" required>
        <option value="">Select User</option>
        <!-- Add user options here -->
        <option value="user1">User 1</option>
        <option value="user2">User 2</option>
        <!-- ... -->
      </select>
    </div>
    <div class="col-sm-3">
      <label class="col-form-label">Qty <span class="mendetory">*</span></label>
      <input type="number" value="" class="form-control form-control-sm" name="qty" required>
    </div>

    <div class="col-sm-3"><br><br>
      <input type="submit" name="submit" value="Save" class="btn btn-success">
      <input type="reset" name="reset" value="Reset" class="btn btn-info">
</div>

  </div>
</form>

          </div>

        </div>
      </div>
</div>

