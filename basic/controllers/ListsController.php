<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ListsController extends Controller
{
	//公众号列表
	public function actionLists()
	{
		return $this->renderAjax('lists');
	}
	//自定义回复消息
	public function actionMessage()
	{
		return $this->renderAjax('message');
	}

}