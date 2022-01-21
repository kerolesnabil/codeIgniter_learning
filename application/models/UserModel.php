<?php

class UserModel extends CI_Model{

    public function get_users()
    {

        $query = $this->db->get('users');
        return $query->result();

    }

    public function get_user_by_id($id)
    {

        $this->db->where('id', $id);
        $query =$this->db->get('users');
        return $query->result();

    }

    public function get_user_id($id)
    {

        $query=$this->db->get_where('users',array('id'=> $id));

        return $query->result();

    }

    public function get_user_mail()
    {

        $this->db->select('mail , user_name , country');
        $query = $this->db->get('users');
        return $query->result();

    }

    public function add_user($name,$country,$mail)
    {

        $data['user_name']=$name;
        $data['country']=$country;
        $data['mail']=$mail;

        $this->db->insert('users',$data);

    }

    public function update_user($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('users',$data);

    }

    public function delete_user($id)
    {

        $this->db->where('id',$id);
        $this->db->delete();

    }
    public function get_user_orderBY($by)
    {

        $this->db->order_by($by);
        $this->db->limit(4);
        $query=$this->db->get('users');
        return $query->result();

    }

    function get_first_books()
    {

        return $this->db->get('books');

    }

    function get__book_by_id($id)
    {

        $id=$this->db->escape_str($id);
        $query='select * from books where id= ?';
        return $this->db->query($query , array($id));

    }

    function get_all_table_person()
    {

        $query=$this->db->get('table_person');
        return $query;

    }

    function add_book($book)
    {

        $this->db->select('id , name , author');
        $this->db->insert('books',$book);

    }

    function get_all_users_database()
    {
        return $this->db->get('users');
    }


}