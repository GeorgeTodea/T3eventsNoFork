<?php
namespace DWenzel\T3events\Tests\Unit\Controller;

use DWenzel\T3events\Controller\ModuleDataTrait;
use DWenzel\T3events\Domain\Model\Dto\ModuleData;
use DWenzel\T3events\Service\ModuleDataStorageService;
use DWenzel\T3events\Utility\SettingsInterface as SI;
use PHPUnit\Framework\TestCase;
use DWenzel\T3events\Tests\Unit\Object\MockObjectManagerTrait;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Dirk Wenzel <dirk.wenzel@cps-it.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class ModuleDataTraitTest extends TestCase
{
    use \DWenzel\T3events\Tests\Unit\Object\MockObjectManagerTrait;

    /**
     * @var ModuleDataTrait|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject;

    /**
     * set up
     */
    protected function setUp(): void
    {
        $this->subject = $this->getMockBuilder(ModuleDataTrait::class)
            ->setMethods(['getModuleKey'])
            ->getMockForTrait();

        $this->objectManager = $this->getMockObjectManager();
        $this->inject($this->subject, 'objectManager', $this->objectManager);
    }

    /**
     * @test
     */
    public function moduleDataStorageServiceCanBeInjected()
    {
        $mockService = $this->getMockModuleDataStorageService();


        $this->subject->injectModuleDataStorageService($mockService);
        $this->assertAttributeSame(
            $mockService, 'moduleDataStorageService', $this->subject
        );
    }

    /**
     * @test
     */
    public function resetActionResetsAndPersistsModuleData()
    {
        $moduleKey = 'foo';

        /** @var ModuleData|\PHPUnit_Framework_MockObject_MockObject $mockModuleData */
        $mockModuleData = $this->getMockBuilder(ModuleData::class)->getMock();
        $this->objectManager->expects($this->once())
            ->method('get')
            ->with(ModuleData::class)
            ->will($this->returnValue($mockModuleData));

        $mockService = $this->getMockModuleDataStorageService(['persistModuleData']);
        $this->subject->injectModuleDataStorageService($mockService);

        $mockService->expects($this->once())
            ->method('persistModuleData')
            ->with($mockModuleData, $moduleKey);

        $this->subject->expects($this->once())
            ->method(SI::FORWARD)
            ->with('list');
        $this->subject->expects($this->once())
            ->method('getModuleKey')
            ->will($this->returnValue($moduleKey));

        $this->subject->resetAction();
    }

    /**
     * @test
     */
    public function initializeActionMergesSettings()
    {
        $expectedSettings = ['foo'];
        $this->subject = $this->getMockForTrait(
            ModuleDataTrait::class,
            [], '', true, true, true, ['mergeSettings']
        );

        $this->subject->expects($this->once())
            ->method('mergeSettings')
            ->will($this->returnValue($expectedSettings));

        $this->subject->initializeAction();
        $this->assertAttributeSame(
            $expectedSettings,
            SI::SETTINGS,
            $this->subject
        );
    }

    /**
     * @param array $methods Methods to mock
     * @return ModuleDataStorageService|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockModuleDataStorageService(array $methods = [])
    {
        return $this->getMockBuilder(ModuleDataStorageService::class)
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * @test
     */
    public function getModuleDataInitiallyReturnsNull() {
        $this->assertNull(
            $this->subject->getModuleData()
        );
    }

    /**
     * @test
     */
    public function moduleDataCanBeSet() {
        $moduleData = $this->getMockBuilder(ModuleData::class)->getMock();
        $this->subject->setModuleData($moduleData);

        $this->assertSame(
            $moduleData,
            $this->subject->getModuleData()
        );
    }
}
