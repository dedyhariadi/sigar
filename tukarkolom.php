<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'sambungan.php';
            include 'menuatas.php';
            
            $perintah="SELECT * FROM tbl_rumah WHERE L_TNH LIKE 'Diba%'";
            $sql=mysql_query($perintah);
		
            ?>
        <table style="width: 100%;" border='1'>
            <thead>
                <tr>
                    <td>NO</td>
                    <td>ID_RUMAH</td>
                    <td>ASAL</td>
                    <td>L_TNH</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $a=1;
            while ($hasil = mysql_fetch_array($sql)) 
                { 
                ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?php echo $hasil['ID_RUMAH'];?></td>
                    <?php 
                    $tempASAL[$a]=$hasil['ASAL'];
                    $tempL_TNH[$a]=$hasil['L_TNH'];
                    $tempNO[$a]= $hasil['NO'];
                    $perintahganti="UPDATE tbl_rumah SET L_TNH = '$tempASAL[$a]', ASAL='$tempL_TNH[$a]' WHERE NO ='$tempNO[$a]';";
                    $sqlubah=mysql_query($perintahganti);
            
                    ?>
                    <td><?php echo $hasil['NO'];?></td>
                    <td><?php echo $hasil['ASAL'];?></td>
                    <td><?php echo $hasil['L_TNH'];?></td>
                </tr>
                <?php
                $a=$a+1;
		}
        ?>
            </tbody>
        </table>
    </body>
</html>
