<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tlist".
 *
 * @property int $id
 * @property int $u_id
 * @property string $task
 * @property int|null $done
 *
 * @property User $u
 */
class Tlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task'], 'string', 'max' => 500],
            [['u_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['u_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'u_id' => 'U ID',
            'task' => 'Task',
            'done' => 'Done',
        ];
    }

    /**
     * Gets query for [[U]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(User::className(), ['id' => 'u_id']);
    }
}
