<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {

        parent::__construct();
        // Your own constructor code
        $this->load->model('UserModel');
        $this->load->library('session');

    }
    public function forms()
    {

        $this->load->helper('form');
        $this->load->view('form_veiw');

    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->view('welcome_message');

	}

	public function add_user()
    {

        $this->load->model('UserModel');
        $name='kero';
        $country='mina';
        $mail='g@gmail.com';
        $this->UserModel->add_user($name,$country,$mail);

    }

    public function show_user()
    {

        $this->load->model('UserModel');
        $data['user']=$this->UserModel->get_user_id(2);
        $this->load->view('show_user',$data);

    }



	public function users()
    {

        $this->load->model('UserModel');
        $data['users']=$this->UserModel->get_users();
        $this->load->view('Users_view',$data);

    }

    public function update_users()
    {

        $data['user_name']='salma';
        $data['mail']='keroles.nabil.dev@gmail.com';
        $this->load->model('UserModel');
        $this->UserModel->update_user(4,$data);

    }

    public function get_user_mail()
    {

        $this->load->model('UserModel');
        $data['users']=$this->UserModel->get_user_mail();

        $this->load->view('get_user_mail.php',$data);

    }


    public function delete_user()
    {

        $this->load->model('UserModel');
        $this->UserModel->delete_user(2);

    }

    public function get_user_orderBy()
    {

        $this->load->model('UserModel');
        $data['users']=$this->UserModel->get_user_orderBy('user_name');
        $this->load->view('get_user_order',$data);

    }

    public function indetx()
    {

        $old=$this->UserModel->get_first_books();

        foreach ($old->result() as $row )
        {
            echo $row->name;
        }

    }
    public function table_person()
    {

        $this->load->model('UserModel');
        $all_tebel_person=$this->UserModel->get_all_table_person();

//        $num_rows=$all_tebel_person->num_rows();
//        echo 'unmber of rows'.$num_rows;
      //  foreach ($all_tebel_person->result_array() as $person)

//        $row=$all_tebel_person->row();
//        echo $row->frist_name;

        foreach ($all_tebel_person as $person)
        {
            echo $person->frist_name;
            echo '<br>';
            echo $person->last_name;
            echo '<br>';
            echo $person->country;
            echo '<br>';
            echo '<hr>';
        }

    }

    function index2()
    {

        $books=$this->UserModel->get_first_books();
        $row=$books->next_row();
        echo 'ID :' .$row->id;
        echo '<br>';
        echo 'name :'.$row->name;

        echo $books->num_fields();

    }

    function index3 ()
    {

        $book['name']='c#';
        $book['author']='4 dummies';
        $this->UserModel->add_book($book);

        echo $this->db->insert_id();

    }

    public function index4()
    {

        $this->load->library('form_validation');
        $result='';
        if ($this->input->post('submit')=='submit')
        {

            $this->form_validation->set_rules('first_name',' name ','required|max_length[6]|min_length[3]');

            $this->benchmark->mark('mark_one');

            $this->form_validation->set_rules('last_name',' name ','required|max_length[6]|min_length[3]');

            $this->benchmark->mark('mark_two');

            $this->form_validation->set_message('required','$s هذا الحقل مطلوب');
            $this->benchmark->mark('mark_three');

            echo $this->benchmark->elapsed_time('mark_one','mark_two');
            echo $this->benchmark->elapsed_time('mark_one','mark_three');
            echo $this->benchmark->elapsed_time('mark_two','three');


            if ( $this->form_validation->run())
            {
                $result='الادخالات صحيحه';
            }
            else{

                $result=validation_errors();

            }

        }

           $data['result']=$result;

        $this->load->view('view_index4',$data);

    }
    public function index_session()
    {
        $this->load->library('session');

//        $newdata =array(
//            'username'  =>'keroles',
//            'email'     =>'k@gmail.com',
//            'logged_in' =>TRUE
//
//        );
//        $this->session->set_userdata($newdata);
//
//       // echo $this->session->last_activity;
//
//        $this->session->set_userdata('email');


        //not work

         $this->session->sess_destroy();

        $a=$this->session->all_userdata();

        echo '<pre>';
        var_dump($a);

    }

    public function index_set_flasdata()
    {

        $this->session->set_flashdata('result','edit success');

    }
    public function index_test_set_flasdata()
    {

        $this->session->keep_flashdata('result');


        echo $this->session->flashdata('result');

    }

    public function index_parser_class()
    {
        $this->load->library('parser');

        $data['title']='title';
        $data['content']='content';

        $data['items']=array(
            array('title'     =>'title1', 'content'   =>'content1'),
            array('title'     =>'title2', 'content'   =>'content2'),
            array('title'     =>'title3', 'content'   =>'content3'),
            array('title'     =>'title4', 'content'   =>'content4')
        );

        $this->parser->parse('index_parser_class_view', $data);
        //echo $var;

        //        $view='<h1>{title}</h1><p>{content}</p>';
        //
        //        $var=$this->parser->parse_string($view,$data,true);
        //        echo $var;
        //
        //
        //        $this->load->view('index_parser_class_view',$data);

    }

    public function get_all_users_database()
    {

        $this->load->library('parser');

        $data['title']='title';
        $data['content']='content';

        $users=$this->UserModel->get_all_users_database();
        $data['users']=$users->result_array();
        $this->parser->parse('get_all_users_database_view',$data);
    }

    public function email_helper()
    {
        $this->load->helper('email');
       if(valid_email('email'))
       {
           send_email('dvsvs@gmail.com','sdvdsvsdv@gmail.com','sdvsdvsdvdsv');
       }
       else
       {
           echo 'email is not valid';
       }
    }

    public function upload_file()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $data['res'] ='';

        if($this->input->post('submit')=='upload'){


           // $config['file_name']='image';

            $this->load->library('upload');


           // $this->upload->initialize($config);


            $data['res']='';

            if($this->upload->do_upload('file'))
            {
                $data['res']='Done';
                $upload=$this->upload->data();

                echo '<pre>';
                var_dump($upload);
            }
            else
            {
                $data['res']=$this->upload->display_errors();
            }

        }

        $this->load->view('upload_file_view',$data);
    }

    public function Ajax_test()
    {
        $this->load->view('Ajax_test');
    }
    public function info_Ajax_test()
    {

        echo $this->input->post('name');
        echo '<br>';
        echo $this->input->post('age');
        echo '<br>';
        echo $this->input->post('country');
    }


}
