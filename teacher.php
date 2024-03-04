<?php
$con_string="host=localhost dbname=madhuri port=5432 user=postgres password=1234";
$con = pg_connect($con_string);
$q = "select * from teacher;";
$rs = pg_query($con,$q) or die("Cannot Execute query");

echo"<table border=1>";
echo"<tr><th>Teacher No</th><th>Teacher
Name</th><th>Qualification</th><th>Salary</th></tr>";
while($row = pg_fetch_array($rs))
{
echo"<tr><td>".$row['tno']."</td>";
echo"<td>".$row['tname']."</td>";
echo"<td>".$row['qualification']."</td>";
echo"<td>".$row['salary']."</td></tr>";
}
echo"</table>";
?>