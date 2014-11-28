<?php
/**
 * Copyright (C) 2014 Eric Hauswald
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
namespace Project\Gist\Collection;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
 * @name \Project\Gist\Collection\Listeners
 */
class Listeners implements ListenerAggregateInterface
{
	/**
	 * Attach one or more listeners
	 * Implementors may add an optional $priority argument; the EventManager
	 * implementation will pass this to the aggregate.
	 * @param EventManagerInterface $events
	 * @return void
	 */
	public function attach(EventManagerInterface $events)
	{
		$events->attach(\Change\Collection\CollectionManager::EVENT_GET_CODES, function (\Change\Events\Event $event) {
			$codes = $event->getParam('codes', []);
			$codes[] = 'Ma_Collection';
			$event->setParam('codes', $codes);
		});

		$callback = function (\Change\Events\Event $event)
		{
			switch ($event->getParam('code'))
			{
				case 'Ma_Collection':
					$applicationServices = $event->getApplicationServices();
					if ($applicationServices)
					{
						$i18n = $applicationServices->getI18nManager();
						$items = array(
							'v1' => ['label' => '1er valeur', 'title' => 'Première valeur'],
							'v2' => '2ème valeur',
							'v3' => '3ème valeur'
						);
						$collection = new \Change\Collection\CollectionArray('Ma_Collection', $items);
						$event->setParam('collection', $collection);
						$event->stopPropagation();
					}
					break;
			}
		};
		$events->attach(\Change\Collection\CollectionManager::EVENT_GET_COLLECTION, $callback);
	}

	/**
	 * Detach all previously attached listeners
	 * @param EventManagerInterface $events
	 * @return void
	 */
	public function detach(EventManagerInterface $events)
	{
		// TODO: Implement detach() method.
	}
}
