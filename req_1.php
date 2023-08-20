<!DOCTYPE html>
<html>
<body>
 
<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    console.log(myObj)
  }
};
xmlhttp.open("GET", "exe_1.php", true);
xmlhttp.send();
</script>

 

</body>
</html>
