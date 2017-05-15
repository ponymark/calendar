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
		overlap: false,

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
			$('#tt2').val(calEvent.content);


			$('#jjjj2 option').remove();//清空jjjj2 jjj2
			$('#jjj2 option').remove();

			$.ajax({
				url: "source2.php",
				type: "POST",
				dataType: 'text',
				data: 'aid='+calEvent.id+'&not=',
				success:function(json)
				{
					if(json!='It is null!'){
						var rr=jQuery.parseJSON(json);
						for(k in rr)
						{
							$('#jjjj2').append('<option value=\"'+rr[k].id+'\">'+rr[k].name+'</option>');
							console.log(k,rr[k]);
						}//將ajax activity and older 中與該activity符合的紀錄 到jjjj2(已選擇人員)
				    }
				}
				,error:function(json){
				
				}
			});

			$.ajax({
				url: "source2.php",
				type: "POST",
				dataType: 'text',
				data: 'aid='+calEvent.id+'&not=not',
				success:function(json)
				{
					if(json!='It is null!'){
						var rr2=jQuery.parseJSON(json);
						for(k2 in rr2)
						{
							$('#jjj2').append('<option value=\"'+rr2[k2].id+'\">'+rr2[k2].name+'</option>');
							console.log(k2,rr2[k2]);
						}//將ajax activity and older 中與該activity不符合的紀錄 到jjj2(未選擇人員)
					}
					
			    
				}
				,error:function(json){
				}
			});
			//並把剩下不符合的 從older中抓出"沒有"參與activity的older 也抓到jjj2(未選擇人員)
		}

    });

    $('#update').unbind("click");
    $('#update').click(function(e){

    	//ajax要寫的更複雜 把下拉式列表中的選擇結果一併傳回去更新
		$.ajax({
			url: "update.php",
			type: "POST",
			dataType: 'text',
			data: 'id='+$('#eventid2').text()+'&date='+$('#date3').text()+'&name='+$('#name3').val()+'&content='+$('#tt2').val(),
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

		$.ajax({
			url: "delete2.php",
			type: "POST",
			dataType: 'text',
			data: 'aid='+$('#eventid2').text(),
			success:function(json)
			{
				var temp='&oid=';
				$('#jjjj2 option').each(function(i,selected){
    				temp+=$(selected).val()+'~';
    			});
				temp.trim('~');
				$.ajax({
					url: "update2.php",
					type: "POST",
					dataType: 'text',
					data: 'aid='+$('#eventid2').text()+temp,
					success:function(json)
					{
				
			    
					}
					,error:function(json){
				
					}
				});
			    
			}
			,error:function(json){
				
			}
		});
	});


	$('#delete2').unbind("click");
    $('#delete2').click(function(e){

    	//delet也一樣 ajax要寫的更複雜 把下拉式列表中的相關選擇結果一併傳回去刪除
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
    		$('#jjjj2').append('<option value=\"'+$(selected).val()+'\">'+$(selected).text()+'</option>');
    		});
		
    	$('#jjj2 option:selected').remove();
	});
    $('#tttt2').unbind("click");
    $('#tttt2').click(function(e){
    	$('#jjjj2 option:selected').each(function(i,selected){
    		$('#jjj2').append('<option value=\"'+$(selected).val()+'\">'+$(selected).text()+'</option>');
    		});

       	$('#jjjj2 option:selected').remove();
	});
})