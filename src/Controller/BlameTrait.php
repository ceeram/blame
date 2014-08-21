<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 8/21/14
 * Time: 12:11 PM
 */

namespace Blame\Controller;

use Blame\Event\LoggedInUserListener;

trait BlameTrait {

	public function loadModel($modelClass = null, $type = 'Table') {
		parent::loadModel($modelClass, $type);
		$listener = new LoggedInUserListener($this->Auth);
		$this->{$modelClass}->eventManager()->attach($listener);
	}
} 