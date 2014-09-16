<?php
namespace Blame\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\Event\Event;

/**
 * Class BlameBehavior
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