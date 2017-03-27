<?php

/**
 * This is the model class for table "payoutmethods".
 *
 * The followings are the available columns in table 'payoutmethods':
 * @property integer $ID
 * @property string $config_name
 * @property string $name
 * @property integer $systemID
 * @property integer $position
 * @property integer $enabled
 * @property integer $papers_required
 *
 * The followings are the available model relations:
 * @property Payoutcredentials[] $payoutcredentials
 */
class Payoutmethods extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Payoutmethods the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'payoutmethods';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('config_name, name, systemID, position, enabled', 'required'),
            array('systemID, position, enabled, papers_required', 'numerical', 'integerOnly'=>true),
            array('config_name', 'length', 'max'=>16),
            array('name', 'length', 'max'=>32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, config_name, name, systemID, position, enabled, papers_required', 'safe', 'on'=>'search'),
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
            'payoutcredentials' => array(self::HAS_MANY, 'Payoutcredentials', 'payoutmethodID'),
		);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID' => 'ID',
            'config_name' => 'Config Name',
            'name' => 'Name',
            'systemID' => 'System',
            'position' => 'Position',
            'enabled' => 'Enabled',
            'papers_required' => 'Papers Required',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
		
        $criteria->compare('ID',$this->ID);
        $criteria->compare('config_name',$this->config_name,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('systemID',$this->systemID);
        $criteria->compare('position',$this->position);
        $criteria->compare('enabled',$this->enabled);
        $criteria->compare('papers_required',$this->papers_required);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}