<?php
App::uses('Row', 'Model');

/**
 * Row Test Case
 *
 */
class RowTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.row',
		'app.bet',
		'app.user',
		'app.group',
		'app.game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Row = ClassRegistry::init('Row');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Row);

		parent::tearDown();
	}

}
