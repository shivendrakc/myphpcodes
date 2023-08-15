<?php 
    class Database{
        private $dbhost;
        private $dbusername;
        private $dbpassword;
        private $dbname;

        protected function connect(){
            $this->dbhost = 'localhost';
            $this->dbusername = 'root';
            $this->dbpassword = '';
            $this->dbname = 'crud';

            $conn = new mysqli($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname);
            return $conn;
        }
    }
    class Query extends Database{
        public function getData($table, $field='*', $condition_arr='', $order_by_field='', 
                                $order_by_type='desc', $limit=''){

            $sql = "SELECT $field FROM $table";
            if (!$condition_arr == ''){ 
                
                $sql .= " WHERE ";
                $c = count($condition_arr);
                $i = 1;

                    foreach($condition_arr as $key=>$val){
                        if ($i == $c){
                            $sql .= " $key ='$val' ";
                        }else{
                            $sql .= " $key ='$val' AND ";
                        }
                        $i++;
                    }
            }

            if (!$order_by_field == ''){
                $sql.= " order by $order_by_field $order_by_type ";
            }

            if (!$limit == ''){
                $sql.= " limit $limit ";
            }
            die($sql);
            $result = $this->connect()->query($sql);  

                if($result->num_rows > 0){
                    $arr = array();
                    while($row = $result->fetch_assoc()){
                        $arr[] = $row;
                    }
                    return $arr;
                }else{
                    return 0;
                }
        }
        public function InsertData($table, $condition_arr){
                if (!$connection_arr = ''){
                    foreach($condition_arr as $key=>$value){
                        $fieldArr[] = $key;
                        $valueArr[] = $value;
                    }
                    $field = implode(",", $fieldArr);
                    $value = implode("','", $valueArr);
                    $value = "'".$value."'";
                    $sql = "INSERT INTO $table($field) VALUES($value)";
                    //die($sql);
                    $result = $this->connect()->query($sql);
            }
        }
        public function DeleteData($table, $condition_arr){
            $sql = "DELETE FROM $table";

            if (!$condition_arr == ''){ 
                
                $sql .= " WHERE ";
                $c = count($condition_arr);
                $i = 1;

                    foreach($condition_arr as $key=>$val){
                        if ($i == $c){
                            $sql .= " $key ='$val' ";
                        }else{
                            $sql .= " $key ='$val' AND ";
                        }
                        $i++;
                    }
            }
            //die($sql);
            $result = $this->connect()->query($sql);
        }
        public function UpdateData($table, $condition_arr, $where_field, $where_value){

            if (!$condition_arr == ''){ 

                $sql = "UPDATE $table SET ";
                $c = count($condition_arr);
                $i = 1;

                    foreach($condition_arr as $key=>$val){
                        if ($i == $c){
                            $sql .= " $key ='$val' ";
                        }else{
                            $sql .= " $key ='$val', ";
                        }
                        $i++;
                    }
            }
            $sql .= " WHERE $where_field='$where_value'";
            //die($sql);
            $result = $this->connect()->query($sql);
        }
        public function get_safe_str($str){
            if($str != ''){
                return mysqli_real_escape_string($this->connect(), $str);
            }
        }
    }


