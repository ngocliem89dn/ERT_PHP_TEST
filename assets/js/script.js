(function() {
    'use strict';

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
		
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
		
        var el = document.getElementById('gotoList');
        if(el){
            el.addEventListener('click',function () {
                location.href = "index.php";
            }, false);
        }
    }, false);
	
    setTimeout(function() { 
        $(".alert").fadeOut(1000); 
    }, 2000);
	
	
	
    var calendar = $('#calendar').fullCalendar({
        header:{
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        defaultView: 'listWeek',
        editable: true,
        selectable: true,
        allDaySlot: false,
            
        events: "index.php?controller=works&action=listJsonWorks",
   
        eventClick:  function(event, jsEvent, view) {
            var endtime = event.end.format('h:mm');
            var starttime = event.start.format('dddd, MMMM Do YYYY, h:mm');
            var mywhen = starttime + ' - ' + endtime;
            $('#workName').html(event.title);
            $('#workWhen').text(mywhen);
            $('#workId').val(event.id);
            $('#workStatus').text(event.status);
            $('#calendarModal').modal();
        },
            
		//header and other values
		select: function(start, end, jsEvent) {},
		
        eventDrop: function(event, delta){
            $.ajax({
                url: 'index.php?controller=works&action=updateWorks',
                data: 'name='+event.title+'&startDate='+moment(event.start).format()+'&endDate='+moment(event.end).format()+'&status='+event.status+'&id='+event.id ,
                type: "POST",
                success: function(json) {
                    $.notify({
                        title: "Update work success",
                        message : ""
                    },{
						type: 'success',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
			   },
			   error: function (xhr, ajaxOptions, thrownError) {
					$.notify({
						title: "Update work failed",
						message : ""
					},{
						type: 'danger',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
				}
		   });
	   },
	   
	   eventResize: function(event) {
		   $.ajax({
			   url: 'index.php?controller=works&action=updateWorks',
			   data: 'name='+event.title+'&startDate='+moment(event.start).format()+'&endDate='+moment(event.end).format()+'&status='+event.status+'&id='+event.id ,
			   type: "POST",
			   success: function(json) {
				   $.notify({
						title: "Update work success",
						message: ""
					},{
						type: 'success',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
			   },
			   error: function (xhr, ajaxOptions, thrownError) {
					$.notify({
						title: "Update work failed",
						message : ""
					},{
						type: 'danger',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
                    });
                }
            });
        },   
    });
		
		
               
    $('#submitButton').on('click', function(e){
        e.preventDefault();
        doSubmit();
        });
       
    $('#deleteButton').on('click', function(e){
        e.preventDefault();
        doDelete();
    });
       
    function doDelete(){
        $("#calendarModal").modal('hide');
        var workID = $('#workId').val();
        $.ajax({
		   url: 'index.php?controller=works&action=deleteWorks',
		   data: 'id='+workID,
		   type: "POST",
		   success: function(json) {
			   if(json == 1) {
					$("#calendar").fullCalendar('removeEvents',workID);
					$.notify({
						title: "Delete work success",
						message : ""
					},{
						type: 'success',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
			   } else {
					$.notify({
						title: "Delete work failed",
						message : ""
					},{
						type: 'danger',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
			   }
		   },
		   error: function (xhr, ajaxOptions, thrownError) {
					$.notify({
						title: "Delete work failed",
						message : ""
					},{
						type: 'danger',
						timer: 1000,
						placement: {
							from: "bottom",
							align: "right"
                    },
                });
            }
        });
    }
})(); 