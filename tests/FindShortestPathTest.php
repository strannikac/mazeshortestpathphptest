<?php 

/* it doesn't work with namespace, 
I tried different ways, but didn't find solution */
namespace tests;

use PHPUnit\Framework\TestCase;

class FindShortestPathTest extends TestCase
{
    /**
     * @param array $maze input value for findShortestPath() function
     * @param int $expStepsAmount expected result from findShortestPath($maze) function
     *
     * @dataProvider provideTestData
     */
    public function testMyFunction(array $maze, $expStepsAmount)
    {
        $result = findShortestPath($maze);
        $this->assertEquals($expStepsAmount, $result);
    }

    /**
     * Data provider for testMyFunction()
     * @return array[]
     * where key is a name of the test data
     * value is array of arguments for test case
     * @see testMyFunction()
     */
    public function provideTestData()
    {
        return [
            'test #1' => [[
                ['.', '.'],
                ['.', '.']
            ], 2],

            'test #2' => [[
                ['.', '#', '.', '.', '.'],
                ['.', '.', '.', '#', '.']
            ], 7],

            'test #3' => [[
                ['.', '.'],
                ['.', '.'],
                ['.', '#'],
                ['.', '.']
            ], 4],

            'test #4' => [[
                ['.', '.', '.'],
                ['.', '.', '.'],
                ['#', '.', '#'],
                ['.', '.', '.']
            ], 5],

            'test #5' => [[
                ['.', '.', '.', '.', '.', '.', '#'],
                ['.', '#', '#', '#', '#', '.', '#'],
                ['.', '.', '.', '.', '#', '.', '#'],
                ['#', '#', '#', '.', '#', '.', '.'],
                ['.', '.', '.', '.', '#', '#', '.'],
                ['.', '#', '#', '#', '#', '#', '.'],
                ['.', '.', '.', '.', '.', '.', '.'],
            ], 12],

            // ToDo: add more tests cases here
        ];
    }
}

?>
