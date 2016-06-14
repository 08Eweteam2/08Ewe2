<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class LoginController extends Controller
{
	public function actionLogin()
	{
		session_start();
		$session = Yii::$app->session;
		// session_destroy();die;

		// if(isset($session['name'])){
			
		// }
		// else
		// {
			 return $this->renderAjax('login');
		// }
		
	}
	public function actionDologin()
	{
		$db = \Yii::$app->db;
		$session = Yii::$app->session;
		$name = $_POST['username'];
		$pass = $_POST['password'];
		$sql = "select * from user where name='$name' and pass='$pass'";
		// echo $sql;die;
		$command = $db->createCommand($sql);
		$res = $command->queryAll();
		// var_dump($res);die;
		if($res)
		{
			$session->set('name', $name);
			$session->set('id', $res[0]['uid']);
			header('refresh:0;url=index.php?r=login/index');die;
		}
	}
	public function actionIndex()
	{
		$this->layout = false;
		session_start();
		$session = Yii::$app->session;
		if(isset($session['name'])){
			return $this->render('index');
		}
		else
		{
			echo "<script>alert('请先登录')</script>";
			header('refresh:0;url=index.php?r=login/login');die;
		}
		
	}


}

?>