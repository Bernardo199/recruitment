<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $countrycodes
 * @property string $number
 * @property int $people_id
 * @property int $status
 *
 * @property People $people
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const STATUS_ATIVO = 1;
    const STATUS_INATIVO = 0;

    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countrycodes', 'number', 'people_id'], 'required'],
            [['people_id', 'status'], 'integer'],
            [['countrycodes'], 'string', 'max' => 255],
            [['number'], 'string', 'max' => 9],
            [['number'], 'unique'],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countrycodes' => 'Countrycodes',
            'number' => 'Number',
            'people_id' => 'People ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}