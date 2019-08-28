<?php

namespace Live\Collection;

use PHPUnit\Framework\TestCase;

class FileCollectionTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function objectCanBeConstructed()
    {
        $collection = new FileCollection("file.txt");
        return $collection;
    }

    /**
     * @test
     * @depends objectCanBeConstructed
     * @doesNotPerformAssertions
     */
    public function dataCanBeWritten()
    {
        $collection = new FileCollection("file.txt");
        $collection->set('Added value');
    }

     /**
     * @test
     * @depends dataCanBeWritten
     */
    public function dataCanBeRead()
    {
        $collection = new FileCollection("file.txt");
        $collection->set('Read Value');
        
        $this->assertEquals('Read Value', $collection->get('Read Value'));
    }

    /**
     * @test
     * @depends objectCanBeConstructed
     */
    public function newCollectionShouldBeEmpty()
    {
        $collection = new FileCollection("file.txt");
        $this->assertEquals(0, $collection->empty());
    }

    /**
     * @test
     * @depends newCollectionShouldBeEmpty
     */
    public function collectionCanBeCleaned()
    {
        $collection = new FileCollection("file.txt");
        $collection->set('Value to be cleaned');
        
        $collection->clean();
        $this->assertEquals(0, $collection->empty());
    }

}