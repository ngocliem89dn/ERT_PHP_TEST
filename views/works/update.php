<div class="py-5 text-center">
    <h2>Update To do List</h2>
</div>
<div class="alert alert-success collapse <?= ($_GET['update_success'] == 1) ? 'show' : '';?>" role="alert">
  Update successfull !!!
</div>
<div class="alert alert-danger collapse <?= ($_GET['update_success'] == 2) ? 'show' : '';?>" role="alert">
  Update failed !!!
</div>
<div class="row">
	<div class="col-md-12 order-md-1">
      	<form class="needs-validation" action="index.php?controller=works&action=updateWorks" novalidate method="post">
        	<input type="hidden" name="id" value="<?= $work->id;?>"  />
            <div class="mb-3">
                <label for="workName">Work Name *</label>
                <input type="text" class="form-control" id="workName" name="name" maxlength="100" value="<?= $work->name; ?>" required>
                <div class="invalid-feedback"> Please enter work name. </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="startDate">Start Date *</label>
                    <input type="datetime-local" class="form-control" id="startDate" name="startDate" 
                    	value="<?= date("Y-m-d\TH:i", strtotime($work->startDate)); ?>"
                    	onchange="form.endDate.min = this.value;"
                    	pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
                	<div class="invalid-feedback"> Please enter start date. </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="endDate">End Date *</label>
                    <input type="datetime-local" class="form-control" id="endDate" name="endDate"  
                    	value="<?= date("Y-m-d\TH:i", strtotime($work->endDate)); ?>"
                    	onchange="form.startDate.max = this.value;"
                		pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
                	<div class="invalid-feedback"> Please enter end date. </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="jobPriority">Status</label>
                <select class="custom-select d-block w-100" id="status" name="status" required>
                  <option value="Planning" <?= ($work->status == 'Planning') ? 'selected' : ''; ?>>Planning</option>
                  <option value="Doing" <?= ($work->status == 'Doing') ? 'selected' : ''; ?>>Doing</option>
                  <option value="Complete" <?= ($work->status == 'Complete') ? 'selected' : ''; ?>>Complete</option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="Submit">Update</button>
                <button type="button" class="btn btn-secondary" id="gotoList">Cancel</button>
            </div>
        </form>
    </div>
</div>