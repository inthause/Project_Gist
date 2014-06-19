<?php
/**
 * Copyright (C) 2014 Eric Hauswald
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
namespace Project\Gist\Blocks;

use Change\Presentation\Blocks\Event;

/**
 * @name \Project\Gist\Blocks\Override
 */
class Update
{
	/**
	 * @see \Rbs\Website\Blocks\XhtmlTemplateInformation
	 * @param Event $event
	 */
	public function onUpdateXhtmlTemplateInformation(Event $event)
	{
		$information = $event->getParam('information');
		if ($information instanceof \Change\Presentation\Blocks\Information)
		{
			$i18nManager = $event->getApplicationServices()->getI18nManager();
			$templateInformation = $information->addTemplateInformation('Project_Gist', 'test.twig');
			$templateInformation->setLabel($i18nManager->trans('m.project.gist.admin.template_test_label', ['ucf']));

			$templateInformation->addParameterInformation('monParamDeTest')
				->setLabel($i18nManager->trans('m.project.gist.admin.mon_param_de_test', ['ucf']));
		}
	}
}