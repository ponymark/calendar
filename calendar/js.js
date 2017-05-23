function getcolor(){

					var gt=["#FFFFFF", "#EEEEEE", "#FFFF88", "#FF7400", "#CDEB8B", "#6BBA70",
		"#006E2E", "#C3D9FF", "#4096EE", "#356AA0", "#FF0096", "#B02B2C",
		"#000000"];
					index = gt.findIndex(x => x ==$('#color2').html());
					return index;
				}
$(document).ready(function() {
	$('body').on('hidden.bs.popover', function (e) {
	    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
	});//http://stackoverflow.com/questions/32581987/need-click-twice-after-hide-a-shown-bootstrap-popover
	//bootstrap的bug 某些情況下需要點擊兩次才能觸發 用這個修復

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
		eventStartEditable: false,

 		events: 'source.php',

 		dayClick: function(date, jsEvent, view) {

 			$('#date').text($.fullCalendar.formatDate(date,'YYYY-MM-DD'));

			  $('.popover').popover('hide');

				$(this).popover({
				html: true,
				placement: 'auto',
				title: 	'<div style=\"display:inline-block;position: relative;width: 50%;left: 50%;right: 0%;\">'+
						'<button type=\"button\" id=\"close\" class=\"close\">\&times;</button>'+
						'</div>'
				,
				content: function() {
					return $("#hidden-content").html();
				}
				,container: 'body'
				});
				$(this).popover('show');

				if($('.ui-state-active').text()!='月'){
					jj=$('.popover').css('height');

					ff=jsEvent.pageY+eval(jj.slice(0, -2));

					if(ff>=$(window).height()){
						$('.popover').css('top', jsEvent.pageY - eval(jj.slice(0, -2)) );
					}
					else{
						$('.popover').css('top',jsEvent.pageY);
					}
				}


			$('.popover-content  #time1 option').remove();
			for(t1=0;t1<=12;t1++){
				for(t2=0;t2<=30;t2+=30){
					if(t1==12&&t2==30){break;}
					tt2=String(t2);
					if(t2==0)tt2="00";
					$('.popover-content  #time1').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
				}
			}



			ff=$('.popover-content  #time1 option:selected').val();
			$('.popover-content  #time2 option').remove();
			ff1=ff.split(':')[0];
			ff2=ff.split(':')[1];
			ff3=(ff2=='00')?0:30;
			for(t1=eval(ff1);t1<=12;t1++){
				for(t2=0;t2<=30;t2+=30){
					if(ff2=='30'&&t2==0){continue;}
					if(t1==12&&t2==30){break;}
					tt2=String(t2);
					if(t2==0)tt2="00";
					$('.popover-content  #time2').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
				}
			}
		    $('.popover-content  #time1').change(function(){
					ff=$('.popover-content  #time1').val();
					$('.popover-content  #time2 option').remove();
					ff1=ff.split(':')[0];
					ff2=ff.split(':')[1];
					ff3=(ff2=='00')?0:30;
					for(t1=eval(ff1);t1<=12;t1++){
						for(t2=0;t2<=30;t2+=30){
							if(ff2=='30'&&t2==0&&t1==eval(ff1)){continue;}
							if(t1==12&&t2==30){break;}
							tt2=String(t2);
							if(t2==0)tt2="00";
							$('.popover-content  #time2').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
						}
					}
			});

			$('.popover-title  #close').unbind("click");
    		$('.popover-title  #close').click(function(e){
    			$('.popover').popover('hide');
    		});

			$('.popover-content #cc').colorPicker({
			defaultColor: 0, // index of the default color (optional)
			  columns: 13,     // number of columns (optional)  
			  //color: ['#FFFFFF', '#EEEEEE'], // list of colors (optional)
			  // click event - selected color is passed as arg.
			  click: function(color){$('.popover-content #cc2').html(color);} 
			});

 			$('.popover-content p #add').unbind("click");
    		$('.popover-content p #add').click(function(e){

				$.ajax({
					url: "insert.php",
					type: "POST",
					dataType: 'text',
					data: 'date='+$('#date').text()+'&name='+$('.popover-content p #name').val()+'&time='+$('.popover-content p #time').val()+'&time1='+$('.popover-content  #time1').val()+'&time2='+$('.popover-content  #time2').val()+'&color='+$('.popover-content #cc2').html(),
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
			$("body,html").css('background-color',"gray");
			$('.popover').popover('hide');
			$('#test').css("display","block");
			$('#calendar').css("display","none");
			$('#date3').text($.fullCalendar.formatDate(calEvent.start,'YYYY-MM-DD'));
			$('#name3').val(calEvent.title);
			$('#eventid2').text(calEvent.id);
			$('#tt2').val(calEvent.content);
			$('#color2').html(calEvent.color);
			//$('html,body').animate({
			//	scrollTop: $("#test").offset().top
			//}, 600);
			$('html,body').scrollTop($("#test").offset().top);


			$('#color').colorPicker({
				defaultColor: (function(){
					var gt=["#FFFFFF", "#EEEEEE", "#FFFF88", "#FF7400", "#CDEB8B", "#6BBA70",
							"#006E2E", "#C3D9FF", "#4096EE", "#356AA0", "#FF0096", "#B02B2C",
							"#000000"];
					index = gt.findIndex(x => x ==$('#color2').html());
					return index;
				})(), // index of the default color (optional)
				  columns: 13,     // number of columns (optional)  
				  //color: ['#FFFFFF', '#EEEEEE'], // list of colors (optional)
				  // click event - selected color is passed as arg.
				  click: function(color){$('#color2').html(color);} 
				});

			$('#time4 option').remove();
			$('#time5 option').remove();

			for(t1=0;t1<=12;t1++){
				for(t2=0;t2<=30;t2+=30){
					if(t1==12&&t2==30){break;}
					tt2=String(t2);
					if(t2==0)tt2="00";
					$('#time4').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
				}
			}
			$('#time4').val(calEvent.time1);

			ff=$('#time4 option:selected').val();
			ff1=ff.split(':')[0];
			ff2=ff.split(':')[1];
			ff3=(ff2=='00')?0:30;
			for(t1=eval(ff1);t1<=12;t1++){
				for(t2=0;t2<=30;t2+=30){
					if(ff2=='30'&&t2==0&&t1==eval(ff1)){continue;}
					if(t1==12&&t2==30){break;}
					tt2=String(t2);
					if(t2==0)tt2="00";
					$('#time5').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
				}
			}
			$('#time5').val(calEvent.time2);
			//從資料庫讀出來詳細時間 還要依此製造


			$('#time3 option').remove();
			if(calEvent.time=='上午'){
				$('#time3').append('<option selected="selected" value=\"'+"上午"+'\">'+"上午"+'</option>');
				$('#time3').append('<option value=\"'+"下午"+'\">'+"下午"+'</option>');
			}
			else{
				$('#time3').append('<option value=\"'+"上午"+'\">'+"上午"+'</option>');
				$('#time3').append('<option selected="selected" value=\"'+"下午"+'\">'+"下午"+'</option>');
			}

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


    $('#time4').change(function(){
			ff=$('#time4 option:selected').val();
			$('#time5 option').remove();
			ff1=ff.split(':')[0];
			ff2=ff.split(':')[1];
			ff3=(ff2=='00')?0:30;
			for(t1=eval(ff1);t1<=12;t1++){
				for(t2=0;t2<=30;t2+=30){
					if(ff2=='30'&&t2==0&&t1==eval(ff1)){continue;}
					if(t1==12&&t2==30){break;}
					tt2=String(t2);
					if(t2==0)tt2="00";
					$('#time5').append('<option value=\"'+t1+'\:'+tt2+'\">'+t1+'\:'+tt2+'</option>');
				}
			}
	});//並當改變選取開始時間時 也變化結束時間





    $('#update').unbind("click");
    $('#update').click(function(e){
		$("body,html").css('background-color',"white");

		//更新時要把詳細時間一併寫回去

    	//ajax要寫的更複雜 把下拉式列表中的選擇結果一併傳回去更新
		$.ajax({
			url: "update.php",
			type: "POST",
			dataType: 'text',
			data: 'id='+$('#eventid2').text()+'&date='+$('#date3').text()+'&name='+$('#name3').val()+'&content='+$('#tt2').val()+'&time='+$('#time3').val()+'&time1='+$('#time4').val()+'&time2='+$('#time5').val()+'&color='+$('#color2').html(),
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

    	$('#myModal').modal({
  			keyboard: true
		});
    	$('#myModal').modal('show');
	});

    $('#comeback').unbind("click");
    $('#comeback').click(function(e){
    	$("body,html").css('background-color',"white");
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

    $('#delete').unbind("click");
    $('#delete').click(function(e){
    	$("body,html").css('background-color',"white");
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
})