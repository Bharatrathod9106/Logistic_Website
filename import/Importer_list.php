<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

	$query = "SELECT * FROM importer";
	
	$result = mysqli_query($conn,$query);

}else{
            
    header("location:newkrishna.html");
}
    
?>

<html>
    <title>Fetch Data From Database</title>
    <style>
        #customers{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
        }
        #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
        }

        #customers tr:nth-child(even){
                background-color: #f2f2f2;
        }
        #customers tr:hover{
                background-color: #ddd;
        }

        #customers th{
                font-size: 20px;
                padding-top: 12px;
                padding-bottom: 12px;
                /* text-align: left; */
                background-color: #04AA6D;
                color: white;
        }
        img{

                width: 40px;
        }
    </style>
    <body>
        <table id="customers" align="center">
            <tr>
                <th>ID</th>
                <th>Iec</th>
                <th>Branch</th>
                <th>Company Name</th>
                <th>Adddress</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Phone</th>
                <th>GSTN</th>
                <th>Email</th>
                <th class="colum4" colspan='2'>Action</th>
            </tr>
            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?> 
                    <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['iec']; ?></td>
                        <td><?php echo $rows['branch']; ?></td>
                        <td><?php echo $rows['company_name']; ?></td>
                        <td><?php echo $rows['add1']; ?></td>
                        <td><?php echo $rows['city']; ?></td>
                        <td><?php echo $rows['state']; ?></td>
                        <td><?php echo $rows['pincode']; ?></td>
                        <td><?php echo $rows['phone']; ?></td>
                        <td><?php echo $rows['gstn']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><a href="importer_update.php?id=<?php echo $rows['id'];?>"><img src="icon/updated.png"></a></td>
                        <td><a href="importer_delete.php?id=<?php echo $rows['id'];?>"><img src="icon/delete.png"></a></td>
                    </tr>
            <?php 
                }
            ?>

        </table>    
    </body>
</html>
