<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $userData;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'application.views.layouts.column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
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
        //Yii::app()->theme = Yii::app()->user->getCurrentTheme();
        //Yii::app()->theme = 'teacher';
        //parent::init();
        if (isset(Yii::app()->user->user_type)) {
            if (Yii::app()->user->user_type == 1) {
                Yii::app()->user->setFlash('error', 'Invalid request! Please do not repeat this request again!!');
                //$this->redirect('http://www.envnews.org/backend.php');
            }
        }
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group . ' AND controller_type=0')
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
        $model->user_type = 0;
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

    public function getUserNameByID($id) {
        $name = Yii::app()->db->createCommand()
                ->select('username')
                ->from('{{user}} u')
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
                ->select('username')
                ->from('{{user}} u')
                ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                ->queryScalar();
        return $name;
    }

    public function firstNwords($str, $n) {
        return preg_replace('/((\b\w+\b.*?){' . $n . '}).*$/s', '$1', $str);
    }

    public function strip_html_tags($string) {

        $string = str_replace("\r", ' ', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        $pattern = '/<[^>]*>/';
        $string = preg_replace($pattern, ' ', $string);
        $string = trim(preg_replace('/ {2,}/', ' ', $string));

        return $string;
    }

    public function text_cut($text, $length = 200, $dots = true) {
        $text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));
        $text_temp = $text;
        while (substr($text, $length, 1) != " ") {
            $length++;
            if ($length > strlen($text)) {
                break;
            }
        }
        $text = substr($text, 0, $length);
        return $text . ( ( $dots == true && $text != '' && strlen($text_temp) > $length ) ? '...' : '');
    }

    public function get_category_name($id) {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{news_category}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function get_news_source($id) {
        if (isset($id)) {
            $value = Yii::app()->db->createCommand()
                    ->select('title')
                    ->from('{{news_source}}')
                    ->where('id=' . $id)
                    ->queryScalar();
        } else {
            return null;
        }
    }

    public function get_latest_news_catid($cat_id) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news}}')
                ->where('cat_id IN(SELECT id FROM {{news_category}} WHERE id=' . $cat_id . ' OR parent_id=' . $cat_id . ') AND state = 1')
                ->limit('10')
                ->order('published_date DESC, id DESC')
                ->queryAll();
        //echo '<h4>Latest News</h4>';
        echo '<ul class="nav nav-tabs nav-stacked">';
        echo'<li class="nav-header">' . $this->get_category_name($cat_id) . ' Latest</li>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('news/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_news_source_list() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{news_source}}')
                ->where('published=1')
                ->order('title')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>News by Source</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li style="margin-right:2px;">';
            echo CHtml::link('<i class="fa fa-screenshot"></i> ' . $values['title'], array('news/source', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_latest_source_news($source_id) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news}}')
                ->where('sorc_id =' . $source_id . ' AND state=1')
                ->limit('10')
                ->order('published_date DESC, id DESC')
                ->queryAll();
        echo '<ul class="nav nav-tabs nav-stacked">';
        echo'<li class="nav-header">' . $this->get_news_source($source_id) . ' Latest</li>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('news/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_news_categories() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news_category}}')
                ->where('published=1 AND parent_id=14')
                ->order('title')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>News by Category</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="fa fa-screenshot"></i> ' . $values['title'], array('/news/category', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_children_categories($id) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news_category}}')
                ->where('published=1 AND parent_id=' . $id)
                ->order('title')
                ->queryAll();
              if (count($array) > 0) {
		        echo '<fieldset>';
		        echo '<legend>Children categories</legend>';
		        echo '<ul class="nav nav-pills">';
		        foreach ($array as $key => $values) {
		            echo '<li style="margin-right:10px;">' . CHtml::link('<i class="fa fa-th-large"></i> ' . $values['title'], array('/news/category', 'id' => $values['id'])) . '</li>';
		        }
		        echo '</ul>';
		        echo '</fieldset>';
        	}
    }

    public function get_latest_news() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news}}')
                ->where('state=1')
                ->limit('10')
                ->order('published_date DESC, id DESC')
                ->queryAll();
        echo '<ul class="nav nav-tabs nav-stacked">';
        echo'<li class="nav-header">Latest News</li>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('news/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_latest_news_thiscategory($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news}}')
                ->where('state=1 AND cat_id=' . $catid)
                ->limit('10')
                ->order('published_date DESC, id DESC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>This category latest</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="fa fa-minus"></i> ' . $values['title'], array('/news/view', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_news_cat_footer($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{news_category}}')
                ->where('published=1 AND parent_id=' . $catid)
                ->order('id ASC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>' . NewsCategory::getNewsCategoryName($catid) . '</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="fa fa-adjust"></i> ' . $values['title'], array('/news/category', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_news_source_footer() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{news_source}}')
                ->where('published=1')
                ->order('title')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>News Source</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="fa fa-adjust"></i> ' . $values['title'], array('/news/source', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }
    
    public function get_news_latest($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{news}}')
                ->where('state=1 AND cat_id=' . $catid)
                ->limit('10')
                ->order('published_date DESC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>Latest this category</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li style="margin-right:2px;">';
            echo CHtml::link('<i class="icon-chevron-right"></i> ' . $values['title'], array('news/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_news_popular($catid) {
        $date = new DateTime('30 days ago');
        $pre_sev = $date->format('Y-m-d H:i:s');

        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{news}}')
                ->where('state=1')
                ->where('published_date >="' . $pre_sev . '" AND state=1 AND cat_id=' . $catid)
                ->limit('10')
                ->order('hits DESC, id DESC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend>Popular this category</legend>';
        echo '<ul class="nav nav-pills nav-stacked">';
        foreach ($array as $key => $values) {
            echo '<li style="margin-right:2px;">';
            echo CHtml::link('<i class="icon-chevron-right"></i> ' . $values['title'], array('news/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

}