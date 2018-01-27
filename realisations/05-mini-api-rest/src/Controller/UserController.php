<?php

namespace Controller;

use Entity\User;
use Entity\Task;
use Symfony\Component\HttpFoundation\Response;

class UserController extends ControllerAbstract
{
    public function viewAllUsers()
    {
        $users = $this->app['user.repository']->findAll();
        
        return $this->render(
                             'user/allUsers.html.twig',
                             ['users' => $users]
                            );
    }
    
    public function viewAllUsersAjax()
    {
        $users = $this->app['user.repository']->findAll();
        $usersJson = json_encode($users);
        //echo "P'etre erreur d'encodage JSON ! Msg d'erreur : " . json_last_error_msg();
        return $usersJson;
    }
    
    public function delete($id)
    {
        $this->app['user.repository']->delete($id);
        
        return $this->viewAllUsers();
    }
    
    public function deleteAjax($id)
    {
        $this->app['user.repository']->delete($id);
        $msg = "User Deleted !";
        $msgJson = json_encode($msg);
        return $msgJson;
    }
    
    public function deleteAjaxSansGet($id)
    {
        $this->app['user.repository']->delete($id);
        $msg = "User Deleted !";
        $msgJson = json_encode($msg);
        return $msgJson;
    }
    
    public function add()
    {
        return $this->render('user/addUser.html.twig');
    }
    
    public function validateAddUser()
    {
        //Recupérer les données du POST et les mettre dans une instance de User
        $userForm = new User();
        $userForm
                ->setName($_POST['name'])
                ->setEmail($_POST['email']);
        
        $this->app['user.repository']->save($userForm);
        
        return $this->viewAllUsers();        
    }

    public function validateAddUserAjax()
    {
        //Recupérer les données du POST et les mettre dans une instance de User
        $userForm = new User();
        $userForm
                ->setName($_POST['name'])
                ->setEmail($_POST['email']);
        
        $this->app['user.repository']->save($userForm);
        
        $msg = "User Created !";
        $msgJson = json_encode($msg);
        return $msgJson;   
    }
    
    public function showTasks($id)
    {
        //Recupérer toutes les tasks du user
        $tasksUserAsked = $this->app['task.repository']->findAllTasks($id);
        
        return $this->render(
                             'task/allTasksForUserAsked.html.twig',
                             [
                                 'tasks' => $tasksUserAsked,
                                 'userId' => $id
                             ]
                            );
    }

    public function showTasksAjax($id)
    {
        //Recupérer toutes les tasks du user
        $tasksUserAsked = $this->app['task.repository']->findAllTasks($id);
        
        //Retourner toutes les tasks au fichier JS sous la forme d'un array d'objets
        $userTasksAskedJson = json_encode($tasksUserAsked);
        return $userTasksAskedJson;      
    }
    
    public function deleteTask($id)
    {
        $idUser = $this->app['task.repository']->delete($id);
        
        //// Les 2 méthodes en dessous fonctionnent toutes les 2 ! ////
        //return $this->redirectRoute('show_tasks_user', ['id' => $idUser]);
        return $this->showTasks($idUser);
    }

    public function deleteTaskAjax($id)
    {
        $idUser = $this->app['task.repository']->delete($id);

        //Retourner un message en json
        $msgJson = json_encode("Ok Task deleted !");        
        return $msgJson;
    }
    
    public function addTask($id_user)
    {
        return $this->render(
                            'task/addTask.html.twig',
                            ['id_user' => $id_user]
                            );
    }
    
    public function validateAddTask()
    {
        //Recupérer les données du POST et les mettre dans une instance de Task
        $taskForm = new Task();
        $taskForm
                ->setUser_id($_POST['idUser'])
                ->setTitle($_POST['title'])
                ->setDescription($_POST['description']);
        
        $this->app['task.repository']->save($taskForm);
        
        return $this->showTasks($_POST['idUser']);      
    }

    public function validateAddTaskAjax()
    {
        //Recupérer les données du POST et les mettre dans une instance de Task
        $taskForm = new Task();
        $taskForm
                ->setUser_id($_POST['id_user'])
                ->setTitle($_POST['title'])
                ->setDescription($_POST['description']);
        
        //Insérer task en BDD
        $this->app['task.repository']->save($taskForm);
        
        //Retourner un message en json
        $msgJson = json_encode("Ok Task added for current user !");        
        return $msgJson;  
    }
    
} //fin classe UserController
