<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 * SignupForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends \yii\db\ActiveRecord
{
    public $username;
    public $name;
    public $password;
    public $id;
    public $authKey;
    public $accessToken;
    public $role;
    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'user';
    }
    public function rules()
    {
        return [
            [['id'], 'integer'],
            ['username', 'trim'],
            ['username' , 'email', 'message' => 'Username Harus Menggunakan Email'],
            ['name', 'trim'],
            [['name'], 'match', 'pattern' => '/^[a-zA-Z.,-]+(?:\s[a-zA-Z.,-]+)*$/',
              'message' => '{attribute} Hanya Bisa Menggunakan Huruf dan Spasi'
            ],
            ['name', 'string', 'max' => 20],
            [['tgl_buat'], 'safe'],
            ['password', 'string', 'min' => 6,'max' => 12, 'tooShort' => '{attribute} Setidaknya Harus Memiliki 6 Karakter'],
            [['password'], 'match', 'pattern' => '/^[A-Za-z0-9]+$/u',
              'message' => '{attribute} Hanya Bisa Menggunakan Huruf dan Angka'
            ],
            [['username'], 'match', 'pattern' => '/^([A-Za-z0-9_\.-]+)@([\dA-Za-z\.-]+)\.([A-Za-z\.]{2,6})$/',
              'message' => '{attribute} Tidak Boleh Mengandung Simbol'
            ],
            [['username'], 'required','message' => 'Username Tidak Boleh Kosong'],
            [['username'],'unique','targetClass' => '\app\models\Users','message' => 'Username Ini Sudah Digunakan'],
            [['name'], 'required','message' => 'Nama Tidak Boleh Kosong'],
            
            [['password'], 'required','message' => 'Password Tidak Boleh Kosong'],
            [['authKey','accessToken'],'string'],
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $time = time();
        $enc = sha1($time);
        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->password = $this->password;
        $enci = sha1($this->password);
        $md = md5($time);
        date_default_timezone_set("Asia/Jakarta");
        Yii::$app->db->createCommand()->insert('user',
        [
            'username' => $this->username,
            'name' => $this->name,
            'password' => $enci,
            'authKey' => base64_encode($enc),
            'accessToken' =>  sha1($md),
            'role' => 'user',
            'tgl_buat' => date('Y-m-d H:i:s'),
        ])->execute();

        return $user;
    }
}
