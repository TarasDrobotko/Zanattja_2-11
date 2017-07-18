<?php echo '<html>' .
'<head>
<META HTTP-EQUIV="REFRESH" CONTENT="1">
<title>Clock</title>
<link rel="stylesheet" href="clock.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>
<body>';
  echo '<h1>Годинник на php</h1>';
  echo '<div class="clock"><ul>';
echo "<li>" . date("H") . "</li>";
echo '<li id="point">' . ':' . '</li>';
echo "<li>"  . date("i") . '</li>';
echo '<li id="point">' . ':' . '</li>';
echo "<li>"  . date("s") . "</li>";
echo '</ul>
</div>
</body>
</html>';
?>
