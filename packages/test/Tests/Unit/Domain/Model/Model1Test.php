<?php

declare(strict_types=1);

namespace Analogde\Test\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class Model1Test extends UnitTestCase
{
    /**
     * @var \Analogde\Test\Domain\Model\Model1|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Analogde\Test\Domain\Model\Model1::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getModel2ReturnsInitialValueForModel2(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getModel2()
        );
    }

    /**
     * @test
     */
    public function setModel2ForObjectStorageContainingModel2SetsModel2(): void
    {
        $model2 = new \Analogde\Test\Domain\Model\Model2();
        $objectStorageHoldingExactlyOneModel2 = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneModel2->attach($model2);
        $this->subject->setModel2($objectStorageHoldingExactlyOneModel2);

        self::assertEquals($objectStorageHoldingExactlyOneModel2, $this->subject->_get('model2'));
    }

    /**
     * @test
     */
    public function addModel2ToObjectStorageHoldingModel2(): void
    {
        $model2 = new \Analogde\Test\Domain\Model\Model2();
        $model2ObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $model2ObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($model2));
        $this->subject->_set('model2', $model2ObjectStorageMock);

        $this->subject->addModel2($model2);
    }

    /**
     * @test
     */
    public function removeModel2FromObjectStorageHoldingModel2(): void
    {
        $model2 = new \Analogde\Test\Domain\Model\Model2();
        $model2ObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $model2ObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($model2));
        $this->subject->_set('model2', $model2ObjectStorageMock);

        $this->subject->removeModel2($model2);
    }
}
