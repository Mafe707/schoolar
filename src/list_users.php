<?php
    include('../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Photo</th>
            <th>...</th>
        </tr>
    <?php
        //Here code
        $sql = "
            select
                id,
                firstname,
                lastname,
                email,
                case when status = true then 'Active' else 'No active' end as status
            from
                users
        ";
        $res = pg_query($conn, $sql);

        if (!$res){
            echo "Querry error";
            exit;
        }

        while($row = pg_fetch_assoc($res)) {
            echo"<tr>";
            echo"<td>". $row ['firstname'] ."</td>";
            echo"<td>". $row ['lastname'] ."</td>";
            echo"<td>". $row ['email'] ."</td>";
            echo"<td>". $row ['status'] ."</td>";
            echo"<td align='center'><img src='photo_users/photo_default.png' width='25'></td>";
            echo"<td>";
            echo"<a href=''><img src = 'icons/edit.png' width='15'></a>";
            echo"<a href='http://localhost/schoolar/src/delete.php'><img src = 'icons/dash.png' width='15'></a>";
            echo"<a href=''><img src = 'icons/lupa.png' width='15'></a>";
            echo"</td>";
            echo"</tr>";
        }
    ?>   
    </table>
</body>
</html>