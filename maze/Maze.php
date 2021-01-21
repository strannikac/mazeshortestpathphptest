<?php 

namespace maze;

/**
 * class for maze
 * contains all properties for maze
 * and methods
 */
class Maze {
	//number of rows and columns in maze
	private $cols = 0;
	private $rows = 0;

	//maze (plan, schema)
	private $plan = [];

	//start, end position in maze
	private $startPos;
	private $endPos;

	//next steps
	private $nextStepCol = [];
	private $nextStepRow = [];
	private $nextStepsNum = 0;

	//paths
	private $path = [];

	//queue
	private $queue = [];
	//queue pointers
	private $queueHead = 0;
	private $queueTail = 0;

	/**
     * @param array $maze input value for $plan property
     * @param int $n set $cols property
     * @param int $m set $rows property
     *
     * also inizialize some properties for maze
     */
	function __construct(array $maze, array $arrX, array $arrY) {
		$this->plan = $maze;

		$this->cols = count($maze);
		if($this->cols < 1) {
			throw new \Exception('Maze doesn\'t contain cols');
		}

		$this->rows = count($maze[0]);
		if($this->rows < 1) {
			throw new \Exception('Maze doesn\'t contain rows');
		}

		//default start pos
		$this->startPos = new MazePoint();
		//default end pos
		$this->endPos = new MazePoint($this->cols - 1, $this->rows - 1);

		//check start position
		if( $this->plan[$this->startPos->getX()][$this->startPos->getY()] == '#' ) {
			throw new \Exception('Maze contains wrong start position');
		}

		//generate empty queue
		$area = $this->cols * $this->rows;
		for($i = 0; $i < $area; $i++) {
			$this->queue[$i] = new MazePoint();
		}

		//clear paths
		for ($i = 0; $i < $this->cols; $i++) {
			for($j = 0; $j < $this->rows; $j++) {
				$this->path[$i][$j] = 0;
			}
		}

		$countX = count($arrX);
		$countY = count($arrY);

		if($countX > 0 && $countX == $countY) {
			$this->nextStepCol = $arrX;
			$this->nextStepRow = $arrY;
			$this->nextStepsNum = $countX;
		} else {
			throw new \Exception('Maze contains wrong next steps for path');
		}
	}

	/**
     * find shortest path in current maze
     *
     * @return number of steps in shortest path
     */
	public function getShortestPath() {
		//initialize queue
		$this->queue[$this->queueTail]->setX($this->startPos->getX());
		//add in queue first pos
		$this->queue[$this->queueTail++]->setY($this->startPos->getY());

		//while queue is not empty
		while ($this->queueHead < $this->queueTail) {
	   		//take next position from queue
			$nextPos = $this->queue[$this->queueHead++];

			//cycle for neighbors
	   		for ($k = 0; $k < $this->nextStepsNum; $k++) {
				$newPos = new MazePoint();
	      		$newPos->setX($nextPos->getX() + $this->nextStepCol[$k]);
	      		$newPos->setY($nextPos->getY() + $this->nextStepRow[$k]);

	      		//check that this position exists
	      		if (0 <= $newPos->getX() && $newPos->getX() < $this->cols && 0 <= $newPos->getY() && $newPos->getY() < $this->rows) {
	         		//check that this position is free and didn't visited
	         		if ($this->plan[$newPos->getX()][$newPos->getY()] != '#' && $this->path[$newPos->getX()][$newPos->getY()] == 0) {
	            		//find path 
	            		$this->path[$newPos->getX()][$newPos->getY()] = $this->path[$nextPos->getX()][$nextPos->getY()] + 1;
	            		//add position in queue
	            		$this->queue[$this->queueTail++] = $newPos;
	         		}
	         	}
	        }
	   	}

	   	if ($this->path[$this->endPos->getX()][$this->endPos->getY()]) {
			return $this->path[$this->endPos->getX()][$this->endPos->getY()];
		}

		return 0;
	}
}
?>