<?php

class UsersModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    //FUNCTION FOR INSERT DATA USER
    public function insert($data){
        
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO users (email, password, color) VALUES (:email, :password, :color)'
            );
            $query->execute(['email'=>$data['email'], 'password'=>$data['password'], 'color'=>$data['color']]);
            return true;
        } catch (PDOException $e) {
            //print_r('Error '.$e->getMessage());
            return false;
        }
    }

    public function validateCredentials($data){
        
        $query = $this->db->connect();
        $result = $query->prepare("SELECT * FROM users WHERE email = ?");
        $result->execute([$data['email']]);
        $user = $result->fetch();

        if (password_verify($data['password'], $user['password'])) return true;
        
        return false;
    }

    public function users(){
        $data=[];
        try {
            $query = $this->db->connect()->query("SELECT * FROM users");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            
            while ($row = $query->fetch()) {
                $row2[0] = $row["email"];
                $row2[1] = $row["color"];
                $data[] = $row2;
            }
            return $data;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function colorsCount(){
        $data=['Rojo'=>null,
                'Azul'=>null,
                'Amarillo'=>null,
                'Verde'=>null,
                'Morado'=>null,
                'Naranja'=>null,
            ];
            $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Rojo'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $rojo=$query->fetch();
        $data['Rojo'] = $rojo['count(*)'];

        $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Azul'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $azul=$query->fetch();
        $data['Azul'] = $azul['count(*)'];
        /**** */
        $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Amarillo'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $amarillo=$query->fetch();
        $data['Amarillo'] = $amarillo['count(*)'];
        /*** */
        $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Verde'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $verde=$query->fetch();
        $data['Verde'] = $verde['count(*)'];
        /**** */
        $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Morado'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $morado=$query->fetch();
        $data['Morado'] = $morado['count(*)'];
        /*** */
        $query = $this->db->connect()->query("SELECT count(*) FROM users WHERE color='Naranja'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $naranja=$query->fetch();
        $data['Naranja'] = $naranja['count(*)'];

        return $data;
    }
}
?>