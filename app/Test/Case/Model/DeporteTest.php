<?php
App::uses('Deporte', 'Model');

/**
 * Deporte Test Case
 *
 */
class DeporteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.deporte',
		'app.liga'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Deporte = ClassRegistry::init('Deporte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Deporte);

		parent::tearDown();
	}

}
