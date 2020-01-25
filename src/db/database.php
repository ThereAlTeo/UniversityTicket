<?php
class DatabaseHelper{
     private $db;

     public function __construct($servername, $username, $password, $dbname){
          $this->db = new mysqli($servername, $username, $password, $dbname);
          if ($this->db->connect_error) {
               die("Connection failed: " . $db->connect_error);
          }
     }

     public function getEventType()
     {
          $stmt = $this->db->prepare("SELECT * FROM tipologia");
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getRandonEventOfCategory($ValueNum, $Category)
     {
         $stmt = $this->db->prepare("SELECT G.Name FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia WHERE T.IDTipologia=? ORDER BY RAND() LIMIT ?");
         $stmt->bind_param('ii', $Category, $ValueNum);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function AccountExistInDB($email)
     {
          $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM persona P WHERE P.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC)[0]["rowNum"] > 0;
     }

     public function checkUserPassword($email, $password)
     {
          $stmt = $this->db->prepare("SELECT P.Password FROM persona P WHERE P.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return strcmp($result->fetch_all(MYSQLI_ASSOC)[0]["Password"], $password) == 0;
     }

     public function insertNewUser($nome, $cognome, $Email, $password, $userType)
     {
          $query = "INSERT INTO persona(IDPersona, Nome, Cognome, Email, Password, IDAccesso) VALUES (IDPersona, ?, ?, ?, ?, ?)";
          $stmt = $this->db->prepare($query);
          $stmt->bind_param('ssssi',$nome, $cognome, $Email, $password, $userType);

          return $stmt->execute();
     }

     public function enableUser($Email)
     {
          $query = "UPDATE persona SET AccountAbilitato = 1 WHERE Email = ?";
          $stmt = $this->db->prepare($query);
          $stmt->bind_param('s', $Email);

          return $stmt->execute();
     }

     public function getAccountAccessInfo($email)
     {
          $stmt = $this->db->prepare("SELECT P.IDAccesso FROM persona P WHERE P.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC)[0]["IDAccesso"];
     }

     public function getAllUsersInfo()
     {
          $stmt = $this->db->prepare("SELECT P.Nome, P.Cognome, P.Email, DATE_FORMAT(P.DataRegistrazione, '%d/%m/%Y ') as 'DataRegistrazione' , T.Descrizione, IF(P.AccountAbilitato, 'TRUE', 'FALSE') 'AccountAbilitato' FROM persona P INNER JOIN tipologiaaccesso T ON P.IDAccesso=T.IDAccesso");
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }
}
?>
