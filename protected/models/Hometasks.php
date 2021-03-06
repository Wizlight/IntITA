<?php

/**
 * This is the model class for table "hometasks".
 *
 * The followings are the available columns in table 'hometasks':
 * @property integer $HomeTaskID
 * @property integer $fkModuleID
 * @property integer $fkLectureID
 * @property string $HomeTaskName
 * @property string $HomeTaskDescription
 * @property string $HomeTask
 */
class Hometasks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hometasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkModuleID, fkLectureID, HomeTaskName, HomeTaskDescription, HomeTask', 'required'),
			array('fkModuleID, fkLectureID', 'numerical', 'integerOnly'=>true),
			array('HomeTaskName, HomeTaskDescription', 'length', 'max'=>45),
			array('HomeTask','length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HomeTaskID, fkModuleID, fkLectureID, HomeTaskName, HomeTaskDescription, HomeTask', 'safe', 'on'=>'search'),
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
			'HomeTaskID' => 'Home Task',
			'fkModuleID' => 'Module',
			'fkLectureID' => 'Lecture',
			'HomeTaskName' => 'Home Task title',
			'HomeTaskDescription' => 'Home Task description',
			'HomeTask' => 'Home Task URL',
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

		$criteria=new CDbCriteria;

		$criteria->compare('HomeTaskID',$this->HomeTaskID);
		$criteria->compare('fkModuleID',$this->fkModuleID);
		$criteria->compare('fkLectureID',$this->fkLectureID);
		$criteria->compare('HomeTaskName',$this->HomeTaskName,true);
		$criteria->compare('HomeTaskDescription',$this->HomeTaskDescription,true);
		$criteria->compare('HomeTask',$this->HomeTask,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hometasks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
