<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use tests\FindShortestPathTest;

require_once('autoload.php');
require_once('vendor/autoload.php');
require_once('function.php');

if(isset($_GET['test']) && $_GET['test'] == 1) {
	//create tests
	$test = new FindShortestPathTest();

	$testData = $test->provideTestData();

	foreach($testData as $testName => $testParams) {
		echo 'start ' . $testName . '...<br/>';
		$test->testMyFunction($testParams[0], $testParams[1]);
	}

	echo 'tests finished.';
} else {
	//get result of our maze
	$maze = [
        ['.', '.', '.', '.', '.', '.', '#'],
        ['.', '#', '#', '#', '#', '.', '#'],
        ['.', '.', '.', '.', '#', '.', '#'],
        ['#', '#', '#', '.', '#', '.', '.'],
        ['.', '.', '.', '.', '#', '#', '.'],
        ['.', '#', '#', '#', '#', '#', '.'],
        ['.', '.', '.', '.', '.', '.', '.'],
    ];

    echo 'minimum steps for this maze is ' . findShortestPath($maze);
}

?>