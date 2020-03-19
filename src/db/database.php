<?php
class DatabaseHelper{
     private $db;

     public function __construct($servername, $username, $password, $dbname){
          $this->db = new mysqli($servername, $username, $password, $dbname);
          if ($this->db->connect_error) {
               die("Connection failed: " . $db->connect_error);
          }
     }

     public function AccountExistInDB($email){
          $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC)[0]["rowNum"] > 0;
     }

     public function checkUserPassword($email, $password){
          $stmt = $this->db->prepare("SELECT T.Password FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return strcmp($result->fetch_all(MYSQLI_ASSOC)[0]["Password"], $password) == 0;
     }

     public function getAccountAccessInfo($email){
          $stmt = $this->db->prepare("SELECT T.IDAccesso, T.IDUser FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC)[0];
     }

     private function getRecordInTable($table){
         $stmt = $this->db->prepare("SELECT COUNT(*) as \"TableRows\" FROM ".$table);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC)[0]["TableRows"];
    }

    public function getAccountRecordNumber(){
         return $this->getRecordInTable("ticketuser");
    }

    public function getLocationRecordNumber(){
         return $this->getRecordInTable("location");
    }

    public function getAllUsersInfo(){
         $stmt = $this->db->prepare("SELECT P.Nome, P.Cognome, T.Email, DATE_FORMAT(T.DataRegistrazione, '%d/%m/%Y ') as 'DataRegistrazione', A.Descrizione, IF(T.AccountAbilitato, 'TRUE', 'FALSE') 'AccountAbilitato' FROM ticketuser T INNER JOIN persona P ON T.AnagraficaUtente=P.IDPersona INNER JOIN tipologiaaccesso A ON A.IDAccesso=T.IDAccesso");
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function nameExistInDB($name, $surname){
         $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM persona P WHERE P.Nome=? AND P.Cognome=?");
         $stmt->bind_param('ss', $name, $surname);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC)[0]["rowNum"] == 0;
    }

    public function insertNewUser($name, $surname, $cf, $birth){
         $query = "INSERT INTO"." persona(IDPersona, Nome, Cognome".(strcmp($cf, "") == 0 ? "" : ", CF").(strcmp($birth, "") == 0 ? "" : ", DataNasciata").") VALUES (IDPersona, ?, ?";

         if(strcmp($cf, "") != 0)
              $query = $query.",\"".$cf."\"";
         if(strcmp($birth, "") != 0)
              $query = $query.", \"".$birth."\"";

         $stmt = $this->db->prepare($query.")");
         $stmt->bind_param('ss', $name, $surname);
         $stmt->execute();

         $stmt = $this->db->prepare("SELECT IDPersona FROM persona WHERE Nome = ? AND Cognome = ?");
         $stmt->bind_param('ss', $name, $surname);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC)[0]["IDPersona"];
    }

    public function insertNewArtist($name, $surname, $cf, $birth, $bio, $artName, $IDReferente){
          $idPerson = $this->insertNewUser($name, $surname, $cf, $birth);
          $stmt = $this->db->prepare("INSERT INTO artista(IDArtista, AnagraficaArtista, NomeDArte, IDReferente, Biografia) VALUES (IDArtista, ?, ?, ?, ?)");
          $stmt->bind_param('isis', $idPerson, $artName, $IDReferente, $bio);
          return $stmt->execute();
     }

     public function getArtistByManager($Manager){
          $stmt = $this->db->prepare("SELECT A.IDArtista, P.Nome, P.Cognome, A.NomeDArte FROM artista A INNER JOIN persona P ON A.AnagraficaArtista=P.IDPersona WHERE A.IDReferente=?");
          $stmt->bind_param('i', $Manager);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getEventType(){
          $stmt = $this->db->prepare("SELECT * FROM tipologia");
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     /***
     cambiare nome della funzione per renderlo può aderente a quanto compie
     */
     public function getKindOfMusicByType($musicType) {
          $stmt = $this->db->prepare("SELECT G.IDGenere, G.Name FROM genere G INNER JOIN tipologia T ON G.IDTipologia=T.IDTipologia WHERE T.IDTipologia=?");
          $stmt->bind_param('i', $musicType);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getAllLocation() {
          $stmt = $this->db->prepare("SELECT IDLocation, Nome FROM location");
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getSectorByLocationID($idLocation) {
          $stmt = $this->db->prepare("SELECT IDSettore, Nome, Capienza FROM settore WHERE IDLocation = ?");
          $stmt->bind_param('i', $idLocation);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }



     /**
     * Da controllare
     */




     public function getRandonEventOfCategory($ValueNum, $Category){
         $stmt = $this->db->prepare("SELECT G.Name FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia WHERE T.IDTipologia=? ORDER BY RAND() LIMIT ?");
         $stmt->bind_param('ii', $Category, $ValueNum);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC);
     }



     public function enableUser($Email){
          $query = "UPDATE persona SET AccountAbilitato = 1 WHERE Email = ?";
          $stmt = $this->db->prepare($query);
          $stmt->bind_param('s', $Email);

          return $stmt->execute();
     }





     public function getAllLocationInfo(){
          $stmt = $this->db->prepare("SELECT L.Nome, L.Indirizzo, ROUND(RAND()*100) AS \"NrEventi\", ROUND(RAND()*100) AS \"NrBiglietti\" FROM location L");
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function LocationExistInDB($location){
          $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM location WHERE Nome = ?");
          $stmt->bind_param('s', $location);
          $stmt->execute();
          $result = $stmt->get_result();

          return $result->fetch_all(MYSQLI_ASSOC)[0]["rowNum"] > 0;
     }

     public function insertLocation($locationName, $locationAddress){
        $query = "INSERT INTO location(IDLocation, Nome, Indirizzo) VALUES (IDLocation, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $locationName, $locationAddress);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function insertSectorbyLocation($nome, $idLocation, $capienza){
         $query = "INSERT INTO settore(IDSettore, Nome, IDLocation, Capienza) VALUES (IDSettore, ?, ?, ?)";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('sii',$nome, $idLocation, $capienza);

         return $stmt->execute();
    }


}
?>
