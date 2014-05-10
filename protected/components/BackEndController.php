<?php

class BackEndController extends CController {

    public $userData;
    public $layout = 'application.views.layouts.column2';
    public $menu = array();
    public $heading;
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {        
        /*
          //if you want to use reflection
          $reflection = new ReflectionClass('scholarshipController');
          $methods = $reflection->getMethods();
          //uncomment this if you want to get the class methods with more details
          print "<pre>";
          print_r($methods);
          print "</pre>";
          //uncomment this if you want to get the class methods
          //print_r(get_class_methods($class));
         */
         if (isset(Yii::app()->user->user_type)) {
            if (Yii::app()->user->user_type == 0) {
                Yii::app()->user->setFlash('error', 'Invalid request! Please do not repeat this request again!!');
                //$this->redirect('http://www.envnews.org');
            }
        }
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group . ' AND controller_type=1')
                ->queryScalar();
        if (empty($val)) {
            $val = 1;
        } else {
            $val = $val;
        }
        return $val;
    }

    public function curPageURL() {
        $pageURL = 'http';
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    public function statistics($title, $yourbrowser, $curl) {
        $model = new Visitor;
        $model->user_type = 1;
        $model->user_id = Yii::app()->user->id;
        $model->user_name = Yii::app()->user->name;
        $model->server_time = new CDbExpression('NOW()');
        $model->page_title = $title;
        $model->page_link = $curl;
        $model->browser = $yourbrowser;
        $model->visitor_ip = $_SERVER['REMOTE_ADDR'];
        $model->save();
    }

    public function visitorStatistics() {
        $browser = Yii::app()->browser->getBrowser();
        $curl = $this->curPageURL();
        $this->statistics($this->pageTitle, $browser, $curl);
    }

    /**
     * get user full name from user id
     * @return type integer value
     */
    public function getUserNameByID($id) {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => $id))
                ->queryScalar();
        return $name;
    }

    /**
     * get user full name from session
     * @return type integer value
     */
    public function getUserName() {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                ->queryScalar();
        return $name;
    }

    public static function truncateText($text, $max_len) {
        $len = strlen($text, 'UTF-8');
        if ($len <= $max_len)
            return $text;
        else
            return substr($text, 0, $max_len - 1, 'UTF-8') . '...';
    }

}
