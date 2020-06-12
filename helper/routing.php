<?php
require_once 'init.php';
if(isset($_POST['add_category']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('category')->addCategory($_POST);
        //Util::dd($result);    
        switch($result)
        {
            case ADD_ERROR:
            Session::setSession(ADD_ERROR, "Add Category Error");
            Util::redirect("manage-category.php");
            break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Category Success");
                Util::redirect("manage-category.php");
                
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('category')->getValidator()->errors()));
                Util::redirect("add-category.php");
            break;
        }
    }
    else{
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-category.php");//Need to change this,actually we will redirect to some error page indicating unauthorized accesss
            
    }
}

if(isset($_POST['add_product']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('product')->addProduct($_POST);
        //Util::dd($result);    
        switch($result)
        {
            case ADD_ERROR:
            Session::setSession(ADD_ERROR, "Add Product Error");
            Util::redirect("manage-product.php");
            break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Product Success");
                Util::redirect("manage-product.php");
                
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('product')->getValidator()->errors()));
                Util::redirect("add-product.php");
            break;
        }
    }
    else{
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-product.php");//Need to change this,actually we will redirect to some error page indicating unauthorized accesss
            
    }
}

if(isset($_POST['add_customer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('customer')->addCustomer($_POST);
        //Util::dd($result);    
        switch($result)
        {
            case ADD_ERROR:
            Session::setSession(ADD_ERROR, "Add Customer Error");
            Util::redirect("manage-customer.php");
            break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Customer Success");
                Util::redirect("manage-customer.php");
                
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('customer')->getValidator()->errors()));
                Util::redirect("add-customer.php");
            break;
        }
    }
    else{
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-customer.php");//Need to change this,actually we will redirect to some error page indicating unauthorized accesss
            
    }
}

if(isset($_POST['page'])){
    //Util::dd($_POST);
    
    $search_parameter = $_POST['search']['value'] ?? null;  //yaha check karega null hai ki nhi
    $order_by = $_POST['order'] ?? null;
    $start = $_POST['start'];
    $length = $_POST['length'];
    $draw = $_POST['draw'];

    $dependency = $_POST['page'] == 'manage_customer' ? 'customer' : ($_POST['page'] == 'manage_category' ? 'category' : 'product'); 
    $di->get($dependency)->getJSONDataForDataTable($draw, $search_parameter, $order_by, $start, $length);
}

if(isset($_POST['fetch']))
{
    if($_POST['fetch'] == 'category')
    {
        $category_id = $_POST['category_id'];
        $result = $di->get('category')->getCategoryById($category_id,PDO::FETCH_ASSOC);
       // Util::dd($result);
        echo json_encode($result[0]);
    }
    

}

if(isset($_POST['editCategory']))
{
    //Util::dd($_POST);
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('category')->update($_POST, $_POST['category_id']);
        //Util::dd($result);    
        switch($result)
        {
            case UPDATE_ERROR:
            Session::setSession(UPDATE_ERROR, "Update Category Error");
            Util::redirect("manage-category.php");
            break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS, "Update Category Success");
                Util::redirect("manage-category.php");
                
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('category')->getValidator()->errors()));
                Util::redirect("manage-category.php");
            break;
        }        
    }
    else{
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-category.php");//Need to change this,actually we will redirect to some error page indicating unauthorized accesss
            
    }

    
}

if(isset($_POST['getCategories'])){
    echo json_encode($di->get('category')->all());
    }

if(isset($_POST['getProductByCategoryID'])){
        $category_id = $_POST['categoryID'];
        echo json_encode($di->get('product')->getProductByCategoryID($category_id));
}
    
if(isset($_POST['getSellingPriceByProductID'])){
    $product_id = $_POST['ProductID'];
    echo json_encode($di->get('product')->getSellingPriceByProductID($product_id));
}



