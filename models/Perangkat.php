<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "perangkat".
 *
 * @property string $id
 * @property string $alias
 * @property int $id_owner
 * @property string $tgl_instalasi
 * @property string $longitude
 * @property string $latitude
 *
 * @property Data[] $datas
 * @property User $user
 */
class Perangkat extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perangkat';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//             [['id','alias', 'id_owner', 'tgl_instalasi', 'longitude', 'latitude','altitude'], 'required',
//               'message' => '{attribute} tidak boleh kosong'
//             ],
            [['id','tgl_instalasi', 'longitude', 'latitude'], 'required',
              'message' => '{attribute} tidak boleh kosong'
            ],
            [['id'], 'unique', 'message' => '{attribute} sudah digunakan'],
            [['id', 'alias', 'longitude', 'latitude','altitude'], 'string', 'max' => 255],
            [['id'], 'match', 'pattern' => '/^[A-Za-z0-9_-]+$/u',
              'message' => '{attribute} hanya bisa menggunakan huruf, angka, (_), dan (-)'
            ],
            [['id'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['id_owner'], 'integer'],
            [['tgl_instalasi'], 'safe'],
            [['longitude', 'latitude'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
              'message' => '{attribute} harus berupa nomor'
            ],
            [['alias'], 'match', 'pattern' => '/^[A-Za-z0-9 ]+$/u',
              'message' => '{attribute} hanya bisa menggunakan huruf dan angka'
            ],
            [['alias'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['id'], 'unique'],
        ];
    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['id','alias', 'id_owner', 'tgl_instalasi', 'longitude', 'latitude', 'altitude'];
        return $scenarios;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Perangkat',
            'alias' => 'Alias',
            'id_owner' => 'Nama Owner',
            'tgl_instalasi' => 'Tanggal Instalasi',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'altitude' => 'Altitude',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['id_perangkat' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_owner']);
    }
}
