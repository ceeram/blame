<?php
namespace Ceeram\Blame\Test\TestCase\Model\Behavior;

use Cake\Event\Event;
use Cake\I18n\Time;
use Ceeram\Blame\Model\Behavior\BlameBehavior;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Behavior test case
 */
class BlameBehaviorTest extends TestCase {

/**
 * autoFixtures
 *
 * Don't load fixtures for all tests
 *
 * @var bool
 */
	public $autoFixtures = false;

/**
 * fixtures
 *
 * @var array
 */
	public $fixtures = [
		'core.users'
	];

/**
 * testBeforeSave
 *
 * @return void
 */
	public function testBeforeSave() {
		$table = $this->getMock('Cake\ORM\Table');
		$this->Behavior = new BlameBehavior($table);

		$event = new Event('Model.beforeSave');
		$entity = new Entity(['name' => 'Foo']);

		$entity->isNew(false);
		$this->Behavior->beforeSave($event, $entity, ['loggedInUser' => 5]);

		$this->assertNull($entity->created_by, 'created_by is expected NOT to be updated');
		$this->assertSame(5, $entity->modified_by, 'modified_by is expected to be updated');

		$entity->isNew(true);
		$this->Behavior->beforeSave($event, $entity, ['loggedInUser' => 5]);

		$this->assertSame(5, $entity->created_by, 'modified_by is expected to be updated');
	}
}
