<?php

use VinnyTest\TestSuite;

function printSuite(TestSuite $suite) {
	$class = new \ReflectionClass($suite);

	foreach ($class->getMethods() as $method) {
		if (! $method->isPublic()) continue;

		$boolean = $method->invoke($suite);

		echo ($boolean ? '[x] ' : '[ ] ') . $method->getName() . "\n";
	}
}

$filename = getcwd() . "/testsuites.conf.php";
if(!file_exists($filename)){
	die("testsuites.conf.php file does not exist");
}

foreach (require($filename) as $suite) printSuite($suite);