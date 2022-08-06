<?php

declare(strict_types=1);

namespace Analogde\Test\Domain\Model;


/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Model1
 */
class Model1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * model2
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Analogde\Test\Domain\Model\Model2>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $model2 = null;

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->model2 = $this->model2 ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Model2
     *
     * @param \Analogde\Test\Domain\Model\Model2 $model2
     * @return void
     */
    public function addModel2(\Analogde\Test\Domain\Model\Model2 $model2)
    {
        $this->model2->attach($model2);
    }

    /**
     * Removes a Model2
     *
     * @param \Analogde\Test\Domain\Model\Model2 $model2ToRemove The Model2 to be removed
     * @return void
     */
    public function removeModel2(\Analogde\Test\Domain\Model\Model2 $model2ToRemove)
    {
        $this->model2->detach($model2ToRemove);
    }

    /**
     * Returns the model2
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Analogde\Test\Domain\Model\Model2>
     */
    public function getModel2()
    {
        return $this->model2;
    }

    /**
     * Sets the model2
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Analogde\Test\Domain\Model\Model2> $model2
     * @return void
     */
    public function setModel2(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $model2)
    {
        $this->model2 = $model2;
    }
}
