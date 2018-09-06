<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $slug Слаг
 * @property string $images Изображения
 * @property int $status Опубликовано
 * @property string $updated_at Дата обновления
 * @property string $created_at Дата создания
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],
        ];

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['images'], 'string'],
            [['status'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'slug' => 'Слаг',
            'images' => 'Изображения',
            'status' => 'Опубликовано',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
        ];
    }
}
