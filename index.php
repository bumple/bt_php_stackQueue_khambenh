<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include_once "src/Queue.php";
$patient = new Queue();
$users = $patient->getAll('data.json');
$newUsers = [];
foreach ($users as $key => $item){
    $newUsers[$item->getCode().$key] = $item;
}
ksort($newUsers);
$doneUsers = [];
//echo "<pre>";
//var_dump($newUsers);
//die()
$mytime = gettimeofday();
$id = $mytime['usec'];
$abc = [];
$abc = file_get_contents('data.json');
$abc = json_decode($abc,true);
echo "<pre>";
var_dump($abc);
echo "</pre>";
foreach ($abc as $key => $value){
    if ($value->getId() == 162939){

    }
}
die();
?>
<H1>Ưu tiên khám bệnh</H1>
<form action="action/add.php" method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" placeholder="Tên bệnh nhân" value="Nguyễn Văn A"></td>
        </tr>
        <tr>
            <td>Code:</td>
            <td><input type="text" name="code" placeholder="Mã ưu tiên" value="3"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Nhập" style="width: 50px;height: 50px">
            </td>
        </tr>
    </table>
</form>


<table border="1" style="border-collapse: collapse">
    <tr>
        <td>Tên bệnh nhân</td>
        <td>Mức độ ưu tiên</td>
        <td>ID</td>
    </tr>
    <?php foreach ($newUsers as $key => $item): ?>
    <tr>
        <td><?php echo $item->getName() ?></td>
        <td><?php echo $item->getCode() ?></td>
        <td><?php echo $item->getID() ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="action/done.php"><button  style="width: 50px;height: 50px" type="submit" >Done</button></a>

<h2>Danh sách đã được khám bệnh</h2>
<table border="1" style="border-collapse: collapse">
    <tr>
        <td>Tên bệnh nhân</td>
        <td>Mức độ ưu tiên</td>
    </tr>
    <?php foreach ($doneUsers as $key => $item): ?>
        <tr>
            <td><?php echo $item->getName() ?></td>
            <td><?php echo $item->getCode() ?></td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>