<?php

// Exercise 6-1
// Adding items to an array

echo "<br>";
echo("Exercise 6-1<br>");

$paper[] = "Copier";
$paper[] = "Inkjet";
$paper[] = "Laser";
$paper[] = "Photo";

print_r($paper);
echo "<br>";



// Exercise 6-3
// Adding items to an array and retrieving them

echo "<br>";
echo("Exercise 6-3<br>");

for ($j = 0; $j < sizeof($paper); ++$j) {
	echo "$j: $paper[$j]<br>";
}

// Exercise 6-4
// Adding itmes to an associative array and retriving them

echo "<br>";
echo("Exercise 6-4<br>");

$copy['copier'] = "Copier & Multipurpose";
$copy['inkJet'] = "InkJet Printer";
$copy['laser'] = "Laser Printer";
$copy['photo'] = "Photographic Paper";

echo $copy['laser']; echo "<br>";


// Exercise 6-5
// Adding items to an array using the array keyword

echo "<br>";
echo("Exercise 6-5<br>");

$p1 = array("Copier", "InkJet", "Laser", "Photo");

echo "p1 element: " . $p1[2] . "<br>";

$p2 = array('copier' => "Copier & Multipurpose",
			'inkjet' => "InkJet Printer",
			'laser' => "Laser Printer",
			'photo' => "Photographic Paper");

echo "p2 element: " . $p2['inkjet'] . "<br>";


// Exercise 6-6
// Iterating through a numeric array using foreach...as

echo "<br>";
echo("Exercise 6-6<br>");

$newPaper = array("Copier", "InkJet", "Laster", "Photo");
$j = 0;

foreach($newPaper as $item){
	echo "$j: $item<br>"; // NOTE you can place variables between quotes without exiting
	++$j;
}


// Exercise 6-7
// Iterating through a numeric array using foreach...as

echo "<br>";
echo("Exercise 6-7<br>");

$paper2 = array('copier' => "Copier & Multipurpose",
				'inkjet' => "InkJet Printer",
				'laser' => "Laser Printer",
				'photo' => "Photographic Paper");

foreach($paper2 as $item => $description)
	echo "$item: $description<br>";


// Exercise 6-10
// Creating a multidimensional associative array

echo "<br>";
echo("Exercise 6-10<br>");

$products = array(

	'paper' => array(

		'copier' => "Copier & Multipurpose",
		'inkject' => "InkJet Printer",
		'laser' => "Laser Printer",
		'photo' => "Photographic Paper"),


	'pens' => array(

		'tape' => "Sticky Tape",
		'glue' => "Adhesives",
		'clips' => "Paperclips"),
		
	
	'misc' => array(

		'ball' => "Ball Point",
		'hilite' => "Highlighters",
		'marker' => "Markers"
	)
);


echo "<pre>"; // NOTE this tag means Pre-formatted

foreach($products as $section => $items)
	foreach($items as $key => $value)
		echo "$section:\t$key\t($value)<br>";






// Exercise 6-11
// Creating a multidimensional numeric array
echo "</pre>";
echo "<br>";
echo("Exercise 6-11<br>");
echo "<pre>";



$chessboard = array(
	array('r', 'n', 'b', 'q', 'k', 'b', 'n', 'r'),
    array('p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),
    array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    array('P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
    array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R')
  );

echo"<pre>";

foreach($chessboard as $row)
 {
	foreach ($row as $piece)
		echo "$piece ";

	echo "<br>";
}

echo "</pre>";


// Exercise 6-12
// Exploding a string into an array using spaces

echo "</pre>";

echo "<br>";
echo("Exercise 6-12<br>");
echo "<pre>";

$temp = explode(' ', "This is a sentence with seven words");
print_r($temp);
echo "</pre>";



// Exercise 6-13
// Exploding a string delimited with *** into an array

echo "<br>";
echo("Exercise 6-13<br>");
echo "<pre>";

$temp2 = explode('***', "A***sentence***with***asterisks");
print_r($temp2);
echo"</pre>";

// Exercise 6-14
// Using the compact function

echo "<br>";
echo("Exercise 6-14<br>");
echo "<pre>";

$fname			= "Doctor";
$sname			= "Who";
$planet			= "Gallifrey";
$system			= "Gridlock";
$constellation	= "Kasterborous";

$contact = compact('fname', 'sname', 'planet', 'system', 'constellation');

print_r($contact);

echo "</pre>";


// Exercise 6-15
// Using compact to help with debugging

echo "<br>";
echo("Exercise 6-15<br>");
echo "<pre>";

$j 		 = 23;
$temp 	 = "Hello";
$address = "1 Old Street";
$age	 = 61;

print_r(compact(explode(' ', 'j temp address age')));
echo "</pre>";

// Exercise 6-15
// Using compact to help with debugging

echo "<br>";
echo("Exercise Challenge <br>");
echo "<pre>";

$ten			= "Ten of Hearts";
$jack			= "Jack of Hearts";
$queen			= "Queen of Hearts";
$king			= "King of Hearts";
$ace			= "Ace of Hearts";

$royalFlush = compact('ten', 'jack', 'queen', 'queen', 'king');

print_r($royalFlush);




?>
