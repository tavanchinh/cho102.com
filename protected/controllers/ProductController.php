<?php

class ProductController extends Controller
{
    public function actionDetail($id)
    {
        $model = Product::model()->findByPk($id);
        if($model == null) $this->redirect('/');
        $list_image = Product::model()->GetListImages($id);
        $cate = Category::model()->findByPk($model->cat_id);
        $user = User::model()->findByPk($model->user_id);
        //CVarDumper::dump($list_image,10,true);die;
        $this->render('detail',array(
            'model' => $model,
            'list_image' => $list_image,
            'cate' => $cate,
            'user' => $user,
        ));
    }

    public function actionCreate()
    {
        $model = new Product();
        $model->type = 0;
        
        $logged = isset($_COOKIE['logged']) ? json_decode($_COOKIE['logged'], true) : null;
        $user_info = null;
        if ($logged != null) {
            $user_info = User::model()->findByAttributes(array(
                'email' => $logged['email'],
                'password' => $logged['password'],
                ));
        }
        if (is_null($user_info)) {
            Yii::app()->user->setFlash('error',
                'Bạn vui lòng đăng nhập trước khi thực hiện hành động này');
        } else {
            if ($user_info->city_id == null || $user_info->district_id == null || $user_info->
                phone_number == null) {
                Yii::app()->user->setFlash('error',
                    'Bạn vui lòng cập nhật một số thông tin liên hệ trước khi đăng tin');
                $rel = Yii::app()->request->requestUri;
                $this->redirect('/user/info?rel=' . urlencode($rel));
            }
        }
         
        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            $model->price = str_replace(",", "", $model->price);
            $model->create_date = date('Y-m-d H:i:s');
            $model->user_id = Yii::app()->session['user_id'];
            $images = $_POST['images'];
            //Lưu ảnh và tạo thumnail
            if (count($images) > 0) {
                $model->avatar = $images[0];
                if($model->validate()){
                    $model->save();
                    Yii::app()->user->setFlash('success','Đăng tin thành công. Hệ thống sẽ kiểm duyệt tin của bạn trong ít phút.');
                    
                    //Tạo notification
                    $notification = new Notification;
                    $notification->title = $user_info->name .' đã đăng một sản phẩm mới';
                    $notification->type = 1;
                    $notification->product_id = $model->id;
                    $notification->save();
                    
                    //Tạo thông báo cho từng người cùng là friend của người đăng
                    $list_friends_id = User::model()->getListFriends($user_info->id);
                    if(count($list_friends_id)){
                        foreach($list_friends_id as $value){
                            $user_noti = new UserNotification;
                            $user_noti->user_id = $value;
                            $user_noti->notification_id = $notification->id;
                            $user_noti->save(); 
                            
                            
                        }
                    }
        
                }else{
                    CVarDumper::dump($model->errors,10,true);
                }
                
                foreach ($images as $image_item) {
                    //echo $image_item;die();
                    if ($image_item != '') {
                        //echo $image_item;die;
                        $pro_img = new ProImage();
                        $pro_img->pro_id = $model->id;
                        $pro_img->img = $image_item;
                        $pro_img->save();
                        if($pro_img->validate()){
                            $pro_img->save();
                        }else{
                            CVarDumper::dump($pro_img->errors,10,true);
                        }
                        
                    }

                }
            }
            $model->unsetAttributes();
            $model->type = 0;
        }

        $this->render('create', array(
            'model' => $model,
            'user_info' => $user_info,
            ));
    }

    public function actionUploadImage()
    {
        //echo Product::model()->getFullPathImageByName('1032140383353f720db99b-201503790.jpg');die();
        $max_file_size = 2 * 1024 * 1024;
        $allow_types = array(
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/jpg');
        $date_folder = date('Y') . '/' . date('m');
        $relative_path = '/uploads/' . $date_folder . '/';
        $path_save_image = Yii::getPathOfAlias('webroot') . $relative_path;
        $data = array(
            'image' => '',
            'error' => '',
            'path' => $relative_path,
            );
        //echo $path_save_image;die();
        if (!is_dir($path_save_image)) {
            mkdir($path_save_image, 0777, true);
        }
        $file = $_FILES['file'];
        //var_dump($file);die();
        $number_files = count($file['name']);
        for ($i = 0; $i < $number_files; $i++) {
            if (0 < $file['error'][$i]) {
                $data['error'][] = $file['error'][$i];
            } elseif ($file['size'][$i] > $max_file_size) {
                $data['error'][] = $file['name'][$i] . ' dung lượng file vượt quá 2MB';
            } elseif (!in_array($file['type'][$i], $allow_types)) {
                $data['error'][] = $file['name'][$i] . ' định dạng file không chính xác';
            } else {
                $tmp_name = CVietnameseTools::makeUrlFriendly($file['name'][$i]);
                $exploded = explode('.', $tmp_name);
                //echo $tmp_name;
                $new_name = $exploded[0] . '-' . date('Ym') . rand(111, 999) . '.' . $exploded[1];
                if (move_uploaded_file($file['tmp_name'][$i], $path_save_image . $new_name)) {
                    $data['image'][] = $new_name;
                }
            }
        }
        echo json_encode($data);
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
    */
}
