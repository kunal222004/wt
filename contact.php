<?php
$fp = fopen("contact.dat","r");
echo "<table border = 1>
<tr><th>Sr.no</th> <th>Name</th> <th>Residence Number</th> <th>Mobile </th> <th>Address</th></tr>
";
while($row=fscanf($fp,"%s %s %s %s %s"))
{
    echo "<tr>
";
foreach($row as $i){
    echo "<td>$i</td>";
}
echo "</tr>";
}
echo "</table>";
fclose($fp);
?>