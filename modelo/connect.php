<?php
//esta clase administra toda la clase de coneccion 
class connect{
    //los atributos
    private $host="13.92.130.144";
    private $user="innovacion";
    private $password="innovacion";
    private $database="dbinovacion";   
    private $connnect;//para la coneccion
   public function conectar( $consulta) {
      $this->connnect=new mysqli($this->host, $this->user, $this->password, $this->database);//abre la coneccion con los datos
      $resultado=  $this->connnect->query($consulta);//ejecuta la consula
      $this->connnect->close();// cierra la coneccion
      return $resultado;//devuelve los resultados
   }

}

?>

