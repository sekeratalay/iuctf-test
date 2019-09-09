<?php namespace App\Controllers\Api;

use \App\Models\CategoryModel;

class Categories extends \App\Controllers\BaseController
{
    private $category_codel = null;

    function __construct()
    {
        // parent::__construct();
        $this->category_model = new CategoryModel();
    }

    //--------------------------------------------------------------------

    public function index()
    {
        $categories = $this->category_model->findAll();

        $categories = esc($categories);

        return json_encode($categories);
    }

	//--------------------------------------------------------------------
}
