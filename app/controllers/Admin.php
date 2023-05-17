<?php

/**
 * Admin page class
 */

 class Admin extends Controller
 {

    public function index()
    {
        if(!Auth::logged_in()){
            message('Будь ласка увійдіть, щоб мати доступ до панелі адміністратора');
            redirect('login');
        }
        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard',$data);
    }

    public function profile($id=null)
    {
        $id = $id ?? Auth::getId();

        if(!Auth::logged_in()){
            message('Будь ласка увійдіть, щоб мати доступ до панелі адміністратора');
            redirect('login');
        }

        $user = new User();
        $data['row'] = $row = $user->first(['id'=>$id]);

        $folder = 'uploads/images/';
        if(!file_exists($folder)) {
            mkdir($folder, 0777, true);
            file_put_contents($folder ."index.php", "<?php");
            file_put_contents("uploads/index.php", "<?php");
        }



        $allowed = ['image/jpeg'];

        if($_SERVER['REQUEST_METHOD'] == "POST" && $row) {



            if(!empty($_FILES['image']['name'])){
                if($_FILES['image']['error'] == 0) {
                    if(in_array($_FILES['image']['type'], $allowed)) {
                        $destination = $folder.time().$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        $_POST['image'] = $destination;

                    }else {
                    $user->errors['image'] = 'Цей тип файлів не дозволено';
                }
                }else {
                    $user->errors['image'] = 'Неможливо завантажити зображення';
                }
            };

            $user->update($id, $_POST);

            redirect('admin/profile/'.$id);

        }
        $data['title'] = 'Profile';
        $this->view('admin/profile',$data);
    }

 }