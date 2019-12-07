<?php

namespace FadilArtisan;

class Model {
  protected $_dbh;
  protected $_table;
  protected $_primary;

  protected $_sql;
  protected $_data;

  protected $_select = "";
  protected $_join = "";
  protected $_where = "";
  protected $_order = "";
  protected $_limit = "";

  protected $_val;
  protected $_val_message = "";

  public function __construct() {
    try {
      $this->_dbh = new \PDO(DB_DRIVER. ':host=' .DB_HOST. ';dbname=' .DB_NAME, DB_USER, DB_PASSWORD);
      $this->_dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $error) {
      echo "Koneksi gagal" .$error->getMessage;
    }
  }

  public function __destruct() {
    $this->_dbh = null;
  }
  
  public function query($query) {
    $this->_sql = $query;
    return $this;
  }

  public function select($column = '') {
    if (is_array($column)) $col = implode(',', $column);
    else $col = '*';

    $this->_select = "SELECT " .$col." FROM ".$this->_table;
    return $this;
  }

  public function where($condition = '') {
    $this->_where = '';
    if(is_array($condition)) {
      $this->_where .= "WHERE";
      foreach($condition as $cond) {
        if(is_array($cond)) {
          $this->_where .= " $cond[0] $cond[1] $cond[2] AND";
        } else {
          $this->_where .= " $condition[0] $condition[1] $condition[2] AND";
          break;
        }
      }
      $this->_where = substr($this->_where, 0, -3);
    }

    return $this;
  }

  public function orderBy($col, $by = "ASC") {
    $this->_order = " ORDER BY $col $by";
    return $this;
  }

  public function limit($val1, $val2 = 0) {
    if ($val2 == 0) $this->_limit = "LIMIT $val1";
    else $this->_limit = " LIMIT $val1,$val2";
    return $this;
  }

  public function join($table, $param, $join = "JOIN"){
    $this->_join = "";
    if (is_array($table)) {
      foreach ($table as $tbl) {
        $this->_join .= "$join $tbl";
      }
    } else $this->_join .= "$join $table";

    foreach ($param as $key=>$val) {
      $this->_join .= " ON $key = $val";
    }
    
    return $this;

  }

  public function get() {
    try {
      if ($this->_sql == null) $sql = $this->_select." ".$this->_join." ".$this->_where." ".$this->_order." ".$this->_limit;
      else $sql = $this->_sql;
      
      // return var_dump($sql);
      $query = $this->_dbh->query($sql);


      $data = array();
      while ($row = $query->fetch()) {
        array_push($data, $row);
      }
      return $data;
    } catch (\PDOException $error) {
      die ("Tidak dapat menampilkan data: ".$error->getMessage());
    }
  }
  
  public function count() {
    try {
      if ($this->_sql == null) $sql = $this->_select." ".$this->_join." ".$this->_where." ".$this->_order." ".$this->_limit;
      else $sql = $this->_sql;

      $query = $this->_dbh->query($sql);
      return $query->rowCount();
    } catch (\PDOException $error) {
      die ("Tidak dapat menampilkan jumlah: ".$error->getMessage());
    }
  }

  public function data($data = array()) {
    $this->_data = "";
    foreach ($data as $key=>$val) {
      if ($val == null) continue;
      $this->_data .= " $key='$val',";
    }
    $this->_data = substr($this->_data, 0, -1);
    // return die($this->_data);

    // return die("ini model kepanggil");

    return $this;
  }

  public function insert() {
    try {
      $sql = "INSERT INTO ".$this->_table." SET".$this->_data.";";
      // return die($sql);
      return $this->_dbh->query($sql);
    } catch (\PDOException $error) {
      die ("Tidak dapat menyimpan data: ".$error->getMessage());
    }
  }

  public function find($id) {
    $this->_primary = $this->_primary ? $this->_primary : "id".$this->_table;
    $this->_where = " WHERE $this->_primary=$id";
    return $this;
  }
  
  public function update() {
    try {
      $sql = "UPDATE ".$this->_table." SET".$this->_data." ".$this->_where;
      // return var_dump($sql);
      return $this->_dbh->query($sql);
    } catch (\PDOException $error) {
      die ("Tidak dapat memperbarui data: ".$error->getMessage());
    }
  }

  public function delete() {
    try {
      $sql = "DELETE FROM ".$this->_table." ".$this->_where;
      return $this->_dbh->query($sql);
    } catch (\PDOException $error) {
      die("Tidak dapat menghapus data: " .$error.getMessage());
    }
  }

  public function validator($vals = array()) {

    foreach( $vals as $key=>$value ) {
      $val = array();
      $rules = \explode("|", $value);

      foreach ($rules as $v) {
        if (strpos($v, ":")) {
          $r = explode(":", $v);
          $val[$r[0]] = $r[1];
        } else {
          array_push($val, $v);
        }
      }
      $this->_val[$key] = $val;


    }

  }

  public function validation($datas = array()) {
    foreach( $datas as $dataKey=>$value ) {
      foreach ( $this->_val[$dataKey] as $key=>$rul) {
        // var_dump("ini rule:v", $key, "punteun", $rul);
        $this->validating( $dataKey, $key, $value );
      }
    }
  }

  public function validating($dataKey, $rules, $data) {
    // return var_dump("ini rulenya", $data);
    switch($rules) {
      case 'required':
        if (empty($data)) {
          $this->_val_message = "Data is required";
          return $this;
        }
      break;
      case "string":
        if (!\is_string($data)) {
          $this->_val_message = "Data must be a string";
          return $this;
        }
      break;
      case "number":
        if (!\is_numeric($data)) {
          // return var_dump("etst");
          $this->_val_message = "Data must be a number";
          return $this;
        }
      break;
      case "bool":
        if (!\is_bool($data)) {
          $this->_val_message = "Data must be a boolean";
          return $this;
        }
      break;
      case "email":
        // return var_dump("test");
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        $this->_val_message = (preg_match($regex, $data))?"":"invalid email";
      break;
      case "max":
        $len = strlen($data);
        if ($len < $this->_val[$rules]) {
          $this->_val_message = "Data can't be more than $_val[$rules]";
          return $this;
        }
      break;
      case "min":
        $len = strlen($data);
        $min = $this->_val[$dataKey][$rules];
        if ($len < $min) {
          // return var_dump("ini kena smape");
          $this->_val_message = "Data can't be less than $min";
          return $this;
        }
      break;
      case "unique":
        $jml = $this
          ->query("SELECT ".$dataKey." FROM ".$this->_table." WHERE ".$dataKey." ='".$data."'")
          ->count();
        if ($jml > 0) {
          return var_dump("ini kena smape");
          $this->_val_message = "Data must be unique";
          return $this;
        }
      break;
    }
  }

  public function getValMessage() {
    return $this->_val_message;
  }

  public function getQuery() {
    return $this->_sql;
  }

}