<?php
App::uses('Game', 'Model');

/**
 * Game Test Case
 *
 */
class GameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.game',
		'app.row',
		'app.bet',
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Game = ClassRegistry::init('Game');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Game);

		parent::tearDown();
	}

}
