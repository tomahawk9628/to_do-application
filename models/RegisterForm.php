<?php
    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\User;

    class RegisterForm extends Model {
        
        public $username;
        public $password;

        public function rules() {
            return [
                ['username', 'required'],
                ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
                ['password', 'required'],
            ];
        }

        public function register() {
            if(!$this->validate()) {
                return null;
            }

            $user = new User();
            $user->username = $this->username;
            $user->setpassword($this->password);
            $user->generateAuthKey();
            $user->generateToken();
            return $user->save();
        }
    }
?>