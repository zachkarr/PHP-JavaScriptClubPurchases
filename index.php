<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript" src="Purchases.js"></script>
        <title>Club DB</title>
    </head>
    
    <body>
        
        <h1>Club Member Purchases Review</h1>
               <p>Select a member and click go to see transactions for that member.</p>
        <br>
        <form id="purchasesForm" action="purchases.php" method="get">
            
        <?php
        require_once ('dbtest.php');
        $query = "SELECT * FROM tblmembers ORDER BY LastName, FirstName, MiddleName";
        $r = mysqli_query($dbc, $query);
        if(mysqli_num_rows($r) > 0) {
            echo '<select id="purchasesid" name="purchasesid">';
            while($row = mysqli_fetch_array($r)) {
                echo '<option value="' .$row['MemID']. '">'
                     .$row['LastName'].=', '.$row['FirstName'].=' '.$row['MiddleName']. '</option>';   
            }
            echo '</select>';
        } else {
            echo "<p> No Members Found!</p>";
        }
        ?>
            <input type="submit" name="go" id="go" value="Go" />
        </form>
        <div id="results"></div>
    </body>
    
    
</html>
            
     



