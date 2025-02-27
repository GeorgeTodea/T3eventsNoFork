<?php

namespace DWenzel\T3events\Tests\Unit\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *  (c) 2015 Dirk Wenzel <dirk.wenzel@cps-it.de>
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

use DWenzel\T3events\Domain\Repository\PersonRepository;
use DWenzel\T3events\Tests\Unit\Domain\Model\Dto\MockDemandTrait;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Test case for class \DWenzel\T3events\Domain\Repository\PersonRepository.
 *
 * @author Dirk Wenzel <dirk.wenzel@cps-it.de>
 */
class PersonRepositoryTest extends UnitTestCase
{
    use MockQueryTrait, MockDemandTrait;

    /**
     * @var PersonRepository|MockObject
     */
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = $this->getAccessibleMock(
            PersonRepository::class,
            ['dummy'], [], '', false);
    }

    /**
     * @test
     */
    public function createConstraintsFromDemandInitiallyReturnsEmptyArray()
    {
        $demand = $this->getMockDemand();
        $query = $this->getMockQuery();

        $this->assertEquals(
            [],
            $this->fixture->createConstraintsFromDemand($query, $demand)
        );
    }
}
