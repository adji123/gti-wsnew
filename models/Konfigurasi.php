<?php

namespace app\models;
use borales\extensions\phoneInput\PhoneInputValidator;
use borales\extensions\phoneInput\PhoneInputBehavior;
use Yii;

/**
 * This is the model class for table "konfigurasi".
 *
 * @property int $id
 * @property int $id_user
 * @property string $frekuensi
 * @property string $ip_server
 * @property string $gsm_to
 * @property string $gps_to
 * @property string $timestamp
 */
class Konfigurasi extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'konfigurasi';
    }

    /**
     * {@inheritdoc}
     */




    public function rules()
    {
        return [
            [['id_user', 'frekuensi', 'ip_server', 'no_hp','ussd_code', 'gsm_to', 'gps_to'], 'required',
              'message'=> '{attribute} Tidak boleh kosong'
            ],
            
            [['no_hp'],'string', 'min' => 11, 'max' => 14, 'tooShort' => '{attribute} minimal 11 karakter'],
            [['id_user'], 'integer'],
            [['timestamp', 'gsm_to', 'gps_to'], 'safe'],
            [['gsm_to','gps_to', 'no_hp'], 'match', 'pattern' => '/^[0-9]+$/u', 'message' => '{attribute} hanya boleh diisi oleh angka'],
            [['frekuensi', 'ip_server', 'gsm_to', 'gps_to','no_hp'], 'string', 'max' => 255],

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'frekuensi' => 'Interval',
            'ip_server' => 'MQTT Host',
            'gsm_to' => 'GSM Time Out',
            'gps_to' => 'GPS Time Out',
            'timestamp' => 'Timestamp',
            'no_hp' => 'Receive Number',
            'ussd_code' => 'USSD Code'
        ];
    }

}
