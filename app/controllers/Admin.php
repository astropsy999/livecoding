<?php
class Admin extends Controller
{
/**
 * Admin page class
 */

 /**
 * Метод для отображения главной страницы панели администратора
 */
public function index()
{
    // Проверяем, авторизован ли пользователь
    if (!Auth::logged_in()) {
        message('Будь ласка увійдіть, щоб мати доступ до панелі адміністратора');
        redirect('login');
    }

    $data['title'] = 'Dashboard';
    $this->view('admin/dashboard', $data);
}

public function courses($action=null, $id=null) {

    // Проверяем, авторизован ли пользователь
    if (!Auth::logged_in()) {
        message('Будь ласка увійдіть, щоб мати доступ до панелі адміністратора');
        redirect('login');
    }

    $data = [];
    $data['action'] = $action;
    $data['id'] = $id;

    if($action == 'add') {

        $category = new Category_model();
        $course = new Course_model();

        $data['categories'] = $category->findAll('asc');

        if($_SERVER['REQUEST_METHOD'] == "POST"){

             if($course->validate($_POST)){

                $user_id = Auth::getId();
                $_POST['date'] = date("Y-m-d H:m:s");
                $_POST['user_id'] = $user_id;

                $course->insert($_POST);

                $row = $course->first(['user_id'=>$user_id, 'published'=>0]);
                message('Ваш курс успішно створено');
                if($row){
                redirect('admin/courses/edit/'.$row->$id);
                }else{
                redirect('admin/courses');
                }
            }

             $data['errors'] = $course->errors;


        }
    }

    $this->view('admin/courses', $data);

}

/**
 * Метод для отображения профиля администратора
 * @param int|null $id - идентификатор пользователя (по умолчанию null)
 */
public function profile($id = null)
{
    // Если идентификатор пользователя не указан, используем идентификатор текущего пользователя
    $id = $id ?? Auth::getId();

    // Проверяем, авторизован ли пользователь
    if (!Auth::logged_in()) {
        message('Будь ласка увійдіть, щоб мати доступ до панелі адміністратора');
        redirect('login');
    }

    $user = new User();
    $data['row'] = $row = $user->first(['id' => $id]);

     // Обработка данных, отправленных методом POST
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

        $folder = 'uploads/images/';

        // Создаем папку, если она не существует
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
            file_put_contents($folder . "index.php", "<?php");
            file_put_contents("uploads/index.php", "<?php");
        }
        if($user->edit_validate($_POST, $id)){
        $allowed = ['image/jpeg'];



        // Загрузка изображения, если оно присутствует в запросе
        if (!empty($_FILES['image']['name'])) {
            if ($_FILES['image']['error'] == 0) {
                if (in_array($_FILES['image']['type'], $allowed)) {
                    $destination = $folder . time() . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                    resize_image($destination);
                    $_POST['image'] = $destination;
                    // Удаляем файл если он уже существует
                    if(file_exists($row->image)) {
                        unlink($row->image);
                    }
                } else {
                    $user->errors['image'] = 'Цей тип файлів не дозволено';
                }
            } else {
                $user->errors['image'] = 'Неможливо завантажити зображення';
            }
        }

        // Обновление данных пользователя
        $user->update($id, $_POST);

        // message('Профіль вдало збережено');
        // redirect('admin/profile/' . $id);
        }
         if(empty($user->errors)) {
            $arr['message'] = 'Профіль вдало збережено';
        }else {
            $arr['message'] = 'Будь ласка виправте помилку';
            $arr['errors'] = $user->errors;
        }

        echo json_encode($arr);
        die;
    }

    $data['title'] = 'Profile';
    $data['errors'] = $user->errors;
    $this->view('admin/profile', $data);
}

 }