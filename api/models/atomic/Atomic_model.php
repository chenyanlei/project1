<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Atomic_model extends CI_Model
{
	protected $table_name;
	protected $real_del = true;
	protected $del_field = 'del';
	protected $not_del_value = 0 ;
	protected $del_value 	 = 1 ;


	public function __construct()
	{
		parent::__construct();
		//echo $this->db->last_query();
	}

	public function slt_res_arr($where=null, $select=null, $limit=null, $offset=null, $order_by=null, $group=null)
	{
		$slt = $this->slt($where, $select, $limit, $offset, $order_by, $group);
		return $slt->result_array();
	}

	public function slt_row_arr($where=null, $select=null, $order_by=null)
	{
		$slt = $this->slt_one($where, $select, $order_by);
		return $slt->row_array();
	}

	public function ins($arr)
	{
		return (false !== $this->db->insert($this->table_name, $arr)) ? array('insert_id'=>$this->db->insert_id()) : array();
	}

	public function ins_batch($data) {
		return (false !== $this->db->insert_batch($this->table_name, $data)) ? array('insert_id'=>$this->db->insert_id()) : array();
	}

	public function upd($arr, $where)
	{
		return (false !== $this->db->update($this->table_name, $arr, $where)) ? array('affected_rows'=>$this->db->affected_rows()) : array();
	}

	public function ins_or_upd($arr,$where) {
		$cnt = $this->cnt($where) ;
		if($cnt > 0) {
			$rst = $this->upd($arr, $where) ;
			if(empty($rst)) {
				return -1;
			}
			return 1;
		} else {
			$rst = $this->ins($arr) ;
			if(empty($rst)) {
				return -2;
			}
			return 2;
		}
	}

	public function del($where)
	{
		if($this->real_del) {
			return (false !== $this->db->delete($this->table_name, $where)) ? array('affected_rows'=>$this->db->affected_rows()) : array();
		} else {
			$ary = array($this->del_field => 1) ;
			return $this->upd($ary, $where) ;
		}
	}

	public function cnt($where=null, $or_where=null)
	{
		if (is_array($where) && isset($where['#in#']) && isset($where['#arr#']))
		{
			$this->db->where_in($where['#in#'], $where['#arr#']);
		} elseif (null !== $where)
		{
			$this->db->where($where);
		}
		if (null !== $or_where)
		{
			$this->db->or_where($or_where);
		}
		if(!$this->real_del) {
			$this->db->where($this->del_field, $this->not_del_value);
		}
		return $this->db->count_all_results($this->table_name); //return value is 0 or real_number(int)
	}

	/**
	 * 执行原生sql语句
	 *
	 * @param $sql
	 */
	public function query($sql) {
		return $this->db->query($sql) ;
	}

	private function slt($where=null, $select=null, $limit=null, $offset=null, $order_by=null, $group=null)
	{
		if (is_array($where) && isset($where['#in#']) && isset($where['#arr#']))
		{
			$this->db->where_in($where['#in#'], $where['#arr#']);
		}
		elseif (null !== $where)
		{
			$this->db->where($where);
		}
		if (null !== $select)
		{
			$this->db->select($select);
		}
		if (null !== $order_by)
		{
			$this->db->order_by($order_by);
		}
		if (null !== $group)
		{
			$this->db->group_by($group); 
		}

		if(!$this->real_del) {
			$this->db->where($this->del_field, $this->not_del_value);
		}
		return $this->db->get($this->table_name, $limit, $offset); //CI active_record return: array(RESULT) or array();
	}

	private function slt_one($where=null, $select=null, $order_by=null)
	{
		if (null !== $select)
		{
			$this->db->select($select);
		}
		if (null !== $order_by)
		{
			$this->db->order_by($order_by);
		}
		$this->db->where($where);

		if(!$this->real_del) {
			$this->db->where($this->del_field, $this->not_del_value);
		}

		return $this->db->get($this->table_name, 1); //CI active_record return: array(RESULT) or array();
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */