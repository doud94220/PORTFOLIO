<?php

namespace Repository;

use Entity\User;

class UserRepository extends RepositoryAbstract
{
    public function getTable()
    {
        return 'user';
    }
    
    public function findAll()
    {
        $query = <<<EOS
SELECT *
FROM user
EOS;
        
        $dbUsers = $this->db->fetchAll($query);
        $users = []; //Init de ce qui sera dans le return
        
        foreach ($dbUsers as $dbUser)
        {
            $user = $this->buildFromArray($dbUser);
            
            $users[] = $user;
        }
        
        return $users;
    }

    public function buildFromArray (array $dbUser)
    {
        $user = new User();
  
        $user
             ->setId($dbUser['id'])
             ->setName($dbUser['name'])
             ->setEmail($dbUser['email']);

        return $user;     
    }

    public function delete ($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
    
    public function save (User $user)
    {
        $data = [
                  'name' => $user->getName(),
                  'email' => $user->getEmail()
                ];
        
        $where = !empty($user->getId())
                ? ['id' => $user->getId()]
                : null;
        
        $this->persist($data, $where);
    } 
}
