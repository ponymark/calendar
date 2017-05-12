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
    <script src='fullcalendar-3.4.0/lib/jquery.min.js'></script>
    <script src='fullcalendar-3.4.0/lib/moment.min.js'></script>
    <script src='fullcalendar-3.4.0/fullcalendar.min.js'></script>
    <script src="fullcalendar-3.4.0/locale-all.js"></script>
    <script src="js.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id='calendar'></div>
    <div  id="hidden-content" class="hide">
      <h1 id="date" style="text-align: center;"></h1>
      <h2 style="text-align: center;">請輸入活動名稱</h2>
      <p><textarea type="text" rows="1" id="name" class="form-control" style="font-size: 200%"></textarea></p>
      <p style="text-align: center;"><input id="add" type="submit" class="btn btn-primary btn-lg btn-block" value="確定"></input></p>
    </div>    

    <div style="display: none;" id="test">

      <div style="display: block;" id="hidden-content3">

        <h1 id="date3" style="text-align: center;"></h1>
        <h1 id="eventid2" style="display: none;"></h1>

        <div style="position: relative;width: 60%;left: 20%;right: 20%;">
          <div style="text-align: justify;">
            <input id="update" type="submit" class="btn btn-primary btn-lg" value="確定"></input>
            <input id="delete2" type="submit" value="刪除" class="btn btn-danger btn-lg"></input>
            <input id="comeback" type="submit" class="btn btn-default btn-lg" value="返回行事曆"></input>
          </div>
        </div>
        
        <div>
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">活動名稱:</label>
          <div style="vertical-align:top;display: inline-block;position: relative;width: 50%;left: 20%;right: 0%;">
            <input type="text" id="name3" class="form-control" style="font-size: 200%"></input>
          </div>
        </div>

        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 10%;left: 20%;right: 0%;">活動內容:</label>
          <div style="vertical-align:top;display:  inline-block;position: relative;width: 50%;left: 20%;right: 0%;">
            <textarea type="text" rows="10" id="tt2" class="form-control" style="font-size: 200%"></textarea>
          </div>
        </div>

        <div >
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">未選成員</label>
          <label style="vertical-align:top;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 40%;right: 0%;">已選成員</label>
        </div>

        <div>
          <select id='jjj2' multiple style="vertical-align:middle;display:  inline-block;font-size: 200%;text-align: center;position: relative;width: 20%;left: 20%;right: 0%;">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>


          <div style="position: relative;display:  inline-block;width: 20%;left: 20%;right: 0%;">
            <div style="vertical-align:middle;text-align: center;">
              <input id="tttt2" type="submit" value="刪除<-" class="btn btn-danger" ></input>
              <input id="ttt2" type="submit" class="btn btn-primary" value="新增->" ></input>
            </div>
          </div>



          <select id='jjjj2' multiple style="vertical-align:middle;display:  inline-block;position: relative;width: 20%;left: 20%;right: 0%;font-size: 200%;">
          </select>
        </div>



      </div>

    </div>

  </body>
</html>