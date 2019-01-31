<div class="py-5 text-center">
    <h2>To do List</h2>
</div>
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
    	<a class="btn btn-primary btn-lg btn-block" href="index.php?controller=works&action=createWorks"><i class="fa fa-plus"></i></a>
    </div>
</div>

<div class="alert alert-success mt-3 collapse <?= ($_GET['insert_success'] == 1) ? 'show' : '';?>" role="alert">
  Create work successfull !!!
</div>

<div class="mt-3 bg-white p-5">
	<div id="calendar"></div>
</div>

<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="get">
                <input type="hidden" name="controller" value="works" />
                <input type="hidden" name="action" value="editWorks"  />
                <input type="hidden" name="id" id="workId" />
                <div class="modal-header">
                    <h5 class="modal-title" id="workName">Work title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="workWhen"></div>
                    <div id="workStatus"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            <form role="form">
        </div>
    </div>
</div>

<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} collapse" role="alert">
	<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>
	<span data-notify="icon"></span>
	<span data-notify="title">{1}</span>
	<span data-notify="message">{2}</span>
	<div class="progress" data-notify="progressbar">
		<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
	</div>
</div>