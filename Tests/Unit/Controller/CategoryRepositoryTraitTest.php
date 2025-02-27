<?php

namespace DWenzel\T3events\Tests\Unit\Controller;

use DWenzel\T3events\Controller\CategoryRepositoryTrait;
use DWenzel\T3events\Domain\Repository\CategoryRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/***************************************************************
 *  Copyright notice
 *  (c) 2016 Dirk Wenzel <dirk.wenzel@cps-it.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class CategoryRepositoryTraitTest
 *
 * @package DWenzel\T3events\Tests\Unit\Controller
 */
class CategoryRepositoryTraitTest extends UnitTestCase
{
    /**
     * @var CategoryRepositoryTrait
     */
    protected $subject;

    /**
     * set up
     */
    protected function setUp(): void
    {
        $this->subject = $this->getMockForTrait(
            \DWenzel\T3events\Controller\CategoryRepositoryTrait::class
        );
    }

    /**
     * @test
     */
    public function categoryRepositoryCanBeInjected()
    {
        /** @var CategoryRepository|\PHPUnit_Framework_MockObject_MockObject $categoryRepository */
        $categoryRepository = $this->getMockBuilder(CategoryRepository::class)
            ->disableOriginalConstructor()->getMock();

        $this->subject->injectCategoryRepository($categoryRepository);

        $this->assertAttributeSame(
            $categoryRepository,
            'categoryRepository',
            $this->subject
        );
    }
}
