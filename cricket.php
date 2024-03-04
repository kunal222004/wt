<?php
$name = $_GET["name"];
if ($name == "")
{
echo "";
}
else if ($name == "Rohit" || $name == "Virat" || $name == "Dhoni" || $name == "Ashwin" ||
$name == "Harbhajan")
{
echo "Hello, master !";
}
else
{
echo "";
}
?>