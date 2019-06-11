<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/6/17
 * Time: 2:46 PM
 */

namespace Extension\Site\Http\Composer;


class AdminMenuComposer
{


    public function compose($view)
    {

        $view->with("admin_menu", $this->menu());
        $view->with('admin_package_menu', $this->admin_package_menu());
    }

    public function admin_package_menu(){
        $html = '';


        $html .= '
             <li class="treeview">
                    <a href="'.route("reactor.category.index").'">
                        <i class="fa fa-ellipsis-h"></i> <span>Categories</span>
                    </a>
             </li>
            ';

  $html .= '
             <li class="treeview">
                    <a href="'.route("reactor.blog.index").'">
                        <i class="fa fa-ellipsis-h"></i> <span>Blogs</span>
                    </a>
             </li>
            ';
        
        return $html;
    }



    public function menu(){

        $html = "";

        $html .= '
         <li class="treeview">
                <a href="'. route("reactor.product.list"). '">
                    <i class="fa fa-map"></i> <span>Product</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            
        ';

        return $html;
    }
}
