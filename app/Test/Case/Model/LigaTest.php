<?php
App::uses('Liga', 'Model');

/**
 * Liga Test Case
 *
 */
class LigaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.liga',
		'app.deporte'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Liga = ClassRegistry::init('Liga');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Liga);

		parent::tearDown();
	}

}
