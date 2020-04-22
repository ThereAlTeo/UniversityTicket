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

     public function getTipologiaInfo($IDTipologia){
         $query = "SELECT COUNT(*) as 'EventNum', T.Nome FROM tipologia T INNER JOIN genere G ON G.IDTipologia=T.IDTipologia
                                                         INNER JOIN evento E ON E.IDGenere=G.IDGenere
                   WHERE T.IDTipologia = ?";

         $stmt = $this->db->prepare($query);
         $stmt->bind_param('i', $IDTipologia);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC)[0];
     }

     public function getBachecaSectionInfoByKindID($musicType) {
         if(count($musicType) < 2)
            return array();

         $query = "SELECT E.IDEvento, A.NomeDArte, E.Locandina, P.Nome, P.Cognome, MAX(E.Recommendation) AS 'Recommendation', MIN(TA.Prezzounitario) AS 'Prezzounitario'
                                    FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia INNER JOIN evento E ON E.IDGenere=G.IDGenere
                                                     INNER JOIN location L ON L.IDLocation=E.IDLocation
                                                     INNER JOIN settore S ON L.IDLocation=S.IDLocation
                                                     INNER JOIN tariffario TA ON TA.IDEvento=E.IDEvento AND S.IDSettore=TA.IDSettore
                                                     INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                                     INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                                     WHERE T.IDTipologia=? AND E.DataInizio > CURDATE()
                                     GROUP BY A.IDArtista
                                     ORDER BY RAND()";

         if($musicType[1])
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

     public function getArtistInfo($IDArtista){
         $stmt = $this->db->prepare("SELECT P.*, A.*
                                     FROM artista A INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                                     WHERE A.IDArtista = ?");
         $stmt->bind_param('i', $IDArtista);
         $stmt->execute();
         return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

         /* sostituire con getCorrectArtistName($result) la parte sottostante
         if(is_null($result['NomeDArte']) || strcmp($result['NomeDArte'], "") == 0)
             return $result['Nome']." ".$result['Cognome'];
         else
             return $result['NomeDArte'];*/
     }

    public function getResImageName($IDGenere, $IDArtista, $eventID){
        $IDTipologia = $this->getKindOfMusicInfo($IDGenere);
        $name = "";
        if($IDTipologia["IDTipologia"] != 2){
            $name = $this->getArtistPublicName($IDArtista);
        } else
            $name = $eventID.$IDTipologia["Name"];

        return clearNameForPathValue($name);
    }

    public function upgradeEventImage($eventID, $locandinaName){
        $query = "UPDATE evento SET Locandina = ? WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $locandinaName, $eventID);
        return $stmt->execute();
    }

     public function insertEvent($eventTitle, $IDArtista, $IDLocation, $IDGenere, $eventDescription, $startEvent, $endEvent, $publicedDateEvent){
         $recommendation = rand(35, 50) / 10;
         $query = "INSERT INTO evento(IDEvento, Titolo, Locandina, IDOrganizzatore, IDArtista, IDLocation, IDGenere, Info, DataInizio, DataFine, DataPubblicazione, Recommendation)
                   VALUES (IDEvento, ?, '', ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('siiiissssd', $eventTitle, $_SESSION["accountLog"][2], $IDArtista, $IDLocation, $IDGenere, $eventDescription, $formatStartEvent, $formatEndEvent, $formatPublicedEvent, $recommendation);
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

    public function enableUser($Email){
         $query = "UPDATE ticketuser SET AccountAbilitato = 1 WHERE Email = ?";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('s', $Email);
         return $stmt->execute();
    }

    public function LocationExistInDB($location){
         $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM location WHERE Nome = ?");
         $stmt->bind_param('s', $location);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC)[0]["rowNum"] > 0;
    }

    public function insertSectorbyLocation($idLocation, $nome, $capienza){
         $query = "INSERT INTO settore(IDSettore, Nome, IDLocation, Capienza) VALUES (IDSettore, ?, ?, ?)";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('sii',$nome, $idLocation, $capienza);
         return $stmt->execute();
    }

    public function insertLocation($locationName, $locationAddress, $locationImage){
       $query = "INSERT INTO location(IDLocation, Nome, Indirizzo, Immagine) VALUES (IDLocation, ?, ?, ?)";
       $stmt = $this->db->prepare($query);
       $stmt->bind_param('sss', $locationName, $locationAddress, $locationImage);
       $stmt->execute();
       return $stmt->insert_id;
   }

   public function deleteLocation($idLocation){
      $query = "DELETE FROM location WHERE IDLocation = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $idLocation);
      return $stmt->execute();
  }

  public function selectedEventNumByArtist($IDArtista, $all = false){
      $stmt = $this->db->prepare("SELECT E.IDEvento
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
                                  WHERE E.IDArtista = ? ".($all ? "&& E.DataInizio > CURDATE()" : ""));
      $stmt->bind_param('i', $IDArtista);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function selectedEventsInfo($eventID){
      $stmt = $this->db->prepare("SELECT L.Nome AS 'LocationName', L.Indirizzo, E.DataInizio, E.IDEvento, A.NomeDArte, P.Nome, P.Cognome, MIN(T.Prezzounitario) AS 'Price'
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
				                              INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                              INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                                              INNER JOIN settore S ON S.IDLocation=L.IDLocation
                                              INNER JOIN tariffario T ON T.IDSettore=S.IDSettore
                                  WHERE E.DataInizio >= CURDATE() && E.IDArtista = ?
                                  GROUP BY E.IDEvento ORDER BY E.DataInizio");
      $stmt->bind_param('i', $eventID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function filterLocationByValue($value){
      $stmt = $this->db->prepare("SELECT L.IDLocation, L.Nome, COUNT(E.IDEvento) AS 'eventNum'
                                  FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
                                  WHERE L.Nome LIKE "."'%".$value."%' OR L.Nome LIKE "."'%".ucfirst($value)."%' ".
                                  "GROUP BY L.IDLocation ORDER BY L.Nome LIMIT 5");
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function filterArtistByValue($value){
     $stmt = $this->db->prepare("SELECT A.NomeDArte, A.IDArtista, COUNT(E.IDEvento) AS 'eventNum', P.Nome, P.Cognome
                                FROM artista A LEFT JOIN evento E ON A.IDArtista=E.IDArtista
                                               INNER JOIN persona P ON A.AnagraficaArtista=P.IDPersona
                                WHERE A.NomeDArte LIKE "."'%".$value."%' OR A.NomeDArte LIKE "."'%".ucfirst($value)."%' ".
                                "GROUP BY A.IDArtista ORDER BY A.AnagraficaArtista LIMIT 5");
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getLocationWithEvent($limit = 0){
      $query = "SELECT L.IDLocation, L.Nome, L.Immagine, COUNT(E.IDEvento) AS 'EventNum', ROUND(AVG(E.Recommendation), 2) as 'Recommendation', MIN(T.Prezzounitario) AS 'Prezzounitario'
                FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
				                INNER JOIN settore S ON S.IDLocation=E.IDLocation
                                INNER JOIN tariffario T ON T.IDSettore=S.IDSettore AND T.IDEvento=E.IDEvento AND T.IDLocation=E.IDLocation
                WHERE E.DataInizio >= CURDATE()
                GROUP BY L.IDLocation
                ORDER BY EventNum DESC";

      if ($limit)
          $query = $query." LIMIT ".$limit;

      $stmt = $this->db->prepare($query);

      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);

  }

  public function getAllLocationInfo(){
       $stmt = $this->db->prepare("SELECT L.Nome, L.Indirizzo, COUNT(E.IDEvento) AS \"NrEventi\", ROUND(RAND()*10000) AS \"NrBiglietti\"
                                   FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
                                   GROUP BY L.IDLocation");
       $stmt->execute();
       $result = $stmt->get_result();

       return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getEventNumByManager($ManagerID){
      $stmt = $this->db->prepare("SELECT COUNT(*) as 'TableRows' FROM evento E WHERE E.IDOrganizzatore = ?");
      $stmt->bind_param('i', $ManagerID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC)[0]["TableRows"];
  }

  public function getArtistNumByManager($ManagerID){
      $stmt = $this->db->prepare("SELECT COUNT(*) as 'TableRows' FROM artista A WHERE A.IDReferente = ?");
      $stmt->bind_param('i', $ManagerID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC)[0]["TableRows"];
  }

  public function getAllEventByLocationID($idLocation){
      $query = "SELECT E.IDEvento, A.NomeDArte, E.Locandina, P.Nome, P.Cognome, MAX(E.Recommendation) AS 'Recommendation', MIN(TA.Prezzounitario) AS 'Prezzounitario'
                FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                  INNER JOIN artista A ON A.IDArtista=E.IDArtista
                              INNER JOIN persona P ON A.AnagraficaArtista=P.IDPersona
                              INNER JOIN settore S ON L.IDLocation=S.IDLocation
                              INNER JOIN tariffario TA ON TA.IDEvento=E.IDEvento AND S.IDSettore=TA.IDSettore
                WHERE L.IDLocation = ? AND E.DataInizio >= CURDATE()
                GROUP BY A.IDArtista ORDER BY RAND()";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $idLocation);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getLocationInfo($idLocation){
      $stmt = $this->db->prepare("SELECT * FROM location L WHERE L.IDLocation = ?");
      $stmt->bind_param('i', $idLocation);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC)[0];
  }

  public function getEventLocationInfoByID($idLocation){
      $stmt = $this->db->prepare("SELECT L.Nome, COUNT(E.IDEvento) AS 'EventNum'
                                  FROM location L INNER JOIN evento E ON E.IDLocation=L.IDLocation
                                  WHERE L.IDLocation = ? AND E.DataInizio >= CURDATE() GROUP BY L.IDLocation");
      $stmt->bind_param('i', $idLocation);
      $stmt->execute();
      $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      if(count($result))
        return $result[0];
      else
        return array("Nome" => $this->getLocationInfo($idLocation)["Nome"], "EventNum" => "0");
  }

  public function getArtstInfoByEventID($IDTour){
      $stmt = $this->db->prepare("SELECT A.*, P.*
                                  FROM evento E INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                                INNER JOIN persona P ON A.AnagraficaArtista=P.IDPersona
                                  WHERE E.IDEvento = ?");
      $stmt->bind_param('i', $IDTour);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getLocandinaByArtist($IDArtist){
      $stmt = $this->db->prepare("SELECT DISTINCT E.Locandina
                                  FROM evento E INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                  WHERE E.IDArtista = ?
                                  ORDER BY E.DataInizio DESC");
      $stmt->bind_param('i', $IDArtist);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function exisitEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT E.* FROM evento E WHERE E.IDEvento = ? AND E.DataFine > CURDATE()");
      $stmt->bind_param('i', $IDEvent);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getEventInfo($IDEvent){
      $stmt = $this->db->prepare("SELECT E.IDEvento, E.Titolo, E.IDArtista, E.Locandina, E.IDLocation, E.IDGenere, E.Info, E.DataInizio, L.Nome, L.Indirizzo
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
                                  WHERE E.IDEvento = ? AND E.DataFine > CURDATE()");
      $stmt->bind_param('i', $IDEvent);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getSectorInfoByEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT T.*, S.Nome
                                  FROM evento E INNER JOIN tariffario T ON E.IDEvento=T.IDEvento
	                                            INNER JOIN settore S ON T.IDSettore=S.IDSettore
                                  WHERE E.IDEvento = ? AND E.DataFine > CURDATE() ORDER BY Prezzounitario DESC");
      $stmt->bind_param('i', $IDEvent);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getGeneralInfoByIDEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT E.IDEvento, E.Titolo, E.Locandina, E.DataInizio, L.Nome, T.Email, E.IDArtista
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
		                                        INNER JOIN ticketuser T ON E.IDOrganizzatore=T.IDUser
                                  WHERE E.IDEvento = ?");
      $stmt->bind_param('i', $IDEvent);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getRateEvent($IDEvent, $IDSector){
      $stmt = $this->db->prepare("SELECT S.*, T.Disponibilita, T.Prezzounitario
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                               INNER JOIN settore S ON L.IDLocation=S.IDLocation
                                           INNER JOIN tariffario T ON S.IDLocation=T.IDLocation AND S.IDSettore=T.IDSettore AND E.IDEvento=T.IDEvento
                                  WHERE T.IDSettore = ? AND E.IDEvento = ?");
      $stmt->bind_param('ii', $IDSector, $IDEvent);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getActualTicketSell($IDEvent, $IDSector){
      $stmt = $this->db->prepare("SELECT COUNT(B.Matricola) AS 'NumTicket'
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                               INNER JOIN settore S ON L.IDLocation=S.IDLocation
                                           INNER JOIN biglietto B ON B.IDSettore=S.IDSettore AND B.IDLocation=s.IDLocation AND B.IDEvento=E.IDEvento
                                 WHERE S.IDSettore = ? AND E.IDEvento = ?");
      $stmt->bind_param('ii', $IDSector, $IDEvent);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["NumTicket"];
  }

  public function getTicketInfoPrice($IDEvent, $IDSector, $QNT){
      $rateInfo = $this->getRateEvent($IDEvent, $IDSector);
      if(count($rateInfo)){
          $rateInfo = $rateInfo[0];
          $numTicket = $this->getActualTicketSell($IDEvent, $IDSector) + 1;
          $arrSectorInfo = array();
          foreach (range($numTicket, $numTicket + $QNT - 1) as $value) {
              array_push($arrSectorInfo, array('IDSector' => $rateInfo["IDSettore"], 'SectoreName' => $rateInfo["Nome"],
                                               'Price' => $rateInfo["Prezzounitario"], 'Seat' => $value));
          }

          return $arrSectorInfo;
      }
      return array();
  }

  public function getPaymentMode(){
      $stmt = $this->db->prepare("SELECT * FROM modalitapagamento");
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getDeliveryMode(){
      $stmt = $this->db->prepare("SELECT * FROM modalitaconsegna");
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function getDeliveryItemByID($IDDelivery){
      foreach ($this->getDeliveryMode() as $key => $value) {
          if($value["IDDelivery"] == $IDDelivery)
            return $value;
      }
      return array();
  }

  public function getFullUserInfo($IDUser){
      $stmt = $this->db->prepare("SELECT P.*, U.* FROM persona P INNER JOIN ticketuser U ON U.AnagraficaUtente=P.IDPersona
                                  WHERE U.IDUser = ?");
      $stmt->bind_param('i', $IDUser);
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function insertAcquisto($IDPayment, $IDDelivery, $IDUser, $PrezzoTotale, $Data = date("Y-m-d H:i:s")){
      $query = "INSERT INTO acquisto(IDAcquisto, IDPayment, IDDelivery, IDUser, Data, PrezzoTotale) VALUES (IDAcquisto, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('iiisd', $IDPayment, $IDDelivery, $IDUser, $Data, $PrezzoTotale);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function insertTicket($Matricola, $IDSettore, $IDLocation, $IDEvento){
      $query = "INSERT INTO biglietto(Matricola, IDSettore, IDLocation, IDEvento) VALUES (?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('Siii', $Matricola, $IDSettore, $IDLocation, $IDEvento);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function insertAcquistoMultiplo($Matricola, $IDAcquisto){
      $query = "INSERT INTO bigliettoacquistato(Matricola, IDAcquisto) VALUES (?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('si', $Matricola, $IDAcquisto);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function insertRecensione($Matricola, $IDAcquisto, $Recensione, $Recommendation){
      $query = "INSERT INTO recensione(IDRecensione, Matricola, IDAcquisto, Recensione, Recommendation) VALUES (IDRecensione, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('sisd', $Matricola, $IDAcquisto, $Recensione, $Recommendation);
      $stmt->execute();
      return $stmt->insert_id;
  }
}
?>
