<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 8/21/14
 * Time: 10:47 AM
 */

namespace Blame\Model\Behavior;


use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\Event\Event;

class BlameBehavior extends Behavior {

	public function setUser(Entity $entity, $user) {
		if ($entity->isNew()) {
			$entity->set('created_by', $user);
		}
		$entity->set('modified_by', $user);
	}


	public function beforeSave(Event $event, Entity $entity, $options) {
		if (!empty($options['loggedInUser'])) {
			$this->setUser($entity, $options['loggedInUser']);
		}
	}

} 