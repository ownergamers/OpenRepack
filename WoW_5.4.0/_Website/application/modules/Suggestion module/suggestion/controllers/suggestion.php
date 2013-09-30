<?php

class suggestion extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		Modules::run('login/is_logged_in');
	}
	
	public function index()
	{
		$this->load->model('viewModel');
		$rows = $this->viewModel->get();
		
		foreach($rows as $key => $value)
		{
			$rows[$key]['nickname'] = $this->user->getNickname($value['user_id']);
		}
		$data = array(
			"rows" => $rows
		);
		
		// Load the view and pass the data
		$content = $this->template->loadPage("make.tpl");
		$contents = $this->template->loadPage("view.tpl", $data);
		
		// Put the view in a nice content box with a headline
		$box = $this->template->box("Make a suggestion", $content);
		$box .= $this->template->box("Submitted Suggestion", $contents);

		// Output the view
		$this->template->view($box, "modules/suggestion/css/main.css");
		
	}
	
	public function submit()
	{
		$this->load->model('makeModel');
		$querys = $this->makeModel->submit();
		$content = $this->template->loadPage("success.tpl");
		$box = $this->template->box("Success!", $content);
		$this->template->view($box);
	}
}