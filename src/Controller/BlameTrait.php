<?php
namespace Ceeram\Blame\Controller;

use Ceeram\Blame\Event\LoggedInUserListener;

/**
 * Class BlameTrait
 */
trait BlameTrait {

	public function loadModel($modelClass = null, $type = 'Table') {
		parent::loadModel($modelClass, $type);
		$listener = new LoggedInUserListener($this->Auth);
		$this->{$modelClass}->eventManager()->attach($listener);
	}

} 