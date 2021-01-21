<?php 

namespace maze;

/**
 * class for point in maze
 * in future can be added other properties or methods
 */
class MazePoint {
	private $x = 0;
	private $y = 0;

	function __construct(int $x = 0, int $y = 0) {
		if($x != 0) {
			$this->x = $x;
		}

		if($y != 0) {
			$this->y = $y;
		}
	}

	public function getX() {
		return $this->x;
	}

	public function getY() {
		return $this->y;
	}

	public function setX(int $x) {
		$this->x = $x;
	}

	public function setY(int $y) {
		$this->y = $y;
	}
}
?>