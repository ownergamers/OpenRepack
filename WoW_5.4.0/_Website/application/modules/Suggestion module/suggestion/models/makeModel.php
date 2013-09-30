<?php

class makeModel extends CI_Model
{
	public function submit()
	{
		$userid = $this->user->getNickname();
		$id = $this->db->query("SELECT id FROM account_data WHERE nickname = ?", array($userid));
		$id_row = $id->result_array();
		$querys = $this->db->query("INSERT INTO suggestion (details, user_id) VALUES (? ,?)", array($this->input->post('details'), $id_row[0]['id']));
		return $querys;
	}
}