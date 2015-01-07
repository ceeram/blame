<?php
namespace Ceeram\Blame\Event;

use ArrayObject;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\ORM\Entity;

/**
 * Class LoggedInUserListener
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
class LoggedInUserListener implements EventListenerInterface {

/**
 * @var AuthComponent
 */
	protected $_Auth;

/**
 * Constructor
 *
 * @param \Cake\Controller\Component\AuthComponent $Auth Authcomponent
 */
	public function __construct(AuthComponent $Auth) {
		$this->_Auth = $Auth;
	}

/**
 * {@inheritDoc}
 */
	public function implementedEvents() {
		return [
			'Model.beforeSave' => [
				'callable' => 'beforeSave',
				'priority' => -100
			]
		];
	}

/**
 * Before save listener.
 *
 * @param \Cake\Event\Event $event The beforeSave event that was fired
 * @param \Cake\ORM\Entity $entity The entity that is going to be saved
 * @param \ArrayObject $options the options passed to the save method
 * @return void
 */
	public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
		if (empty($options['loggedInUser'])) {
			$options['loggedInUser'] = $this->_Auth->user('id');
		}
	}

}
