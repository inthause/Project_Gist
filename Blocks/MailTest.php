<?php

namespace Project\Gist\Blocks;

use Change\Presentation\Blocks\Event;
use Change\Presentation\Blocks\Parameters;
use Change\Presentation\Blocks\Standard\Block;

/**
 * @name \Project\Gist\Blocks\MailTest
 */
class MailTest extends Block
{
	/**
	 * @api
	 * Set Block Parameters on $event
	 * Required Event method: getBlockLayout, getApplication, getApplicationServices, getServices, getHttpRequest
	 * Optional Event method: getHttpRequest
	 * @param Event $event
	 * @return Parameters
	 */
	protected function parameterize($event)
	{
		$parameters = parent::parameterize($event);
		$parameters->setLayoutParameters($event->getBlockLayout());

		$parameters->setNoCache();

		$substitutions = $event->getParam('substitutions');
		if (is_array($substitutions))
		{
			if (isset($substitutions['orderId']))
			{
				$parameters->setParameterValue('orderId', intval($substitutions['orderId']));
			}
		}

		return $parameters;
	}

	/**
	 * Set $attributes and return a twig template file name OR set HtmlCallback on result
	 * Required Event method: getBlockLayout, getBlockParameters, getApplication, getApplicationServices, getServices, getHttpRequest
	 * @param Event $event
	 * @param \ArrayObject $attributes
	 * @return string|null
	 */
	protected function execute($event, $attributes)
	{
		$parameters = $event->getBlockParameters();
		$orderId = $parameters->getParameter('orderId');

		$order = $event->getApplicationServices()->getDocumentManager()->getDocumentInstance($orderId);
		if ($order instanceof \Rbs\Order\Documents\Order)
		{
			$attributes['order'] = $order;
			return 'MailTest.twig';
		}
		return null;
	}
}