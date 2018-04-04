<?php
/**
 * Created by: TriNQ
 * Date: 22-03-2018
 * Time: 10:26 AM
 */
?>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://findicons.com/files/icons/376/the_blacy/128/secret_smile.png" alt="User Image" style="width: 25%;">
        <div>
            <p class="app-sidebar__user-name">Admin</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{action('admin\DashboardController@index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Danh mục</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{action('admin\SubCategoryController@index')}}"><i class="icon fa fa-circle-o"></i> Danh sách</a></li>
                <li><a class="treeview-item" href="{{action('admin\SubCategoryController@create')}}"><i class="icon fa fa-circle-o"></i> Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Sản phẩm</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{action('admin\ProductController@index')}}"><i class="icon fa fa-circle-o"></i> Danh sách</a></li>
                <li><a class="treeview-item" href="{{action('admin\ProductController@create')}}"><i class="icon fa fa-circle-o"></i> Thêm mới</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="{{action('admin\InvoiceController@index')}}"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Đơn hàng</span></a></li>

    </ul>
</aside>
