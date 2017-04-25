<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property string $id
 * @property string $login
 * @property string $passhash
 * @property string $email
 * @property integer $allow
 * @property string $tincoming
 * @property integer $developer
 */
class Profile extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{profiles}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('login, tincoming', 'required'),
            array('allow, developer', 'numerical', 'integerOnly' => true),
            array('login', 'length', 'max' => 30),
            array('passhash', 'length', 'max' => 64),
            array('email', 'length', 'max' => 25),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, login, passhash, email, allow, tincoming, developer', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'login' => 'Login',
            'passhash' => 'Passhash',
            'email' => 'Email',
            'allow' => 'Allow',
            'tincoming' => 'Tincoming',
            'developer' => 'Developer',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('passhash', $this->passhash, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('allow', $this->allow);
        $criteria->compare('tincoming', $this->tincoming, true);
        $criteria->compare('developer', $this->developer);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Profile the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
