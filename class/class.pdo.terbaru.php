<?php
// defined("академическое_приложение") or die("Sedang ada Perbaikan");
class Crud extends PDO{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $error;

    private $result;

    public function __construct($db_name)
    {
        $this->engine='mysqli';
        $this->host = 'localhost';
        $this->database=$db_name;
        $this->user='root';
        $this->pass='';

        $dns=$this->engine.':dbname='.$this->database.';host='.$this->host;
        $option=array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
        
            parent::__construct($dns,$this->user,$this->pass,$option);    
        
    }

    //Tampil Data 
     public function getRows($table, $conditions=array())
     {
        // SELECT * or field  FROM table 
        $sql='SELECT ';
        $sql.=array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql.=' FROM '.$table;

        // untuk join tabel 
        if(array_key_exists("join",$conditions)){

            foreach($conditions['join'] as $key => $val){
                $pre=' JOIN ';
                $sql.=$pre.$key.' ON '.$val;
                
            }
        }

        // untuk left join tabel 
        if(array_key_exists("left_join",$conditions)){

            foreach($conditions['left_join'] as $key => $val){
                $pre=' LEFT JOIN ';
                $sql.=$pre.$key.' ON '.$val;
                
            }
        }

        // untuk right join tabel 
        if(array_key_exists("right_join",$conditions)){

            foreach($conditions['right_join'] as $key => $val){
                $pre=' RIGHT JOIN ';
                $sql.=$pre.$key.' ON '.$val;
                
            }
        }

        //where 
        if(array_key_exists("where",$conditions)){
            $sql.=' WHERE ';
            $i=0;
            foreach($conditions['where'] as $key => $value){
                $pre=($i>0)?' AND ': '';
                $sql.=$pre.$key." = :".$key;
                $i++;
            }
        }

        //order by 
        if(array_key_exists("order_by",$conditions)){
            $sql.=' ORDER BY '.$conditions['order_by'];
        }

        //group by 
        if(array_key_exists("group_by",$conditions)){
            $sql.=' GROUP BY '.$conditions['group_by'];
        }

        //limit  example :  limit 1,30
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql.=' LIMIT '.$conditions['start'].','.$conditions['limit'];
        }

        //hanya limit example : limit 30 
        if(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql.= ' LIMIT '.$conditions['limit'];
        }

        //query 
        $query=parent::prepare($sql);
        //memastikan jika query memiliki 'where'
        if(array_key_exists("where",$conditions)){
            foreach($conditions['where'] as $key => $value){
                $query->bindValue(':'.$key,$value);
            }
        }
        //eksekusi query 
        $query->execute();

        //menampilkan (fetch) sesaui kondisi 
        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch ($conditions['return_type']){
                case 'count':
                    $data=$query->rowCount();
                break;
                case 'number':
                    $data=array();
                    while ($row=$query->fetch(PDO::FETCH_NUM)) {
                        $data[]=$row;
                    }
                break;
                case 'huruf':
                    $data=array();
                    while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
                        $data[]=$row;
                    }
                break;
                case 'ajax':
                    $data = '{"data" : [ ';
                    $i=0;
                    while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
                        if($i != 0){
                            $data .=',';
                        }
                        $data .=json_encode($row);
                        $i++;
                    }
                    $data .= ']}';
                break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                break;
                case 'ajax_tanggal':
                    $data = $query;
                break;
                default:
                    $data='';
            }
        }else{
            if($query->rowCount()>0){
                $data=$query->fetchALL();
            }
        }

        return !empty($data)?$data:false;

     }

     //tambah data 
     public function insert($table,$data)
     {
        
        //memastikan $data merupakan array dan tidak kosong
        if(!empty($data) && is_array($data)){

            //memisahkan setiap key array dan merubah kombinasi string
            $columnString=implode(',',array_keys($data));
            $valueString=":".implode(',:',array_keys($data));
            $sql="INSERT INTO ".$table."(".$columnString.") VALUES (".$valueString.")";
            $query= parent::prepare($sql);
            
            //bindValue
            foreach($data as $key=>$val){
                $query->bindValue(':'.$key,$val);
            }

            //eksekusi
            $insert = $query->execute();
            return $insert?parent::lastInsertId():false;

        }else{
            return false;
        }
     }

    public function update($table,$data,$conditions)
    {
        if(!empty($data) && is_array($data)){
            $colvalSet= '';
            $whereSql='';
            $i=0;
           
            foreach($data as $key=>$val ){
                $pre=($i >0)?', ': '';
                $colvalSet.=$pre.$key."=:".$key;
                $i++;
            }
            if(!empty($conditions) && is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i=0;
                foreach($conditions as $key=>$value){
                    $pre=($i>0)?' AND ': '';
                    $whereSql.=$pre.$key." =:".$key;
                    $i++;
                }
            }

            $sql="UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query=parent::prepare($sql);

            foreach($data as $key => $val){
                $query->bindValue(':'.$key,$val);
            }

            foreach($conditions as $kunci => $nilai){
                $query->bindValue(':'.$kunci,$nilai);
            }
            $update=$query->execute();

            return $update?$query->rowCount():false;
        }else{
            return false;
        }
    }

    public function delete($table,$conditions)
    {
        $whereSql='';
        if(!empty($conditions) && is_array($conditions)){
            $whereSql.=' WHERE ';
            $i=0;
            foreach($conditions as $key=>$value){
                $pre=($i>0)? ' AND ':'';
                $whereSql.=$pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql="DELETE FROM ".$table.$whereSql;
        $delete=parent::exec($sql);
        return $delete?$delete:false;
    }
}
?>