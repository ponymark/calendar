<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='cs.css' />
    <link rel='stylesheet' href='fullcalendar-3.4.0/lib/cupertino/jquery-ui.min.css' />
  	<link rel='stylesheet' href='fullcalendar-3.4.0/fullcalendar.min.css' />
    <link rel='stylesheet' href='fullcalendar-3.4.0/fullcalendar.print.min.css'  media='print' />
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="syronex-colorpicker.css" rel="stylesheet">
    <script src='fullcalendar-3.4.0/lib/jquery.min.js'></script>
    <script src='fullcalendar-3.4.0/lib/moment.min.js'></script>
    <script src='fullcalendar-3.4.0/fullcalendar.min.js'></script>
    <script src="fullcalendar-3.4.0/locale-all.js"></script>
    <script src="js.js"></script>
    <script src="syronex-colorpicker.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
    <div id='calendar'></div>
    <div  id="hidden-content" class="hide">
      <h1 id="date" style="text-align: center;"></h1>
      <h2 style="text-align: center;">請輸入活動名稱</h2>
      <p><textarea type="text" rows="1" id="name" class="form-control" style="font-size: 200%"></textarea></p>
      <h2 style="text-align: center;">請選擇時間</h2>
      <p style="text-align: center;"><select id='time' style="font-size: 200%;">
      <option value="上午">上午</option>
      <option value="下午">下午</option>
      </select></p>
      <p style="text-align: center;"></p><select id='time1' style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 40%;left: 0%;right: 0%;">
      </select><div style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 0%;right: 0%;">到</div><select id='time2' style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 40%;left: 0%;right: 0%;">
      </select></p>
      <div id="cc"></div>
      <div id="cc2" style="display: none;"></div>
      <p style="text-align: center;"><input id="add" type="submit" class="btn btn-primary btn-lg btn-block" value="新增"></input></p>
    </div>
    <div id="hidden-content2" class="hide">
      <div style="display:inline-block;position: relative;width: 50%;left: 50%;right: 0%;">
        <button type="button" id="close" class="close">&times;</button>
      </div>
    </div>
    <div style="display: none;" class="well well-lg" id="test">
      <div style="display: block;" id="hidden-content3" >
        <h1 id="date3" style="text-align: center;"></h1>
        <h1 id="eventid2" style="display: none;"></h1>
        <div style="position: relative;width: 60%;left: 20%;right: 20%;">
          <div style="text-align: justify;">
            <input id="update" type="submit" class="btn btn-primary btn-lg" value="更新"></input>
            <input id="delete2" type="submit" value="刪除" class="btn btn-danger btn-lg"></input>
            <input id="comeback" type="submit" class="btn btn-success btn-lg" value="返回行事曆"></input>
          </div>
        </div>
        <div>
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">選擇時間:</label><select id='time3' style="vertical-align:top;display:  inline-block;position: relative;width: 50%;left: 20%;right: 0%;font-size: 200%;">
            <option value="上午">上午</option>
            <option value="下午">下午</option>
          </select>
        </div>
        <div >
          <select id='time4' size="4" style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">
          </select><div style="position: relative;display:  inline-block;width: 20%;left: 20%;right: 0%;">
            <div style="vertical-align:middle;text-align: center;font-size: 200%;">
            <label>到</label>
            </div>
          </div><select id='time5' size="4" style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">
          </select>
        </div>
        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">選擇顏色:</label><div style="vertical-align:top;display: inline-block;position: relative;width: 50%;left: 20%;right: 0%;">
            <div id="color"></div>
          </div>
          <div id="color2" style="display: none;"></div>
        </div>
        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">活動名稱:</label><div style="vertical-align:top;display: inline-block;position: relative;width: 50%;left: 20%;right: 0%;">
            <textarea type="text" rows="1" id="name3" class="form-control" style="font-size: 200%"></textarea>
          </div>
        </div>
        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">活動內容:</label><div style="vertical-align:top;display:  inline-block;position: relative;width: 50%;left: 20%;right: 0%;">
            <textarea type="text" rows="10" id="tt2" class="form-control" style="font-size: 200%"></textarea>
          </div>
        </div>
        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">未選長者</label><label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 40%;right: 0%;">已選長者</label>
        </div>
        <div >
          <select id='jjj2' multiple style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select><div style="position: relative;display:  inline-block;width: 20%;left: 20%;right: 0%;">
            <div style="vertical-align:middle;text-align: center;">
              <input id="tttt2" type="submit" value="刪除<-" class="btn btn-danger btn-lg" ></input>
              <input id="ttt2" type="submit" class="btn btn-primary btn-lg" value="新增->" ></input>
            </div>
          </div><select id='jjjj2' multiple style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">
          </select>
        </div>
      </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">警告</h4>
      </div>
      <div class="modal-body">
        <h1 style="text-align: center;">確定要刪除嗎?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">不要</button>
        <button id='delete' type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
      </div>
    </div>
  </div>
</div>
  </body>
</html>