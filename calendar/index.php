<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' href='cs.css' />
    <link rel='stylesheet' href='fullcalendar-3.3.1/lib/cupertino/jquery-ui.min.css' />
  	<link rel='stylesheet' href='fullcalendar-3.3.1/fullcalendar.min.css' />
    <link rel='stylesheet' href='fullcalendar-3.3.1/fullcalendar.print.min.css'  media='print' />
    <link rel="stylesheet" type="text/css" href="fancybox-3.0/dist/jquery.fancybox.min.css">
    <script src='fullcalendar-3.3.1/lib/jquery.min.js'></script>
    <script src='fullcalendar-3.3.1/lib/moment.min.js'></script>
    <script src='fullcalendar-3.3.1/fullcalendar.min.js'></script>
    <script src="fullcalendar-3.3.1/locale-all.js"></script>
    <script src="fancybox-3.0/dist/jquery.fancybox.min.js"></script>
    <script src="js.js"></script>
  </head>
  <body>
    <div id='calendar'></div>
    <div style="display: none;" id="hidden-content">
      <p><h1 id="date"></h1></p>
      <p><h2>請輸入活動名稱</h2></p>
      <p><input type="text" id="name"></input></p>
      <p style="text-align: center;"><input id="add" type="submit" value="確定"></input></p>
    </div>
    <div style="display: none;" id="hidden-content2">
      <p><h1 id="date2"></h1></p>
      <p><h1 id="eventid"></h1></p>
      <p><h1 id="name2"></h1></p>
      <p><h2>確定要刪除嗎?</h2></p>
      <p style="text-align: center;"><input id="delete" type="submit" value="確定"></input></p>
    </div>
  </body>
</html>