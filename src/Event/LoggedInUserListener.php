<?php
namespace Ceeram\Blame\Event;

use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Event\EventListener;
use Cake\ORM\Entity;

/**
 * Class LoggedInUserListener
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
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
		$options['loggedInUser'] = $this->Auth->user('id');
	}

}