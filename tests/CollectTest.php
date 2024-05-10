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

    public function testPush()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], $collection->push(4, 'd')->toArray());
    }

    public function testUnshift()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals([0, 'a' => 1, 'b' => 2, 'c' => 3], $collection->unshift(0)->toArray());
    }

    public function testShift()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['b' => 2, 'c' => 3], $collection->shift()->toArray());
    }

    public function testPop()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'b' => 2], $collection->pop()->toArray());
    }

    public function testSplice()
    {
        $collection = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['b' => 2, 'c' => 3], $collection->splice(['a' => 1, 'b' => 2, 'c' => 3], 1, 1)->toArray());
    }
}