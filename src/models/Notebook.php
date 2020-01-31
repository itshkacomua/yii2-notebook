<?php

namespace itshkacomua\notebook\models;

use Yii;

/**
 * This is the model class for table "notebook".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $text
 * @property int $created_at
 * @property int $user_id
 * @property int $calendar_time
 */
class Notebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notebook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'created_at', 'user_id'], 'integer'],
            [['title', 'created_at', 'user_id'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['calendar_time'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'created_at' => Yii::t('app', 'Created At'),
            'user_id' => Yii::t('app', 'User ID'),
            'calendar_time' => Yii::t('app', 'Calendar Time'),
        ];
    }

    /**
     * @return array
     */
    public static function getParentList()
    {
        return array_merge([0 => 'Корневая директория'], \yii\helpers\ArrayHelper::map(self::find()->all(),'id', 'title'));
    }
}
