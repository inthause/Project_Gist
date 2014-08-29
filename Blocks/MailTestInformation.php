<?php
namespace Project\Gist\Blocks;

/**
 * @name \Project\Gist\Blocks\MailTestInformation
 */
class MailTestInformation extends \Change\Presentation\Blocks\Information
{
	public function onInformation(\Change\Events\Event $event)
	{
		parent::onInformation($event);
		$i18nManager = $event->getApplicationServices()->getI18nManager();
		$ucf = array('ucf');
		$this->setSection($i18nManager->trans('m.project.gist.admin.module_name', $ucf));
		$this->setLabel($i18nManager->trans('m.project.gist.admin.mail_test', $ucf));
		$this->setMailSuitable(true);
		$this->addTTL(0);
	}
}