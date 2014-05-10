<?php

class SubscriptionController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'subscribe','payment'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Subscription;

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Subscription'])) {
            $model->attributes = $_POST['Subscription'];
            $model->user_id = yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Subscription'])) {
            $model->attributes = $_POST['Subscription'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * subscription for a particular model.
     * If subscription is successful, the browser will be redirected to the 'Payment' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionSubscribe($id, $package_id, $package_group) {
        $user_id = yii::app()->user->id;
        if ($package_id > 0 && $package_group > 0) {
            Yii::app()->db->createCommand('UPDATE {{user_subscription}} SET package_id = ' . $package_id . ', subscription_type = ' . $package_group . ' WHERE user_id =' . $user_id . '')->execute();
        }
        $model = $this->loadModel($id);
        //get user data        
        //$usr = User::model()->findByAttributes(array('id' => $user_id));
        $user = $this->loadModelUser($user_id);
        //get user profile data
        $profile_value = $this->get_profile_id($user_id);
        if ($profile_value < 1) {
            Yii::app()->db->createCommand('INSERT INTO {{user_profile}} (`user_id`) VALUES ("' . $user_id . '")')->execute();
        }
        $prof = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        $profile = $this->loadModelProfile($prof->id);        
        //$profile->scenario = 'subscribe';
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $user, $profile));

        if (isset($_POST['Subscription'], $_POST['User'], $_POST['UserProfile'])) {
            $model->attributes = $_POST['Subscription'];
            $user->attributes = $_POST['User'];
            $profile->attributes = $_POST['UserProfile'];
            if ($model->validate() && $user->validate() && $profile->validate()) {
                if ($model->save()) {
                    $user->save();
                    $profile->save();
                    Yii::app()->user->setFlash('success', 'Your Subscription is succesfully submitted.');
                    $this->redirect(array('subscription/payment', 'id' => $model->id));
                }
            }
        }
        $this->render('subscribe', array(
            'model' => $model,
            'user' => $user,
            'profile' => $profile,
            'package_id' => $package_id,
            'package_group' => $package_group
        ));
    }

    /**
     * Payment for a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionPayment($id) {
        $model = $this->loadModel($id);
        $this->render('Payment', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Subscription');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Subscription('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Subscription']))
            $model->attributes = $_GET['Subscription'];

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
        $model = Subscription::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelUser($id) {
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

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'subscription-form') {
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

}
