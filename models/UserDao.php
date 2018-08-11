<?php
    class UserDao
    {
        private $con = null;

        public function getConnection(){
            $this->con = new mysqli('localhost:8889','root','root','test_db');
            if($this->con->connect_error){
                //コネクション取得失敗
                echo $this->con->connect_error;
                exit;
            } else{
                //接続成功、文字コードセット
                $this->con->set_charset("utf8");
            }
        }

        public function closeConnection(){
            $this->con->close();
        }

        public function getAllUsers(){
            $users = [];
            if(isset($this->con)){
                $sql = "select * from user";
                if($result = $this->con->query($sql)){
                    //連想配列で順に行を取得
                    while($row = $result->fetch_assoc()){
                        $user = new User($row['user_id'],$row['user_name'],$row['gender']);
                        $users[] = $user;
                    }
            }
            }
            return $users;
        }

    }
?>