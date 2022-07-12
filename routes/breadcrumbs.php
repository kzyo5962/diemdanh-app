<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Constants\TitleConstant;
use App\Constants\SubjectConstant;
use Illuminate\Database\Eloquent\Model;

Breadcrumbs::macro('resource', function (string $name, string $title, string $subject) {
    // Home > Blog
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('dashboard');
        $trail->push($title, route("{$name}.index"));
    });

    // Home > Blog > New
    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name, $subject) {
        $trail->parent("{$name}.index");
        $trail->push('Thêm ' . $subject, route("{$name}.create"));
    });

    // Home > Blog > Post 123
    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, Model $model) use ($name, $subject) {
        $trail->parent("{$name}.index");
        $trail->push('Chi tiết thông tin ' . $subject, route("{$name}.show", $model));
    });

    // Home > Blog > Post 123 > Edit
    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, Model $model) use ($name, $subject) {
        $trail->parent("{$name}.show", $model);
        $trail->push('Cập nhật ' . $subject, route("{$name}.edit", $model));
    });
});


Breadcrumbs::for('auth.forbidden', function ($trail) {
    $trail->parent('home');
    $trail->push('Forbidden');
});

Breadcrumbs::for('errors.404', function ($trail) {
    $trail->parent('home');
    $trail->push('Page Not Found');
});


//define breadcrumbs listings
Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('Trang chủ', route('home'));
});
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::resource('students', TitleConstant::STUDENT, SubjectConstant::STUDENT);
Breadcrumbs::resource('classrooms', TitleConstant::CLASSROOM, SubjectConstant::CLASSROOM);
Breadcrumbs::resource('admin', TitleConstant::ADMIN, SubjectConstant::ADMIN);
Breadcrumbs::resource('roles', TitleConstant::ROLE, SubjectConstant::ROLE);
Breadcrumbs::resource('teachers', TitleConstant::TEACHER, SubjectConstant::TEACHER);
Breadcrumbs::resource('supervisors', TitleConstant::SUPERVISOR, SubjectConstant::SUPERVISOR);
