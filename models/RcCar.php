<?php

namespace app\models;

/**
 * This is the model class for table "rc_car".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $make
 * @property string|null $model
 * @property string|null $company
 * @property string|null $distributor
 * @property int $is_running
 * @property int|null $is_lipo
 * @property int|null $is_nimh
 * @property int|null $needs_work
 * @property string|null $notes
 * @property string $create_ts
 */
class RcCar extends \yii\db\ActiveRecord
{
    public string $imageFilePath = '';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory.rc_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_running', 'is_lipo', 'is_nimh', 'needs_work'], 'integer'],
            [['notes', 'imageFilePath'], 'string'],
            [['create_ts'], 'safe'],
            [['name', 'make', 'model', 'company', 'distributor'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'make' => 'Make',
            'model' => 'Model',
            'company' => 'Company',
            'distributor' => 'Distributor',
            'is_running' => 'Is Running',
            'is_lipo' => 'Takes Lipo Battery (default)',
            'is_nimh' => 'Takes NiMH Battery',
            'needs_work' => 'Needs Work',
            'notes' => 'Notes',
            'create_ts' => 'Create Time',
            'imageFilePath' => 'Car Image',
        ];
    }
}
