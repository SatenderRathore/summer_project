<?php
include("db.php");
session_start();

//$avail_source = $_SESSION['avail_source'];
//$avail_dest = $_SESSION['avail_dest'];

$avail_source = array("JP", "KOTA", "ST", "BOMBAY", "MADGAON", "CALICUT");
$avail_dest = array("JP1", "KOTA1", "ST1", "BOMBAY1", "MADGAO1N", "CALICUT1");
?>

<html>
<div>COntainer</div>
<?php for ($k = 0; $k < count($avail_source); $k++)
    {
        echo "<div class='src' style='background: red'>$avail_source[$k]</div>";
        echo " to ";
        echo "<div class='dest' style='background: green'>$avail_dest[$k]</div>";
        echo '<br>';
    }
?>
    
</html>