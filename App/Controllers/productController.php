<?php

//cal crear la classe productController
//el metode per defecte "index" ha de cridar la vista
//product.view.php

use App\Core\Controller;
use App\Models\User;
use App\Models\Orm;

class productController extends Controller
{
	public function index()
	{
		$this->render("user/product");
	}
}