<?php
namespace DWenzel\T3events\Tests\Unit\Domain\Model;

/***************************************************************
     *  Copyright notice
     *  (c) 2012 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
     *            Michael Kasten <kasten@webfox01.de>, Agentur Webfox
     *  All rights reserved
     *  This script is part of the TYPO3 project. The TYPO3 project is
     *  free software; you can redistribute it and/or modify
     *  it under the terms of the GNU General Public License as published by
     *  the Free Software Foundation; either version 2 of the License, or
     *  (at your option) any later version.
     *  The GNU General Public License can be found at
     *  http://www.gnu.org/copyleft/gpl.html.
     *  This script is distributed in the hope that it will be useful,
     *  but WITHOUT ANY WARRANTY; without even the implied warranty of
     *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *  GNU General Public License for more details.
     *  This copyright notice MUST APPEAR in all copies of the script!
     ***************************************************************/

use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \DWenzel\T3events\Domain\Model\PerformanceStatus.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @package TYPO3
 * @subpackage Events
 * @author Dirk Wenzel <wenzel@webfox01.de>
 * @author Michael Kasten <kasten@webfox01.de>
 */
class PerformanceStatusTest extends UnitTestCase
{

    /**
     * @var \DWenzel\T3events\Domain\Model\PerformanceStatus
     */
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new \DWenzel\T3events\Domain\Model\PerformanceStatus();
    }

    protected function tearDown(): void
    {
        unset($this->fixture);
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        $this->assertNull($this->fixture->getTitle());
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->fixture->setTitle('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getTitle()
        );
    }

    /**
     * @test
     */
    public function getCssClassReturnsInitialValueForString()
    {
        $this->assertNull($this->fixture->getCssClass());
    }

    /**
     * @test
     */
    public function setCssClassForStringSetsCssClass()
    {
        $this->fixture->setCssClass('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getCssClass()
        );
    }

    /**
     * @test
     */
    public function getPriorityReturnsInitialValueForInteger()
    {
        $this->assertSame(
            2147483647,
            $this->fixture->getPriority()
        );
    }

    /**
     * @test
     */
    public function setPriorityForIntegerSetsPriority()
    {
        $this->fixture->setPriority(12);

        $this->assertSame(
            12,
            $this->fixture->getPriority()
        );
    }
}
