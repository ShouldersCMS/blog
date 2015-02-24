<?php 
Route::resource('admin/blog', 'Shoulderscms\Blog\Controllers\BlogController');
Route::get('admin/blog/category', 'Shoulderscms\Blog\Controllers\BlogController@index');
Route::get('blog/{slug}', 'Shoulderscms\Blog\Controllers\BlogController@show');
Route::get('blog/', 'Shoulderscms\Blog\Controllers\BlogController@showIndex');

Menu::get('AdminNav')->add('Blog', array('url' => 'admin/blog', 'icon' => 'fa fa-list', 'class' => 'test'))->data('order', 10);
Menu::get('AdminNav')->blog->add('Create Post', 'admin/blog/create');
Menu::get('AdminNav')->blog->add('Manage Posts', 'admin/blog');
Menu::get('AdminNav')->blog->add('Manage Categories', 'admin/blog/category');