<?php
require 'config.sql.php';
$sql="SELECT * FROM wishwell";
$query=mysql_query($sql);
$result=array();
while($row=mysql_fetch_assoc($query))
{
$result[]=$row;
}
$xml = new XMLWriter();
$xml->openUri("wishwell.xml");
$xml->setIndentString('  ');
$xml->setIndent(true);
$xml->startDocument('1.0', 'utf-8');
$xml->startElement('root');

foreach($result as $data){
	$xml->startElement('rwish');
	$xml->writeAttribute("teachid",$data['teacherid']);
	foreach($data as $key=>$value){
		$xml->startElement($key);
		$xml->text($value);
		$xml->endElement();
	}
	$xml->endElement();
}
$xml->endElement();
$xml->endDocument();
$xml->flush();
?>