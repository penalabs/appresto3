<?php
Class Auth extends CI_Controller{
    
    
    
    function index(){
        $this->load->view('auth/login');
    }
    
    function cheklogin(){
        $email      = $this->input->post('email');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);

        // query chek users
        $array_where = array('email' => $email, 'password' => $password);

        $this->db->where($array_where);
        $this->db->from('tbl_user');
        $this->db->join('tbl_user_level', 'tbl_user_level.id_user_level = tbl_user.id_user_level');
        $users = $this->db->get();
        if($users->num_rows()>0){
            $user = $users->row_array();
            $this->session->set_userdata('masuk',TRUE);
                 if($user['nama_level']=='superadmin'){ //Akses superadmin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('superadmin');
                    echo $this->session->userdata('email');
 
                 }else if($user['nama_level']=='adminresto'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('adminresto');
                    echo $this->session->userdata('email');
                 }else if($user['nama_level']=='generalmanager'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('generalmanager');
                    echo $this->session->userdata('email');
                 }
                 else if($user['nama_level']=='bendahara'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('bendahara');
                    echo $this->session->userdata('email');
                 }else if($user['nama_level']=='logistik'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('logistik');
                    echo $this->session->userdata('email');
                 }else if($user['nama_level']=='produksi'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('produksi');
                    echo $this->session->userdata('email');
                 }else if($user['nama_level']=='owner'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('owner');
                    echo $this->session->userdata('email');
                 }else if($user['nama_level']=='waiter'){ //akses admin
                    $session_data = array(
                        'nama_level'  => $user['nama_level'],
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'images' => $user['images'],
                        'id_user_level' => $user['id_user_level'],
                        'is_aktif' => $user['is_aktif']
                    );
                    $this->session->set_userdata($session_data);
                    redirect('waiter');
                    echo $this->session->userdata('email');
                 }
                 echo 1;
        }else{
            $this->session->set_flashdata('status_login','email atau password yang anda input salah');
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
