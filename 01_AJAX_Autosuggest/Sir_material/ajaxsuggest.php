<?php

$names = [
    "Amit",
    "Bhavesh",
	"Bhavin",
    "Chirag",
    "Dhruv",
	"Dhruvi",
	"Dhuvisha",
    "Hardik",
    "Jignesh",
    "Karan",
    "Mahesh",
    "Nilesh",
    "Pratik",
    "Rahul",
    "Rakesh",
    "Suresh",
    "Vijay"
];

$q = $_GET['q'] ?? '';

$q = strtolower($q);

$output = "";

foreach($names as $name)
{
    if(strpos(strtolower($name), $q) === 0)
    {
        $output .= "<div class='item'>$name</div>";
    }
}

echo $output ?: "<div class='item'>No Record Found</div>";

?>