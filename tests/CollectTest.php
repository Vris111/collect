<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testKeys()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a', 'b', 'c'], $collection->keys()->toArray());
    }

    public function testValues()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals([1, 2, 3], $collection->values()->toArray());
    }

    public function testGet()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $collection->get('b'));
    }

    public function testExcept()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'c' => 3], $collection->except('b')->toArray());
    }

    public function testOnly()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['b' => 2], $collection->only('b')->toArray());
    }

    public function testFirst()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(1, $collection->first());
    }

    public function testCount()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $collection->count());
    }

    public function testToArray()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3], $collection->toArray());
    }

    public function testSearch()
    {
        $collection = new Collect\Collect([
            ['name' => 'Alice', 'age' => 30],
            ['name' => 'Bob', 'age' => 25],
            ['name' => 'Charlie', 'age' => 30],
        ]);
        $this->assertEquals([
            ['name' => 'Alice', 'age' => 30],
            ['name' => 'Charlie', 'age' => 30],
        ], $collection->search('age', 30)->toArray());
    }

    public function testMap()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $this->assertEquals([2, 4, 6], $collection->map(fn ($x) => $x * 2)->toArray());
    }

    public function testUnshift()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $collection->unshift(0);
        $this->assertEquals([0, 1, 2, 3], $collection->toArray());
    }

    public function testShift()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $collection->shift();
        $this->assertEquals([2, 3], $collection->toArray());
    }

    public function testPop()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $collection->pop();
        $this->assertEquals([1, 2], $collection->toArray());
    }

    public function testFilter()
    {
        $collection = new Collect\Collect([1, 2, 3, 4]);
        $filtered = $collection->filter(fn ($x) => $x % 2 !== 0)->toArray();
        $this->assertEquals([1, 3], $filtered);
    }

    public function testEach()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $collection->each(fn ($x) => $x *= 2);
        $this->assertEquals([1, 2, 3], $collection->toArray());
    }

    public function testPush()
    {
        $collection = new Collect\Collect([1, 2, 3]);
        $collection->push(4);
        $this->assertEquals([1, 2, 3, 4], $collection->toArray());
    }
}