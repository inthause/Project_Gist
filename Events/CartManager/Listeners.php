<?php
/**
 * Copyright (C) 2014 Proximis
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
namespace Project\Gist\Events\CartManager;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
* @name \Project\Gist\Events\CartManager\Listeners
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

		$callback = function (\Change\Events\Event $event)
		{
			$cartData = $event->getParam('cartData');
			if (is_array($cartData) && isset($cartData['processData']['common']))
			{
				$authenticationManager = $event->getApplicationServices()->getAuthenticationManager();
				if ($authenticationManager->getConfirmed() && $authenticationManager->getCurrentUser()->authenticated())
				{
					$cartData['processData']['common']['currentStep'] = 'shipping';
					$event->setParam('cartData', $cartData);
				}
			}
		};
		$events->attach('getCartData', $callback);
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