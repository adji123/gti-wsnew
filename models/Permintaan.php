<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permintaan".
 *
 * @property int $id
 * @property string $id_perangkat
 * @property int $id_user
 * @property int $status
 * @property string $timestamp
 *
 * @property User $user
 */
class Permintaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permintaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perangkat', 'id_user'], 'required'],
            [['pesan'], 'required', 'on'=>'tolak', 'message' => '{attribute} tidak boleh kosong'],
            [['id_user', 'status'], 'integer'],
            [['tgl_pengajuan','tgl_tanggapan'], 'safe'],
            [['id_perangkat'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_perangkat' => 'ID Perangkat',
            'id_user' => 'Pengaju',
            'status' => 'Status',
            'tgl_pengajuan' => 'Waktu Pengajuan',
            'tgl_tanggapan' => 'Waktu Tanggapan',
            'pesan' => 'Pesan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
