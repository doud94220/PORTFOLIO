<?php

namespace Repository;

use Entity\Task;
use DateTime;

class TaskRepository extends RepositoryAbstract
{
    public function getTable()
    {
        return 'task';
    }
    
    public function findAllTasks($idUser)
    {
        $query = <<<EOS
SELECT *
FROM task
WHERE user_id = :id
EOS;
        
        $dbTasks = $this->db->fetchAll(
                                        $query,
                                        [':id' => $idUser]
                                    );
        
        $tasks = []; //Init de ce qui sera dans le return
        
        foreach ($dbTasks as $dbTask)
        {
            $task = $this->buildFromArray($dbTask);
            
            $tasks[] = $task;
        }
        
        return $tasks;
    }
    
    public function buildFromArray (array $dbTask)
    {
        $task = new Task();
  
        $task
            ->setId($dbTask['id'])
            ->setUser_id($dbTask['user_id'])
            ->setTitle($dbTask['title'])
            ->setDescription($dbTask['description'])
            ->setCreation_date($dbTask['creation_date'])
            ->setStatus($dbTask['status']);

        return $task; 
    }

    public function delete ($id)
    {
        $idUser = $this->findUserFromIdTask($id);
        
        $this->db->delete('task', ['id' => $id]);
        
        //On retourne l'id du user de la task supprimée
        return $idUser;
    }
    
    public function findUserFromIdTask($id)
    {
        $query = <<<EOS
SELECT user_id
FROM task
WHERE id = :id
EOS;
        
        $userId = $this->db->fetchAssoc(
                                        $query,
                                        [':id' => $id]
                                    );
        
        return $userId['user_id'];
    }

    public function save (Task $task)
    {
        $dateDuJour = new DateTime();
        $dateDuJourFormatee = $dateDuJour->format('Y-m-d');
        
        $data = [
                  'user_id' => $task->getUser_id(),
                  'title' => $task->getTitle(),
                  'description' => $task->getDescription(),
                  'creation_date' => $dateDuJourFormatee 
                ];
        
        $where = !empty($task->getId())
                ? ['id' => $task->getId()]
                : null;
        
        $this->persist($data, $where);
    } 
    
}//Fin de TaskRepository
