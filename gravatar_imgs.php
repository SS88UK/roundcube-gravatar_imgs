<?php

class gravatar_imgs extends rcube_plugin
{
	public $task = 'mail';

	function init()
	{
		$rcmail = rcmail::get_instance();
		$layout = $rcmail->config->get('layout');

		//if ($layout == 'widescreen')
		//{
			$this->add_hook('messages_list', array($this, 'messages_list'));
			$this->include_stylesheet('gravatar_imgs.css');
			$this->include_script('gravatar_imgs.js');
		//}
	}
  
	public function messages_list($p)
	{
		if (!empty($p['messages'])) {
			$rcmail = rcmail::get_instance();
			
			$layout = $rcmail->config->get('layout');
			
			//if ($layout == 'widescreen') {
				$gravatar_imgs = array();
				
				foreach ($p['messages'] as $index => $message)
				{
					preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $message->from, $matches);
					$gravatar_imgs[$message->uid] = '<img src="https://www.gravatar.com/avatar/'.md5( strtolower( trim( $matches[0][0] ) ) ).'?d=mm" alt="" class="gravatar_imgs_img" />';
				}

				$rcmail->output->set_env('gravatar_imgs', $gravatar_imgs);
			//}
		}

		return $p;
	}
}
