<?php

namespace app\modules\admin\models;

use app\models\Post;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name Логин
 * @property string $email E-mail
 * @property string $password Пароль
 * @property int $status
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_reset_token
 * @property string $updated_at Дата обновления
 * @property string $created_at Дата создания
 * @property string $deleted_at Дата удалення
 *
 * @property Post[] $posts
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'auth_key'], 'required'],
            [['status'], 'integer'],
            [['updated_at', 'created_at', 'deleted_at'], 'safe'],
            [['name', 'email', 'password', 'auth_key', 'access_token', 'password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Логин',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'password_reset_token' => 'Password Reset Token',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
            'deleted_at' => 'Дата удалення',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::findOne(['access_token'=>$token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }

    public static function findByUsername($username)
    {
        return User::findOne(['name'=>$username]);
    }
}
