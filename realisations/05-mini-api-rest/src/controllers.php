<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

//HOMEPAGE : a modifier
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

//USER
$app
    ->get('/view_all_users', 'user.controller:viewAllUsers')
    ->bind('view_all_users')
;
$app
    ->get('/view_all_users_ajax', 'user.controller:viewAllUsersAjax')
    ->bind('view_all_users_ajax')
;
$app
    ->get('/add_user', 'user.controller:add')
    ->bind('add_user')
;
$app
    ->post('/validate_add_user', 'user.controller:validateAddUser')
    ->bind('validate_add_user')
;
$app
    ->post('/validate_add_user_ajax', 'user.controller:validateAddUserAjax')
    ->bind('validate_add_user_ajax')
;
$app
    ->get('/delete_user/{id}', 'user.controller:delete')
    ->bind('delete_user')
;
$app
    ->get('/delete_user_ajax/{id}', 'user.controller:deleteAjax')
    ->bind('delete_user_ajax')
;
$app
    ->delete('/delete_user_ajax_sans_get/{id}', 'user.controller:deleteAjaxSansGet')
    ->bind('delete_user_ajax_sans_get')
;

//TASKS
$app
    ->get('/show_tasks_user/{id}', 'user.controller:showTasks')
    ->bind('show_tasks_user')
;
$app
    ->get('/show_tasks_user_ajax/{id}', 'user.controller:showTasksAjax')
    ->bind('show_tasks_user_ajax')
;
$app
    ->get('/delete_task/{id}', 'user.controller:deleteTask')
    ->bind('delete_task')
;
$app
    ->delete('/delete_task_ajax/{id}', 'user.controller:deleteTaskAjax')
    ->bind('delete_task_ajax')
;
$app
    ->get('/add_task/{id_user}', 'user.controller:addTask')
    ->bind('add_task')
;
$app
    ->post('/validate_add_task', 'user.controller:validateAddTask')
    ->bind('validate_add_task')
;
$app
    ->post('/validate_add_task_ajax', 'user.controller:validateAddTaskAjax')
    ->bind('validate_add_task_ajax')
;

//EN CAS D'ERRREUR
$app->error(function (\Exception $e, Request $request, $code) use ($app)
{
    if ($app['debug'])
    {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
