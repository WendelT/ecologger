
<!DOCTYPE html>
<html>
<body>
<canvas id="myCanvas" width="600" height="600"></canvas>
<!-- ww  w  .j ava2s .  co m-->
<script>

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.moveTo(100, 100);
ctx.lineTo(500, 550);
ctx.stroke();

</script>

</body>
</html>
