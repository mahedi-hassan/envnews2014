<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'create', 'view', 'activate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view', 'edit'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionActivate($id, $activation) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('activation')
                ->from('{{user}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        if (!empty($activation) OR !empty($id)) {
            if ($activation == $returnValue) {
                Yii::app()->db->createCommand('UPDATE {{user}} SET `status` = 1 WHERE id=' . $id)->execute();
                Yii::app()->user->setFlash('success', 'Account verification successful. Please login.');
                $this->redirect(array('site/login'));
            } else {
                Yii::app()->user->setFlash('error', 'Account verification not successful. Please try again!');
                $this->redirect(array('site/login'));
            }
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $profile_value = $this->get_profile_id($id);
        if ($profile_value < 1) {
            $this->redirect(array('update', 'id' => $model->id));
        }else{
        $value = UserProfile::model()->findByAttributes(array('user_id' => $id));
        $sub = Subscription::model()->findByAttributes(array('user_id' => $id));
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'profile' => $this->loadModelProfile($value->id),
            'subscription' => $this->loadModelSubscription($sub->id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        $profile = new UserProfile;

        //$path = Yii::app()->basePath . '/../uploads/profile_picture';
        //if (!is_dir($path)) {
        //mkdir($path);
        //}
        $this->performAjaxValidation(array($model, $profile));
        if (isset($_POST['User'], $_POST['UserProfile'])) {
            $model->attributes = $_POST['User'];
            $profile->attributes = $_POST['UserProfile'];
            if ($model->validate()) {
                $model->back_pwd = $model->password;
                $model->password = SHA1($model->password);
                $model->verifyPassword = SHA1($model->verifyPassword);
                $model->registerDate = new CDbExpression('NOW()');
                $model->lastvisitDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
                $model->group_id = 7;
                $model->status = 4;
                if ($model->save()) {
                    $identity = new UserIdentity($model->username, $model->back_pwd);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);
                    //Save profile
                    $profile->user_id = $model->id;
                    $profile->save();                    
                    //Send mail to user
                    $message = "Hello " . $model->name . ", <br /><br />";
                    $message .= "Welcome to ENVNEWS.ORG. Please click on the link below to activate your account.  Alternatively, you can copy and paste the complete URL on the address bar of your browser and then press the Enter key.  <br /><br />";
                    $message .= 'http://' . $_SERVER['HTTP_HOST'] . $this->createUrl('user/activate', array("id" => $model->id, "activation" => $model->activation));
                    $message .= "<br /><br />Sincerely, <br />ENVNEWS.ORG Team";
                    $to = $model->email;
                    $subject = 'Welcome to ENVNEWS.ORG';
                    $fromName = Yii::app()->params['adminName'];
                    $fromMail = Yii::app()->params['adminEmail'];
                    User::sendMail($to, $subject, $message, $fromName, $fromMail);

                    Yii::app()->user->setFlash('success', 'Thanks for registering with us! Please check your email to activate account.');
                    $this->redirect(array('/package/group'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'profile' => $profile,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        //get user profile
        //if no profile then create profile first        
        $profile_value = $this->get_profile_id($id);
        if ($profile_value < 1) {
            Yii::app()->db->createCommand('INSERT INTO {{user_profile}} (`user_id`) VALUES ("' . $id . '")')->execute();
        }
        $value = UserProfile::model()->findByAttributes(array('user_id' => $id));
        $profile = $this->loadModelProfile($value->id);
        //get user subscription data
        $subscription_value = $this->get_subscription_id($id);
        if ($subscription_value < 1) {
            Yii::app()->db->createCommand('INSERT INTO {{user_subscription}} (`user_id`) VALUES ("' . $id . '")')->execute();
        }
        $sub = Subscription::model()->findByAttributes(array('user_id' => $id));
        $subscription = $this->loadModelSubscription($sub->id);
            
        $previuosFileName = $profile->profile_picture;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }
            $this->performAjaxValidation(array($model, $profile, $subscription));

            if (isset($_POST['User'], $_POST['UserProfile'], $_POST['Subscription'])) {
                $model->attributes = $_POST['User'];
                $profile->attributes = $_POST['UserProfile'];
                $subscription->attributes = $_POST['Subscription'];
                $model->activation = md5(microtime());
                if ($model->validate() && $subscription->validate() && $profile->validate()) {
                    //Picture upload script
                    if (@!empty($_FILES['UserProfile']['name']['profile_picture'])) {
                        $profile->profile_picture = $_POST['UserProfile']['profile_picture'];

                        if ($profile->validate(array('profile_picture'))) {
                            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $previuosFileName;
                            if ((is_file($filePath)) && (file_exists($filePath))) {
                                unlink($filePath);
                            }
                            $profile->profile_picture = CUploadedFile::getInstance($profile, 'profile_picture');
                        } else {
                            $profile->profile_picture = '';
                        }
                        $profile->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($profile->profile_picture)));
                        $profile->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($profile->profile_picture));
                    } else {
                        $profile->profile_picture = $previuosFileName;
                    }
                    if ($model->save()) {
                        $profile->save();
                        $subscription->save();
                        Yii::app()->user->setFlash('success', 'User has been updated successfully!');
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            }
            $this->render('update', array(
                'model' => $model,
                'profile' => $profile,
                'subscription' => $subscription,
            ));        
    }

    public function actionEdit($id) {
        $this->layout = '//layouts/column2';
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->password = SHA1($model->password);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Password Changed successfully');
                $this->redirect(array('view', 'id' => $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Password Changed Unsuccessful!');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('edit', array(
            'model' => $model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelProfile($id) {
        $model = UserProfile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelSubscription($id) {
        $model = Subscription::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function get_profile_id($user_id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('COUNT(*)')
                ->from('{{user_profile}}')
                ->where('user_id=' . $user_id)
                ->queryScalar();
        return $returnValue;
}
public function get_subscription_id($user_id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('COUNT(*)')
                ->from('{{user_subscription}}')
                ->where('user_id=' . $user_id)
                ->queryScalar();
        return $returnValue;
}

}
