<?php
namespace Ceeram\Blame\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\Event\Event;

/**
 * Class BlameBehavior
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
class BlameBehavior extends Behavior {

	public function beforeSave(Event $event, Entity $entity, $options) {
		if (empty($options['loggedInUser'])) {
			return;
		}
		if ($entity->isNew()) {
			$entity->set('created_by', $options['loggedInUser']);
		}
		$entity->set('modified_by', $options['loggedInUser']);
	}

} 
