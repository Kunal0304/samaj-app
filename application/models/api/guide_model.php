<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guide_model extends CI_Model
{

    public function insert($table_name = '', $data = '')
    {
        $query = $this->db->insert($table_name, $data);
        if ($query) return $this->db->insert_id();
        else return FALSE;
    }

    public function checkAlreadyExist($table = '', $email ='') {
        $condition = "email = '".$email."'";
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
	
	public function login($table_name = '', $id_array = '', $columns = array())
    {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) return true;
        else return FALSE;
    }

     public function get_row($table_name = '', $id_array = '', $columns = array())
    {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) return $query->row();
        else return FALSE;
    }

    public function get_result($table_name = '', $id_array = '', $columns = array(),$order_by = array())
    {
        if(!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if(!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) return $query->result();
        else return FALSE;
    }

    public function update($table_name = '', $data = '', $id_array = '')
    {
        if(!empty($id_array)):
            foreach($id_array as $key => $value){
                $this->db->where($key, $value);
            }
        endif;
        return $this->db->update($table_name, $data);
    }
    
     public function fetch_join($f_table_data='',$s_table_data='',$ftable='',$stable='',$cond='',$join='',$where=''){
    $this->db->select($f_table_data,$s_table_data); 
    $this->db->from($ftable);
    $this->db->join($stable, $cond, $join); 
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result();

    }
    
    public function delete($table_name = '', $id_array = ''){
        return $this->db->delete($table_name, $id_array);
    }
 }
 ?>