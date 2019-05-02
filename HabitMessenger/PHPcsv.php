<?php
$list = array
(
"WSJ,Gym",
"1,1",
);

$file = fopen("contacts.csv","w");

foreach ($list as $line)
  {
  fputcsv($file,explode(',',$line));
  }

fclose($file); ?>


$csv = array_map('str_getcsv', file('contacts.csv'));