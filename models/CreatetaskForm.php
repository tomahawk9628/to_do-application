<?php
    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\Tlist;

    class CreatetaskForm extends Model {
        
        public $task;

        public function rules() {
            return [
                ['task', 'required']
            ];
        }
 
        public function create() {
            if(!$this->validate()) {
                return null;
            }

            $tasks = new Tlist();
            $tasks->u_id = Yii::$app->user->identity->id;
            $tasks->task = $this->task;
            return $tasks->save();
            // $user->username = $this->username;
            // $user->setpassword($this->password);
            // $user->generateAuthKey();
            // $user->generateToken();
        }
    }
?>