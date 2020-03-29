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

    private function insertNewPerson($name, $surname, $cf, $birth){
        $stmt = $this->db->prepare("INSERT INTO persona(IDPersona, Nome, Cognome, CF, DataNasciata) VALUES (IDPersona, ?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $surname, $cf, $birth);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function insertNewTicketUser($name, $surname, $cf, $birth, $email, $password, $userPermission){
        $idPerson = $this->insertNewPerson($name, $surname, $cf, $birth);
        $stmt = $this->db->prepare("INSERT INTO ticketuser(IDUser, AnagraficaUtente, Email, Password, DataRegistrazione, AccountAbilitato, IDAccesso) VALUES (IDUser, ?, ?, ?, NOW(), 0, ?)");
        $stmt->bind_param('issi', $idPerson, $email, $password, $userPermission);
        return $stmt->execute();
    }

    public function insertNewArtist($name, $surname, $cf, $birth, $bio, $artName, $IDReferente){
          $idPerson = $this->insertNewPerson($name, $surname, $cf, $birth);
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

     public function getBachecaSectionInfoByKindID($musicType) {
         if(count($musicType) < 2)
            return array();

         $query = "SELECT E.IDEvento, T.Nome, A.NomeDArte, E.Locandina, P.Nome, P.Cognome, MAX(E.Recommendation) AS 'Recommendation', MIN(TA.Prezzounitario) AS 'Prezzounitario'
                                    FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia INNER JOIN evento E ON E.IDGenere=G.IDGenere
                                                     INNER JOIN tariffario TA ON TA.IDEvento=E.IDEvento
                                                     INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                                     INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                                     WHERE T.IDTipologia=?
                                     GROUP BY A.IDArtista";

         if($musicType[1] != 0)
             $query = $query." LIMIT ".$musicType[1];
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('i', $musicType[0]);
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

     public function getKindOfMusicByType($IDMusicKind){
         $stmt = $this->db->prepare("SELECT G.IDGenere, G.Name FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia
                                     WHERE T.IDTipologia = ?");
         $stmt->bind_param('i', $IDMusicKind);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getKindOfMusicInfo($IDKind){
         $stmt = $this->db->prepare("SELECT T.IDTipologia, G.Name FROM genere G INNER JOIN tipologia T ON G.IDTipologia=T.IDTipologia WHERE G.IDGenere = ?");
         $stmt->bind_param('i', $IDKind);
         $stmt->execute();
         $result = $stmt->get_result();

         return $result->fetch_all(MYSQLI_ASSOC)[0];
     }

     public function getArtistPublicName($IDArtista){
         $stmt = $this->db->prepare("SELECT P.Nome, P.Cognome, A.NomeDArte FROM artista A INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista WHERE A.IDArtista = ?");
         $stmt->bind_param('i', $IDArtista);
         $stmt->execute();
         $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];

         if(is_null($result['NomeDArte']) || strcmp($result['NomeDArte'], "") == 0)
             return $result['Nome']." ".$result['Cognome'];
         else
             return $result['NomeDArte'];
     }

    public function getResImageName($IDGenere, $IDArtista, $eventID){
        $IDTipologia = $this->getKindOfMusicInfo($IDGenere);
        $name = "";
        if($IDTipologia["IDTipologia"] != 2){
            $name = $this->getArtistPublicName($IDArtista);
        } else
            $name = $eventID.$IDTipologia["Name"];

        return preg_replace("/[^a-zA-Z0-9]+/", "", $name);
    }

    public function upgradeEventImage($eventID, $locandinaName){
        $query = "UPDATE evento SET Locandina = ? WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $locandinaName, $eventID);

        return $stmt->execute();
    }

     public function insertEvent($eventTitle, $eventSubTitle, $IDArtista, $IDLocation, $IDGenere, $eventDescription, $startEvent, $endEvent, $publicedDateEvent){
         $formatStartEvent = sqlFormatDatetime($startEvent);
         $formatEndEvent = sqlFormatDatetime($endEvent);
         $formatPublicedEvent = sqlFormatDatetime($publicedDateEvent);
         $recommendation = rand(35, 50) / 10;
         $eventDescription = strlen($eventDescription) > 0 ? $eventDescription : null;
         $query = "INSERT INTO evento(IDEvento, Titolo, Sottotitolo, Locandina, IDOrganizzatore, IDArtista, IDLocation, IDGenere, Info, DataInizio, DataFine, DataPubblicazione, Recommendation)
                   VALUES (IDEvento, ?, ?, '', ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('ssiiiissssd', $eventTitle, $eventSubTitle, $_SESSION["accountLog"][2], $IDArtista, $IDLocation, $IDGenere, $eventDescription, $formatStartEvent, $formatEndEvent, $formatPublicedEvent, $recommendation);
         $stmt->execute();

         return $stmt->insert_id;
    }

    public function insertTariffarioEvento($eventID, $IDsectors, $IDLocation, $unitaryPrice, $sectorCapacity){
        $query = "INSERT INTO tariffario(IDEvento, IDSettore, IDLocation, Prezzounitario, Disponibilita) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiidi', $eventID, $IDsectors, $IDLocation, $unitaryPrice, $sectorCapacity);
        return $stmt->execute();
    }

    public function deleteEventByID($eventID = 0){
        $stmt = $this->db->prepare("DELETE FROM evento WHERE IDEvento = ?");
        $stmt->bind_param('i', $eventID);
        return $stmt->execute();
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
