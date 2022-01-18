<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <title>Member History</title>
    </head>
    
    <body>
        <h1>Member transaction history</h1>
            <?php
        
        $purchasesid = $_GET['purchasesid'];
        if($purchasesid !== NULL) {
           require_once ('dbtest.php');
           $query = "SELECT * FROM tblmembers WHERE MemID = '$purchasesid'";
           
           $r = mysqli_query($dbc, $query);
           if(mysqli_num_rows($r) !== NULL) {
           $row = mysqli_fetch_array($r);
           echo "<p>Member ID: " .$row['MemID']. "<br>";
           echo "<p>Member Name: " .$row['LastName'].=',  ' .$row['FirstName'].=' ' .$row['MiddleName']. "<br>";
           echo "<p>Member Joined: " .$row['MemDt']. "<br>";
           echo "<p>Member Status: " .$row['Status']. "<br></p>";
           } else {
               echo "<p>Member not on file.</p>";
           }   
           //table for inventory
           echo "<table border='1'>";
           echo "<caption>Transaction History</caption>";
           echo "<tr>";
           echo "<th>Purchase Dt</th>";
           echo "<th>Trans Cd</th>";
           echo "<th>Trans Desc</th>";
           echo "<th>Trans Type</th>";
           echo "<th>Amount</th>";
           echo "</tr>";
           $query2 = "SELECT p.Memid, p.PurchaseDt, p.TransCd, c.TransDesc, p.TransType, p.Amount
                     FROM tblpurchases p, tblcodes c
                     WHERE p.TransCd = c.TransCd AND p.MemId = '$purchasesid'
                     ORDER BY p.MemId, p.PurchaseDt, p.TransCd";
           $r2 = mysqli_query($dbc, $query2);
           while($row = mysqli_fetch_array($r2)) {
               echo "<tr>";
               echo "<td>" .$row['PurchaseDt']. "</td>";
               echo "<td>" .$row['TransCd']. "</td>";
               echo "<td>" .$row['TransDesc']. "</td>";
               echo "<td>" .$row['TransType']. "</td>";
               echo "<td>" .$row['Amount']. "</td>";
               echo "</tr>";
           }
           echo "</table>";
           
        } else {
           echo '<p>No Member ID from form.</p>';
        }
        ?>
    </body>
</html>



