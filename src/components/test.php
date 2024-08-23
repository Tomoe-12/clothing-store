
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="submit">click</label>
    <form action="test.php" method="get">
        <input type="text" name="test" value="test">
        <input id="submit" type="submit" value="submit" name="submit">
    </form>
</body>
</html>
<?php 
if(isset($_GET["submit"])){
    $name=$_GET["test"];
    echo $name;
}
?>