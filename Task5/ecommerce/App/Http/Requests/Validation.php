<?php 
namespace App\Http\Requests;

use App\Database\Models\Model;

class Validation{
    private $value; 
    private $InputName;
    private array $errors=[];
    public function required():self
    {
        if(empty($this->value)){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Is Required";

        }
        return $this;

    }
    public function max(int $max):self
    {
        if(strlen($this->value)>$max){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Must be less than {$max} Characters";

        }
        return $this;

    }
    public function confirmed($compareValue):self
    {
        if($this->value != $compareValue){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Not Confirmed";

        }
        return $this;

    }
    public function regex(string $pattern,$message=null):self
    {
        if(!preg_match($pattern,$this->value )){
            $this->errors[$this->InputName][__FUNCTION__] = $message ?? "{$this->InputName} Invalid";

        }
        return $this;

    }
    public function string():self
    {
        if(!is_string($this->value)){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Must be string ";

        }
        return $this;

    }
    public function in(array $values):self
    {
        if(!in_array($this->value ,$values)){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Must be ". implode($values);

        }
        return $this;

    }
    public function unique(string $table,string $column)
    {
        $model = new Model;
        $stmt = $model->connect->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Already Exists";
        }
        return $this;


    }
    public function exists(string $table,string $column)
    {
        $model = new Model;
        $stmt = $model->connect->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0){
            $this->errors[$this->InputName][__FUNCTION__] = "{$this->InputName} Dosen't Exists";
        }
        return $this;

    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the value of InputName
     *
     * @return  self
     */ 
    public function setInputName($InputName)
    {
        $this->InputName = $InputName;

        return $this;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * Get the value of error
     */ 
    public function getError(string $error):?string
    {
        if(isset($this->errors[$error])){
            foreach($this->errors[$error] AS $error){
                return $error;

            }
        }
        return null;
    }
    public function getMessage(string $error):string
    {
        return  "<p class='text-danger font-weight-bold'>".$this->getError($error)."</p>";
    }


}