<?php

namespace Ceeram\Blame\Controller;

use Ceeram\Blame\Event\LoggedInUserListener;

/**
 * Class BlameTrait
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
trait BlameTrait {

	public function loadModel($modelClass = null, $type = 'Table') {
		parent::loadModel($modelClass, $type);
		$listener = new LoggedInUserListener($this->Auth);
		$this->{$modelClass}->eventManager()->attach($listener);
	}

} 