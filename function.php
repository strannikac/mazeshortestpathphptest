<?php 

//include files for maze
//require_once('maze/maze.php');
//require_once('maze/point.php');
use maze\Maze;
use maze\MazePoint;

/**
 * Returns minimum possible number of steps between start ($maze[0][0]) and end ($maze[n-1][m-1]).
 *
 * @param array $maze multi-dimensional array
 * @return integer amount of steps to pass the shortest way from top-left corner to the bottom-right corner
 * @throws Exception if $maze argument is invalid or maze cannot be passed
 */
function findShortestPath(array $plan) {
    // ToDo: implement logic here

	//create mase
	$maze = new Maze($plan, [-1, 0, 1, 0], [0, 1, 0, -1]);

	return $maze->getShortestPath();
}

?>
