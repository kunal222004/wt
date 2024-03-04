
<?php
$q=$_GET['q'];
$dom=new DOMDocument();
$dom->load("book.xml");
echo"<b>Book name</b>";
echo"<br>";

$x=$dom->getElementsByTagName("Book_Title");
for($i=0;$i<=$x->length-1;$i++)
{
if($x->item($i)->nodeType==1)
{
if($x->item($i)->childNodes->item(0)->nodeValue==$q)
{
$y=($x->item($i)->parentNode);
}
}
}
$book=($y->childNodes);
for($i=0;$i<$book->length;$i++)
{
if($book->item($i)->nodeType==1)
{
echo($book->item($i)->nodeName);
echo(":");
echo($book->item($i)->childNodes->item(0)->nodeValue);
echo("<br>");
}
}
?>