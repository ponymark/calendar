$(document).ready(function() {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        // put your options and callbacks here
        locale: 'zh-tw',

        //height: $( window ).height(),


		theme: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listMonth'
		},
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events


 		events: 'source.php',

 		dayClick: function(date, jsEvent, view) {
	        $.fancybox.open({
				src  : '#hidden-content',
				type : 'inline',
				opts : {
					onComplete : function() {
						console.info('done!');
					}
				}
			});

			$('#date').text($.fullCalendar.formatDate(date,'YYYY-MM-DD'));

				//
				//$.fancybox.close(this);


		},
		eventClick: function(calEvent, jsEvent, view) {
			$.fancybox.open({
				src  : '#hidden-content2',
				type : 'inline',
				opts : {
					onComplete : function() {
						console.info('done!');
					}
				}
			});
			$('#date2').text($.fullCalendar.formatDate(calEvent.start,'YYYY-MM-DD'));
			$('#name2').text(calEvent.title);
			$('#eventid').text(calEvent.id);
    	}
    });

	$('#add').unbind("click");
    $('#add').click(function(e){

		$.ajax({
			url: "insert.php",
			type: "POST",
			dataType: 'text',
			data: 'date='+$('#date').text()+'&name='+$('#name').val(),
			success:function(json)
			{
				
			    $('#name').val("");
				$('#calendar').fullCalendar( 'refetchEvents' );
			}
			,error:function(json){
				
			}
		});
		
		$.fancybox.close(this);
	});

    $('#delete').unbind("click");
    $('#delete').click(function(e){

		$.ajax({
			url: "delete.php",
			type: "POST",
			dataType: 'text',
			data: 'id='+$('#eventid').text(),
			success:function(json)
			{
				$('#calendar').fullCalendar( 'refetchEvents' );
			}
			,error:function(json){

			}
		});
		
		$.fancybox.close(this);
	});

})