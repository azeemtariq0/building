<?php 

$conn = oci_connect('smastage', 'smastage', '(DESCRIPTION =
            (ADDRESS_LIST =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 125.209.98.206)(PORT = 1622))
            )
            (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = orcl_new)
            )
        )');
       if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
 $query = 'select * from amc_users';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';
}
// Close the Oracle connection
oci_close($conn);

 ?>