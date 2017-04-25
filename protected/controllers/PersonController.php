<?php

class PersonController extends Controller
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
        return array(
            /*
              array('allow', // allow all users to perform 'index' and 'view' actions
              'actions' => array(),
              'users' => array('*'),
              ),
              array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array(),
              'users' => array('@'),
              ), */
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('previewmarkdown', 'index', 'view', 'create', 'update', 'admin', 'delete', 'searching'),
                'users' => array('adm'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Prewiev Mrkitup
     */
    public function actionMdpreview()
    {
        $parser = new CMarkdownParser;
        $parsedText = $parser->safeTransform($_POST['data']);
        echo $parsedText;
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'history' => History::model()->find('person_id=:id', array(':id' => $id)),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Person;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            $model->whose_id = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('history/admin', 'History[person_id]' => $model->id));
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
    public function actionUpdate($id)
    {

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Person'])) {
            $model->attributes = $_POST['Person'];
            $model->whose_id = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(Yii::app()->createUrl('history/admin', array('person_id' => $id)));
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
     * Lists all models.
     */
    public function actionIndex()
    {

        $model = new OverallSearchForm;
        $criteria = new CDbCriteria;

        if (isset($_POST['OverallSearchForm'])) {
            $model->attributes = $_POST['OverallSearchForm'];

            if ($model->validate()) {

                $criteria->condition = 'whose_id=1';
                $criteria->addCondition('fio like "%' . $model->search_string . '%"', 'AND');
                $criteria->addCondition('whois like "%' . $model->search_string . '%"', 'OR');
                $criteria->addCondition('telh like "%' . $model->search_string . '%"', 'OR');
                $criteria->addCondition('fax like "%' . $model->search_string . '%"', 'OR');
                $criteria->addCondition('mob1 like "%' . $model->search_string . '%"', 'OR');
                $criteria->addCondition('mob2 like "%' . $model->search_string . '%"', 'OR');
            }
        } else {
            $criteria->compare('whois', 'клиент', true);
        }
        $dataProvider = new CActiveDataProvider('Person', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 30,
            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Person('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Person']))
            $model->attributes = $_GET['Person'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Person the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Person::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Person $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'person-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
