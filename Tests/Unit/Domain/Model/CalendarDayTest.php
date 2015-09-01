<?php
namespace Webfox\T3events\Tests\Unit\Domain\Model;

use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Webfox\T3events\Domain\Model\CalendarDay;
use Webfox\T3events\Domain\Model\Event;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Dirk Wenzel <dirk.wenzel@cps-it.de>
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

/**
 * Class CalendarDayTest
 *
 * @package Webfox\T3events\Tests\Unit\Domain\Model
 * @coversDefaultClass \Webfox\Domain\Model\CalendarDay
 */
class CalendarDayTest extends UnitTestCase {

	/**
	 * @var CalendarDay
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = $this->getAccessibleMock(
			'Webfox\\T3events\\Domain\\Model\\CalendarDay',
			array('dummy'), array(), '', TRUE
		);
	}

	/**
	 * @test
	 * @covers ::getDate
	 */
	public function getDateReturnsInitiallyNull() {
		$this->assertNull(
			$this->fixture->getDate()
		);
	}

	/**
	 * @test
	 * @covers ::setDate
	 */
	public function setDateForDateTimeSetsDate() {
		$dateTime = new \DateTime();
		$this->fixture->setDate($dateTime);

		$this->assertSame(
			$dateTime,
			$this->fixture->getDate()
		);
	}

	/**
	 * @test
	 * @covers ::getDayOfMonth
	 */
	public function getDayReturnsInitiallyNull() {
		$this->assertNull(
			$this->fixture->getDay()
		);
	}

	/**
	 * @test
	 * @covers ::getDayOfMonth
	 */
	public function getDayForStringReturnsDayOfMonth() {
		$timeStamp = 1441065600;
		$dateTime = new \DateTime('@' . $timeStamp);
		$expectedDay = date('d', $timeStamp);
		$this->fixture->setDate($dateTime);
		$this->assertSame(
			$expectedDay,
			$this->fixture->getDay()
		);
	}

	/**
	 * @test
	 * @covers ::getDayOfMonth
	 */
	public function getDayOfWeekForIntegerReturnsInitiallyNull() {
		$this->assertNull(
			$this->fixture->getDayOfWeek()
		);
	}

	/**
	 * @test
	 * @covers ::getDayOfMonth
	 */
	public function getDayOfWeekForIntegerReturnsDayOfWeek() {
		$timeStamp = 1441065600;
		$dateTime = new \DateTime('@' . $timeStamp);
		$dayOfWeek = (int)date('w', $timeStamp);
		$this->fixture->setDate($dateTime);
		$this->assertSame(
			$dayOfWeek,
			$this->fixture->getDayOfWeek()
		);
	}

	/**
	 * @test
	 * @covers ::getIsCurrent
	 */
	public function getIsCurrentForBooleanReturnsInitiallyFalse() {
		$this->assertFalse(
			$this->fixture->getIsCurrent()
		);
	}

	/**
	 * @test
	 * @covers ::setIsCurrent
	 */
	public function setIsCurrentForBooleanSetsIsCurrent() {
		$this->fixture->setIsCurrent(TRUE);
		$this->assertTrue(
			$this->fixture->getIsCurrent()
		);
	}

	/**
	 * @test
	 * @covers ::getEvents
	 */
	public function getEventsForReturnsInitiallyEmptyObjectStorage() {
		$emptyObjectStorage = new ObjectStorage();

		$this->assertEquals(
			$emptyObjectStorage,
			$this->fixture->getEvents()
		);
	}

	/**
	 * @test
	 * @covers ::setEvents
	 */
	public function setEventsForObjectStorageSetsEvents() {
		$emptyObjectStorage = new ObjectStorage();
		$this->fixture->setEvents($emptyObjectStorage);

		$this->assertSame(
			$emptyObjectStorage,
			$this->fixture->getEvents()
		);
	}

	/**
	 * @test
	 * @covers ::addEvent
	 */
	public function addEventForObjectAddsEvent() {
		$event = new Event();
		$this->fixture->addEvent($event);
		$this->assertTrue(
			$this->fixture->getEvents()->contains($event)
		);
	}

	/**
	 * @test
	 * @covers ::removeEvent
	 */
	public function removeEventForObjectRemovesEvent() {
		$event = new Event();
		$objectStorageContainingOneEvent = new ObjectStorage();
		$objectStorageContainingOneEvent->attach($event);

		$this->fixture->setEvents($objectStorageContainingOneEvent);
		$this->fixture->removeEvent($event);
		$this->assertFalse(
			$this->fixture->getEvents()->contains($event)
		);
	}
}