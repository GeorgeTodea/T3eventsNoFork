<?php

namespace DWenzel\T3events\Tests;
use DWenzel\T3events\Domain\Model\Dto\ButtonDemand;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Core\Imaging\Icon;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Dirk Wenzel <wenzel@cps-it.de>
 *  All rights reserved
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the text file GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class ButtonDemandTest extends  UnitTestCase
{
    /**
     * @var ButtonDemand
     */
    protected $subject;

    /**
     * set up
     */
    protected function setUp(): void
    {
        $this->subject = new ButtonDemand();
    }

    /**
     * @test
     */
    public function getTableInitiallyReturnsNull() {
        $this->assertNull(
            $this->subject->getTable()
        );
    }

    /**
     * @test
     */
    public function setTableForStringSetsTable() {
        $table = 'foo';
        $this->subject->setTable($table);
        $this->assertSame(
            $table,
            $this->subject->getTable()
        );
    }

    /**
     * @test
     */
    public function getActionInitiallyReturnsNull() {
        $this->assertNull(
            $this->subject->getAction()
        );
    }

    /**
     * @test
     */
    public function setActionForStringSetsAction() {
        $action = 'foo';
        $this->subject->setAction($action);
        $this->assertSame(
            $action,
            $this->subject->getAction()
        );
    }

    /**
     * @test
     */
    public function getOverlayInitiallyReturnsNull() {
        $this->assertNull(
            $this->subject->getOverlay()
        );
    }

    /**
     * @test
     */
    public function setOverlayForStringSetsOverlay() {
        $overlay = 'foo';
        $this->subject->setOverlay($overlay);
        $this->assertSame(
            $overlay,
            $this->subject->getOverlay()
        );
    }

    /**
     * @test
     */
    public function getLabelKeyInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->getLabelKey()
        );
    }

    /**
     * @test
     */
    public function setLabelKeyForStringSetsLabelKey()
    {
        $labelKey = 'foo';
        $this->subject->setLabelKey($labelKey);
        $this->assertSame(
            $labelKey,
            $this->subject->getLabelKey()
        );
    }

    /**
     * @test
     */
    public function getIconKeyInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->getIconKey()
        );
    }

    /**
     * @test
     */
    public function setIconKeyForStringSetsIconKey()
    {
        $iconKey = 'foo';
        $this->subject->setIconKey($iconKey);
        $this->assertSame(
            $iconKey,
            $this->subject->getIconKey()
        );
    }

     /**
     * @test
     */
    public function getIconSizeInitiallyDefaultValue()
    {
        $this->assertSame(
            Icon::SIZE_DEFAULT,
            $this->subject->getIconSize()
        );
    }

    /**
     * @test
     */
    public function setIconSizeForStringSetsIconSize()
    {
        $iconSize = 'foo';
        $this->subject->setIconSize($iconSize);
        $this->assertSame(
            $iconSize,
            $this->subject->getIconSize()
        );
    }
}
