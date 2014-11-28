<?php
/**
 * Copyright (C) 2014 Eric Hauswald
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
namespace Project\Gist\Setup;

/**
 * @name \Project\Gist\Setup\Install
 */
class Install extends \Change\Plugins\InstallBase
{

	/**
	 * @param \Change\Plugins\Plugin $plugin
	 * @param \Change\Application $application
	 * @param \Change\Configuration\EditableConfiguration $configuration
	 * @throws \RuntimeException
	 */
	public function executeApplication($plugin, $application, $configuration)
	{
		$configuration->addPersistentEntry('Change/Events/BlockManager/Project_Gist', '\Project\Gist\Blocks\Listeners');
		$configuration->addPersistentEntry('Rbs/Mail/Events/MailManager/Project_Gist', '\Project\Gist\Mail\Listeners');

		$configuration->addPersistentEntry('Change/Events/CollectionManager/Project_Gist', '\Project\Gist\Collection\Listeners');

		$configuration->addPersistentEntry('Rbs/Commerce/Events/CartManager/Project_Gist', '\Project\Gist\Events\CartManager\Listeners');
	}

	/**
	 * @param \Zend\EventManager\EventManagerInterface $events
	 * @param \Change\Plugins\Plugin $plugin
	 */
//	public function attach($events, $plugin)
//	{
//		parent::attach($events, $plugin);
//	}

	/**
	 * @param \Change\Plugins\Plugin $plugin
	 */
//	public function initialize($plugin)
//	{
//	}



	/**
	 * @param \Change\Plugins\Plugin $plugin
	 * @param \Change\Services\ApplicationServices $applicationServices
	 * @throws \RuntimeException
	 */
//	public function executeServices($plugin, $applicationServices)
//	{
//	}

	/**
	 * @param \Change\Plugins\Plugin $plugin
	 */
//	public function finalize($plugin)
//	{
//	}
}
