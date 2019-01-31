<div class="py-5 text-center">
    <h2>Create To do List</h2>
</div>
<div class="row">
	<div class="col-md-12 order-md-1">
      	<form class="needs-validation" action="index.php?controller=works&action=addWorks" novalidate method="post">
            <div class="mb-3">
                <label for="workName">Work Name *</label>
                <input type="text" class="form-control" id="workName" name="name" maxlength="100" value="<?= (isset($_POST['name'])) ? $_POST['name'] : ''; ?>" required>
                <div class="invalid-feedback"> Please enter work name. </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="startDate">Start Date *</label>
                    <input type="datetime-local" class="form-control" id="startDate" name="startDate" 
                    	value="<?= (isset($_POST['startDate'])) ? $_POST['startDate'] : ''; ?>"
                    	onchange="form.endDate.min = this.value;"
                    	pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
                	<div class="invalid-feedback"> Please enter start date. </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="endDate">End Date *</label>
                    <input type="datetime-local" class="form-control" id="endDate" name="endDate"  
                    	value="<?= (isset($_POST['endDate'])) ? $_POST['endDate'] : ''; ?>"
                    	onchange="form.startDate.max = this.value;"
                		pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
                	<div class="invalid-feedback"> Please enter end date. </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="jobPriority">Status</label>
                <select class="custom-select d-block w-100" id="status" name="status" required>
                  <option value="Planning" selected>Planning</option>
                  <option value="Doing">Doing</option>
                  <option value="Complete">Complete</option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="Submit">Create</button>
                <button type="button" class="btn btn-secondary" id="gotoList">Cancel</button>
            </div>
        </form>
    </div>
</div>