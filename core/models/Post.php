<?php

namespace app\models;

use app\modules\admin\models\User;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title      Заголовок
 * @property string $slug       Слаг
 * @property string $text       Короткий текст
 * @property string $content    Контент
 * @property int $status        Опубликовано
 * @property int $user_id       Автор
 * @property string $updated_at Дата обновления
 * @property string $created_at Дата создания
 *
 * @property User $user
 */
class Post extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
        [
            'class' => SluggableBehavior::className(),
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
            [['title'], 'required'],
            [['text', 'content'], 'string'],
            [['status', 'user_id'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'title'      => 'Заголовок',
            'slug'       => 'Слаг',
            'text'       => 'Короткий текст',
            'content'    => 'Контент',
            'status'     => 'Опубликовано',
            'user_id'    => 'Автор',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStatusName()
    {
        return $this->statusList[$this->status];
    }

    public function getStatusList()
    {
        return ['не опубликовано', 'опубликовано'];
    }
}
