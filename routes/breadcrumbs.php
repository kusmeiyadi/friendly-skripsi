<?php

// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('admin.home'));
});

// Home > Posts
Breadcrumbs::for('post.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Posts', route('post.create'));
});

// Home > Users
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Users', route('users.create'));
});

// Home > Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Roles', route('roles.index'));
});

// Home > Permissions
Breadcrumbs::for('permission.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Permissions', route('permission.create'));
});

// Home > Jenis Kasus
Breadcrumbs::for('jenis_kasus.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Jenis Kasus', route('jenis_kasus.index'));
});

// Home > Categories
Breadcrumbs::for('category.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Categories', route('category.create'));
});

// Home > Tags
Breadcrumbs::for('tag.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Tags', route('tag.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
