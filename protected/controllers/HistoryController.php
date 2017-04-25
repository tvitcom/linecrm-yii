<?php

class HistoryController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(/*
              array('allow', // allow all users to perform 'index' and 'view' actions
              'actions' => array(),
              'users' => array('*'),
              ),
              array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array(),
              'users' => array('@'),
              ), */
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'index', 'view', 'admin', 'delete'),
                'users' => array('adm'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('History', array(
            'criteria' => array(
                'condition' => 'ready != 1 AND schedule != "1900-01-01"',
                'order' => 'id DESC',
            ),
            'countCriteria' => array(),
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'admin' page.
     */
    public function actionCreate($person_id)
    {
        $model = new History;
        $model->person_id = intval($person_id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['History'])) {
            $model->attributes = $_POST['History'];
            if ($model->save())
                $this->redirect($this->createUrl('history/admin', array(
                        'person_id' => $model->person_id
                )));
        } elseif ($person_id) {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['History'])) {
            $model->attributes = $_POST['History'];
            if ($model->save())
                $this->redirect(array('history/admin', 'History[person_id]' => $model->person_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
        
    }
    
    public function actionPocket_form()
    {
        $model=new Pocket('in_history');

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='pocket-_pocket_form-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['Pocket']))
    {
        $model->attributes=$_POST['Pocket'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('_pocket_form',array('model'=>$model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {

        $history = new History('search');
        $history->unsetAttributes();  // clear any default values
        if (isset($_GET['person_id'])) {
            $person_id = $_GET['person_id'];
            $history->person_id = $person_id;
            $this->render('admin', array(
                'history' => $history,
                'person' => Person::model()->findByPk($person_id),
            ));
        } else
            $this->redirect($this->createUrl('person/index'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return History the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = History::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param History $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'history-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
