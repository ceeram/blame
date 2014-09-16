<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 8/21/14
 * Time: 10:36 AM
 */

namespace Ceeram\Blame\Event;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Event\EventListener;
use Cake\ORM\Entity;

/**
 * Class LoggedInUserListener
 */
class LoggedInUserListener implements EventListener {

	protected $Auth;

	public function __construct(AuthComponent $Auth) {
		$this->Auth = $Auth;
	}

	public function implementedEvents() {
		return [
			'Model.beforeSave' => [
				'callable' => 'beforeSave',
				'priority' => -100
			]
		];
	}

	public function beforeSave(Event $event, Entity $entity, $options) {
		debug('imhere');
		$options['loggedInUser'] = $this->getUser();
	}

	protected function getUser() {
		return $this->Auth->user('id');
	}
} 