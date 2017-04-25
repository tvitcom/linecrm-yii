<?php

/**
 * This is the model class for table "{{persons}}".
 *
 * The followings are the available columns in table '{{persons}}':
 * @property string $id
 * @property string $whose_id
 * @property string $fio
 * @property string $whois
 * @property string $organis
 * @property string $emails
 * @property string $telh
 * @property string $fax
 * @property string $mob2
 * @property string $mob1
 * @property string $addr
 * @property string $addrh
 * @property string $addrw
 * @property string $web
 * @property string $birth
 * @property string $note
 * @property string $foto
 * @property string $cat
 */
class Person extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{persons}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('whois', 'required'),
            array('fio', 'length', 'max' => 62),
            array('whois, addrw', 'length', 'max' => 80),
            array('organis', 'length', 'max' => 93),
            array('emails', 'length', 'max' => 57),
            array('telh, fax, mob2, mob1', 'length', 'max' => 16),
            array('addr', 'length', 'max' => 148),
            array('addrh', 'length', 'max' => 100),
            array('web', 'length', 'max' => 43),
            array('birth', 'date', 'format' => 'yyyy-mm-dd'),
            array('note', 'length', 'max' => 65363),
            array('foto, cat', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, whose_id, fio, whois, organis, emails, telh, fax, mob2, mob1, cat', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        //'RelPseudonim'=>array('RelationType', 'ClassName', 'ForeignKey','otherparams')
        return array(
            'owner' => array(self::BELONGS_TO, 'Profile', 'whose_id'),
            'talk' => array(self::HAS_MANY, 'History', 'person_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('m', 'ID'),
            'whose_id' => Yii::t('m', 'Owner'),
            'fio' => Yii::t('m', 'Fio'),
            'whois' => Yii::t('m', 'Whois'),
            'organis' => Yii::t('m', 'Organis'),
            'emails' => Yii::t('m', 'Emails'),
            'telh' => Yii::t('m', 'Telh'),
            'fax' => Yii::t('m', 'Fax'),
            'mob2' => Yii::t('m', 'Mob2'),
            'mob1' => Yii::t('m', 'Mob1'),
            'addr' => Yii::t('m', 'Addr'),
            'addrh' => Yii::t('m', 'Addrh'),
            'addrw' => Yii::t('m', 'Addrw'),
            'web' => Yii::t('m', 'Web'),
            'birth' => Yii::t('m', 'Birth'),
            'note' => Yii::t('m', 'Note'),
            'foto' => Yii::t('m', 'Foto'),
            'cat' => Yii::t('m', 'Cat'),
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
        $criteria->compare('whose_id', $this->whose_id, true);
        $criteria->compare('fio', $this->fio, true);
        $criteria->compare('whois', $this->whois, true);
        //$criteria->compare('organis',$this->organis,true);
        //$criteria->compare('emails',$this->emails,true);
        $criteria->compare('telh', $this->telh, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('mob2', $this->mob2, true);
        $criteria->compare('mob1', $this->mob1, true);
        //$criteria->compare('addr',$this->addr,true);
        //$criteria->compare('addrh',$this->addrh,true);
        //$criteria->compare('addrw',$this->addrw,true);
        //$criteria->compare('web',$this->web,true);
        //$criteria->compare('birth',$this->birth,true);
        //$criteria->compare('note',$this->note,true);
        //$criteria->compare('foto',$this->foto,true);
        //$criteria->compare('cat',$this->cat,true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Person the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
