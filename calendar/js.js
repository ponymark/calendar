$(document).ready(function() {
    $('#calendar').fullCalendar({
        locale: 'zh-tw',

		theme: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listMonth'
		},
		navLinks: true, 
		editable: true,
		eventLimit: true,


 		events: 'source.php',

 		dayClick: function(date, jsEvent, view) {

 			$('#date').text($.fullCalendar.formatDate(date,'YYYY-MM-DD'));

 			$(this).popover({
            	html: true,
            	placement: 'auto',
            	title: function() {
            	},
            	content: function() {
            	    return $("#hidden-content").html();
            	},container: 'body'
        	});

			$(this).popover('toggle');


 			$('.popover-content p #add').unbind("click");
    		$('.popover-content p #add').click(function(e){

				$.ajax({
					url: "insert.php",
					type: "POST",
					dataType: 'text',
					data: 'date='+$('#date').text()+'&name='+$('.popover-content p #name').val(),
					success:function(json)
					{
				
					    $('#name').val("");
						$('#calendar').fullCalendar( 'refetchEvents' );
					}
					,error:function(json){
						
					}
				});
				$('.popover').popover('hide');
			});
		},
		eventClick: function(calEvent, jsEvent, view) {
			$('.popover').popover('hide');
			$('#test').css("display","block");
			$('#calendar').css("display","none");
			$('#date3').text($.fullCalendar.formatDate(calEvent.start,'YYYY-MM-DD'));
			$('#name3').val(calEvent.title);
			$('#eventid2').text(calEvent.id);
    	}
    });

    $('#update').unbind("click");
    $('#update').click(function(e){

		$.ajax({
			url: "update.php",
			type: "POST",
			dataType: 'text',
			data: 'id='+$('#eventid2').text()+'&date='+$('#date3').text()+'&name='+$('#name3').val(),
			success:function(json)
			{
				
			    $('#name3').val("");
				$('#calendar').fullCalendar( 'refetchEvents' );
			}
			,error:function(json){
				
			}
		});
		
		$('#calendar').css("display","block");
		$('#test').css("display","none");
	});


	$('#delete2').unbind("click");
    $('#delete2').click(function(e){

		$.ajax({
			url: "delete.php",
			type: "POST",
			dataType: 'text',
			data: 'id='+$('#eventid2').text(),
			success:function(json)
			{
				$('#calendar').fullCalendar( 'refetchEvents' );
			}
			,error:function(json){

			}
		});
		
		$('#calendar').css("display","block");
		$('#test').css("display","none");
	});

    $('#comeback').unbind("click");
    $('#comeback').click(function(e){
    	$('#calendar').css("display","block");
		$('#test').css("display","none");

	});

    $('#ttt2').unbind("click");
    $('#ttt2').click(function(e){
    	$('#jjj2 option:selected').each(function(i,selected){
    		$('#jjjj2').append('<option value=\"'+$(selected).text()+'\">'+$(selected).text()+'</option>');
    		});
		
    	$('#jjj2 option:selected').remove();
	});
    $('#tttt2').unbind("click");
    $('#tttt2').click(function(e){
    	$('#jjjj2 option:selected').each(function(i,selected){
    		$('#jjj2').append('<option value=\"'+$(selected).text()+'\">'+$(selected).text()+'</option>');
    		});

       	$('#jjjj2 option:selected').remove();
	});
})