<?php
namespace backend\controllers;
use Yii;
class ApiController extends \yii\rest\Controller
{

    public function actionLogin(){

        $username = !empty($_POST['username'])?$_POST['username']:'';
        $password = !empty($_POST['password'])?$_POST['password']:'';
        $response = [];

        if(empty($username) || empty($password)){
            $response = [
                'status' => 'error',
                'message' => 'username & password both are required!',
                'data' => '',
            ];
        }
        else{

            $user = \backend\models\Agent::findByUsername($username);

            if(!empty($user)){

                if($user->validatePassword($password)){
                    $response = [
                        'status' => 'success',
                        'message' => 'login successfully!',
                        'data' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'username' => $user->username,
                            'email'=>$user->email,
                            'zone_id'=>$user->zone_id,
                            'token' => $user->auth_key,
                        ]
                    ];
                }

                else{
                    $response = [
                        'status' => 'error',
                        'message' => 'wrong password !',
                        'data' => '',
                    ];
                }
            }

            else{
                $response = [
                    'status' => 'error',
                    'message' => 'user is disabled or does not exist!',
                    'data' => '',
                ];
            }
        }
        return $response;
    }


    protected function verbs()
    {
        return [
            'login' => ['POST'],
        ];
    }
}