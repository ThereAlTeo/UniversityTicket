<?php
class DatabaseHelper{
     private $db;

     public function __construct($servername, $username, $password, $dbname){
          $this->db = new mysqli($servername, $username, $password, $dbname);
          if ($this->db->connect_error) {
               die("Connection failed: " . $db->connect_error);
          }
     }

     private function factoryFetchMethos($stmt){
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
     }

     public function getMailMangerByticketID($Matricola){
          $stmt = $this->db->prepare("SELECT U.Email
                                      FROM biglietto B INNER JOIN evento E ON B.IDEvento=E.IDEvento
                                                       INNER JOIN ticketuser U ON U.IDUser=E.IDOrganizzatore
                                      WHERE B.Matricola = ?");
          $stmt->bind_param('s', $Matricola);
          return $this->factoryFetchMethos($stmt)[0]["Email"];
     }

     public function getAllUser(){
         $stmt = $this->db->prepare("SELECT T.* FROM ticketuser T WHERE T.IDAccesso = 1");
         return $this->factoryFetchMethos($stmt);
     }

     public function AccountExistInDB($email){
          $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          return $this->factoryFetchMethos($stmt)[0]["rowNum"] > 0;
     }

     public function checkUserPassword($email, $password){
          $stmt = $this->db->prepare("SELECT T.Password FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          return strcmp($this->factoryFetchMethos($stmt)[0]["Password"], $password) == 0;
     }

     public function changePassword($newPassword, $mail){
         $query = "UPDATE ticketuser SET Password = ? WHERE ticketuser.Email = ?";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('ss', $newPassword, $mail);
         return $stmt->execute();
     }

     public function getAccountAccessInfo($email){
          $stmt = $this->db->prepare("SELECT T.* FROM ticketuser T WHERE T.Email=?");
          $stmt->bind_param('s', $email);
          return $this->factoryFetchMethos($stmt)[0];
     }

     public function getPersonInfoByID($IDUser){
         $stmt = $this->db->prepare("SELECT T.DataRegistrazione, P.Nome, P.Cognome, P.CF, P.DataNascita
                                     FROM ticketuser T INNER JOIN persona P ON P.IDPersona=T.AnagraficaUtente
                                     WHERE T.IDUser = ?");
         $stmt->bind_param('i', $IDUser);
         return $this->factoryFetchMethos($stmt);
     }

     private function getRecordInTable($table){
         $stmt = $this->db->prepare("SELECT COUNT(*) as \"TableRows\" FROM ".$table);
         return $this->factoryFetchMethos($stmt)[0]["TableRows"];
    }

    public function getAccountRecordNumber(){
         return $this->getRecordInTable("ticketuser");
    }

    public function getLocationRecordNumber(){
         return $this->getRecordInTable("location");
    }

    public function getAllUsersInfo(){
         $stmt = $this->db->prepare("SELECT P.Nome, P.Cognome, T.Email, DATE_FORMAT(T.DataRegistrazione, '%d/%m/%Y ') as 'DataRegistrazione', A.Descrizione, IF(T.AccountAbilitato, 'TRUE', 'FALSE') 'AccountAbilitato' FROM ticketuser T INNER JOIN persona P ON T.AnagraficaUtente=P.IDPersona INNER JOIN tipologiaaccesso A ON A.IDAccesso=T.IDAccesso");
         return $this->factoryFetchMethos($stmt);
    }

    public function nameExistInDB($name, $surname){
         $stmt = $this->db->prepare("SELECT COUNT(*) as rowNum FROM persona P WHERE P.Nome=? AND P.Cognome=?");
         $stmt->bind_param('ss', $name, $surname);
         return !$this->factoryFetchMethos($stmt)[0]["rowNum"];
    }

    private function insertNewPerson($name, $surname, $cf, $birth){
        $stmt = $this->db->prepare("INSERT INTO persona (IDPersona, Nome, Cognome, CF, DataNascita) VALUES (IDPersona, ?, ?, ?, ?)");
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
          return $this->factoryFetchMethos($stmt);
     }

     public function getEventByManager($Manager){
          $stmt = $this->db->prepare("SELECT E.* FROM evento E WHERE E.IDOrganizzatore=?");
          $stmt->bind_param('i', $Manager);
          return $this->factoryFetchMethos($stmt);
     }

     public function getEventType(){
          $stmt = $this->db->prepare("SELECT * FROM tipologia");
          return $this->factoryFetchMethos($stmt);
     }

     public function getTipologiaInfo($IDTipologia){
         $query = "SELECT COUNT(*) as 'EventNum', T.Nome FROM tipologia T INNER JOIN genere G ON G.IDTipologia=T.IDTipologia
                                                         INNER JOIN evento E ON E.IDGenere=G.IDGenere
                   WHERE T.IDTipologia = ?";

         $stmt = $this->db->prepare($query);
         $stmt->bind_param('i', $IDTipologia);
         return $this->factoryFetchMethos($stmt)[0];
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
         return $this->factoryFetchMethos($stmt);
     }

     public function getAllLocation() {
          $stmt = $this->db->prepare("SELECT IDLocation, Nome FROM location");
          return $this->factoryFetchMethos($stmt);
     }

     public function getSectorByLocationID($idLocation) {
          $stmt = $this->db->prepare("SELECT IDSettore, Nome, Capienza FROM settore WHERE IDLocation = ?");
          $stmt->bind_param('i', $idLocation);
          return $this->factoryFetchMethos($stmt);
     }

     public function getKindOfMusicByType($IDMusicKind){
         $stmt = $this->db->prepare("SELECT G.IDGenere, G.Name FROM tipologia T INNER JOIN genere G ON T.IDTipologia=G.IDTipologia
                                     WHERE T.IDTipologia = ?");
         $stmt->bind_param('i', $IDMusicKind);
         return $this->factoryFetchMethos($stmt);
     }

     public function getKindOfMusicInfo($IDKind){
         $stmt = $this->db->prepare("SELECT T.IDTipologia, G.Name FROM genere G INNER JOIN tipologia T ON G.IDTipologia=T.IDTipologia WHERE G.IDGenere = ?");
         $stmt->bind_param('i', $IDKind);
         return $this->factoryFetchMethos($stmt)[0];
     }

     public function getArtistInfo($IDArtista){
         $stmt = $this->db->prepare("SELECT P.*, A.*
                                     FROM artista A INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                                     WHERE A.IDArtista = ?");
         $stmt->bind_param('i', $IDArtista);
         return $this->factoryFetchMethos($stmt);
     }

    public function getResImageName($IDGenere, $IDArtista, $eventID){
        $IDTipologia = $this->getKindOfMusicInfo($IDGenere);
        $name = "";
        if($IDTipologia["IDTipologia"] != 2){
            $name = getCorrectArtistName($this->getArtistInfo($IDArtista)[0]);
        } else
            $name = $eventID."-".$IDTipologia["Name"];

        return clearNameForPathValue($name);
    }

    public function checkExistEvent($IDLocation, $startEvent, $endEvent){
        $query = "SELECT COUNT(E.IDEvento) AS 'count' FROM evento E
                  WHERE E.IDLocation=? AND (? BETWEEN E.DataInizio AND E.DataFine || ? BETWEEN E.DataInizio AND E.DataFine)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iss', $IDLocation, $startEvent, $endEvent);
        return $this->factoryFetchMethos($stmt)[0]["count"];
    }

    public function insertEvent($eventTitle, $IDArtista, $IDLocation, $IDGenere, $eventDescription, $startEvent, $endEvent, $publicedDateEvent){
         $recommendation = rand(35, 50) / 10;
         $query = "INSERT INTO evento(IDEvento, Titolo, IDOrganizzatore, IDArtista, IDLocation, IDGenere, Info, DataInizio, DataFine, DataPubblicazione, Recommendation)
                   VALUES (IDEvento, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $this->db->prepare($query);
         $stmt->bind_param('siiiissssd', $eventTitle, $_SESSION["accountLog"]["IDUser"], $IDArtista, $IDLocation, $IDGenere, $eventDescription, $startEvent, $endEvent, $publicedDateEvent, $recommendation);
         $stmt->execute();
         return $stmt->insert_id;
    }

    public function deleteEvent($IDEvent){
        $stmt = $this->db->prepare("DELETE FROM evento WHERE IDEvento = ?");
        $stmt->bind_param('i', $IDEvent);
        return $stmt->execute();
    }

    public function upgradeEventImage($eventID, $locandinaName){
        $query = "UPDATE evento SET Locandina = ? WHERE evento.IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $locandinaName, $eventID);
        return $stmt->execute();
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
         return $this->factoryFetchMethos($stmt)[0]["rowNum"] > 0;
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
      return $this->factoryFetchMethos($stmt);
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
      return $this->factoryFetchMethos($stmt);
  }

  public function filterLocationByValue($value){
      $stmt = $this->db->prepare("SELECT L.IDLocation, L.Nome, COUNT(E.IDEvento) AS 'eventNum'
                                  FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
                                  WHERE L.Nome LIKE "."'%".$value."%' OR L.Nome LIKE "."'%".ucfirst($value)."%' ".
                                  "GROUP BY L.IDLocation ORDER BY L.Nome LIMIT 5");
     return $this->factoryFetchMethos($stmt);
  }

  public function filterArtistByValue($value){
     $stmt = $this->db->prepare("SELECT A.NomeDArte, A.IDArtista, COUNT(E.IDEvento) AS 'eventNum', P.Nome, P.Cognome
                                FROM artista A LEFT JOIN evento E ON A.IDArtista=E.IDArtista
                                               INNER JOIN persona P ON A.AnagraficaArtista=P.IDPersona
                                WHERE A.NomeDArte LIKE "."'%".$value."%' OR A.NomeDArte LIKE "."'%".ucfirst($value)."%' ".
                                "OR P.Nome LIKE '%".$value."%' OR P.Nome LIKE "."'%".ucfirst($value)."%' ".
                                "OR P.Cognome LIKE '%".$value."%' OR P.Cognome LIKE "."'%".ucfirst($value)."%' ".
                                "GROUP BY A.IDArtista ORDER BY A.AnagraficaArtista LIMIT 5");
      return $this->factoryFetchMethos($stmt);
  }

  public function getLocationWithEvent(){
      $query = "SELECT L.IDLocation, L.Nome, L.Immagine, COUNT(E.IDEvento) AS 'EventNum'
                FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
                WHERE E.DataInizio >= CURDATE()
                GROUP BY L.IDLocation ORDER BY EventNum DESC";
      $stmt = $this->db->prepare($query);
      return $this->factoryFetchMethos($stmt);
  }

  public function getLocationWithEventRateInfo($IDLocation){
      $query = "SELECT ROUND(AVG(E.Recommendation), 1) as 'Recommendation', MIN(T.Prezzounitario) AS 'Prezzounitario'
                FROM evento E INNER JOIN tariffario T ON T.IDEvento=E.IDEvento
                WHERE E.IDLocation = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDLocation);
      return $this->factoryFetchMethos($stmt)[0];
  }

  public function getAllLocationInfo(){
       $stmt = $this->db->prepare("SELECT L.Nome, L.Indirizzo, COUNT(E.IDEvento) AS \"NrEventi\", COUNT(B.Matricola) AS \"NrBiglietti\"
                                   FROM location L LEFT JOIN evento E ON L.IDLocation=E.IDLocation
				                                   LEFT JOIN biglietto B ON B.IDLocation=E.IDLocation
                                   GROUP BY L.IDLocation");
       return $this->factoryFetchMethos($stmt);
  }

  public function getEventNumByManager($ManagerID){
      $stmt = $this->db->prepare("SELECT COUNT(*) as 'TableRows' FROM evento E WHERE E.IDOrganizzatore = ?");
      $stmt->bind_param('i', $ManagerID);
      return $this->factoryFetchMethos($stmt)[0]["TableRows"];
  }

  public function getArtistNumByManager($ManagerID){
      $stmt = $this->db->prepare("SELECT COUNT(*) as 'TableRows' FROM artista A WHERE A.IDReferente = ?");
      $stmt->bind_param('i', $ManagerID);
      return $this->factoryFetchMethos($stmt)[0]["TableRows"];
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
      return $this->factoryFetchMethos($stmt);
  }

  public function getLocationInfo($idLocation){
      $stmt = $this->db->prepare("SELECT * FROM location L WHERE L.IDLocation = ?");
      $stmt->bind_param('i', $idLocation);
      return $this->factoryFetchMethos($stmt)[0];
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
      return $this->factoryFetchMethos($stmt);
  }

  public function getLocandinaByArtist($IDArtist){
      $stmt = $this->db->prepare("SELECT DISTINCT E.Locandina
                                  FROM evento E INNER JOIN artista A ON A.IDArtista=E.IDArtista
                                  WHERE E.IDArtista = ?
                                  ORDER BY E.DataInizio DESC");
      $stmt->bind_param('i', $IDArtist);
      return $this->factoryFetchMethos($stmt);
  }

  public function exisitEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT E.* FROM evento E WHERE E.IDEvento = ? AND E.DataFine > CURDATE()");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getEventInfo($IDEvent){
      $stmt = $this->db->prepare("SELECT E.IDEvento, E.Titolo, E.IDArtista, E.Locandina, E.IDLocation, E.IDGenere, E.Info, E.DataInizio, L.Nome, L.Indirizzo
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
                                  WHERE E.IDEvento = ? AND E.DataFine > CURDATE()");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getSectorInfoByEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT T.*, S.Nome
                                  FROM evento E INNER JOIN tariffario T ON E.IDEvento=T.IDEvento
	                                            INNER JOIN settore S ON T.IDSettore=S.IDSettore
                                  WHERE E.IDEvento = ? AND E.DataFine > CURDATE() ORDER BY Prezzounitario DESC");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getEventTicketSold($IDEvent){
      $stmt = $this->db->prepare("SELECT COUNT(B.Matricola) AS 'TicketSold' FROM biglietto B WHERE B.IDEvento=? GROUP BY B.IDEvento");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt)[0]["TicketSold"];
  }

  public function getEventTotalTicket($IDEvent){
      $stmt = $this->db->prepare("SELECT SUM(T.Disponibilita) AS 'TotalTicket' FROM tariffario T WHERE T.IDEvento=? GROUP BY T.IDEvento");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt)[0]["TotalTicket"];
  }

  public function getSectoTicketSold($IDEvent, $IDSettore){
      $stmt = $this->db->prepare("SELECT COUNT(B.Matricola) AS 'count'
                                  FROM biglietto B INNER JOIN settore S ON B.IDSettore=S.IDSettore
                                  WHERE B.IDEvento = ? AND S.IDSettore = ?");
      $stmt->bind_param('ii', $IDEvent, $IDSettore);
      return $this->factoryFetchMethos($stmt)[0]["count"];
  }

  public function getSectoTotalTicket($IDEvent, $IDSettore){
      $stmt = $this->db->prepare("SELECT T.Disponibilita FROM tariffario T WHERE T.IDEvento=? AND T.IDSettore=?");
      $stmt->bind_param('ii', $IDEvent, $IDSettore);
      return $this->factoryFetchMethos($stmt)[0]["Disponibilita"];
  }

  public function getGeneralInfoByIDEvent($IDEvent){
      $stmt = $this->db->prepare("SELECT E.IDEvento, E.Titolo, E.Locandina, E.DataInizio, L.Nome, T.Email, E.IDArtista, L.IDLocation
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
		                                        INNER JOIN ticketuser T ON E.IDOrganizzatore=T.IDUser
                                  WHERE E.IDEvento = ?");
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getRateEvent($IDEvent, $IDSector){
      $stmt = $this->db->prepare("SELECT S.*, T.Disponibilita, T.Prezzounitario
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                               INNER JOIN settore S ON L.IDLocation=S.IDLocation
                                           INNER JOIN tariffario T ON S.IDLocation=T.IDLocation AND S.IDSettore=T.IDSettore AND E.IDEvento=T.IDEvento
                                  WHERE T.IDSettore = ? AND E.IDEvento = ?");
      $stmt->bind_param('ii', $IDSector, $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getActualTicketSell($IDEvent, $IDSector){
      $stmt = $this->db->prepare("SELECT COUNT(B.Matricola) AS 'NumTicket'
                                  FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                               INNER JOIN settore S ON L.IDLocation=S.IDLocation
                                           INNER JOIN biglietto B ON B.IDSettore=S.IDSettore AND B.IDLocation=s.IDLocation AND B.IDEvento=E.IDEvento
                                 WHERE S.IDSettore = ? AND E.IDEvento = ?");
      $stmt->bind_param('ii', $IDSector, $IDEvent);
      return $this->factoryFetchMethos($stmt)[0]["NumTicket"];
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
      return $this->factoryFetchMethos($stmt);
  }

  public function getDeliveryMode(){
      $stmt = $this->db->prepare("SELECT * FROM modalitaconsegna");
      return $this->factoryFetchMethos($stmt);
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
      return $this->factoryFetchMethos($stmt);
  }

  public function insertAcquisto($IDPayment, $IDDelivery, $IDUser, $PrezzoTotale, $Data = null){
      if(!isset($Data))
        $Data = date("Y-m-d H:i:s");
      $query = "INSERT INTO acquisto(IDAcquisto, IDPayment, IDDelivery, IDUser, Data, PrezzoTotale) VALUES (IDAcquisto, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('iiisd', $IDPayment, $IDDelivery, $IDUser, $Data, $PrezzoTotale);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function insertTicket($Matricola, $IDSettore, $IDLocation, $IDEvento){
      $query = "INSERT INTO biglietto(Matricola, IDSettore, IDLocation, IDEvento) VALUES (?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('siii', $Matricola, $IDSettore, $IDLocation, $IDEvento);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function insertAcquistoMultiplo($Matricola, $IDAcquisto){
      $query = "INSERT INTO bigliettoacquistato(Matricola, IDAcquisto) VALUES (?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('si', $Matricola, $IDAcquisto);
      return $stmt->execute();
  }

  public function insertRecensione($Matricola, $IDAcquisto, $Recensione, $Recommendation){
      $query = "INSERT INTO recensione(IDRecensione, Matricola, IDAcquisto, Recensione, Recommendation) VALUES (IDRecensione, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('sisd', $Matricola, $IDAcquisto, $Recensione, $Recommendation);
      $stmt->execute();
      return $stmt->insert_id;
  }

  public function updateSegreteria($ID, $updateAll=false){
      $query = "UPDATE segreteriamessaggi SET Lettura = 1 WHERE segreteriamessaggi.".(($updateAll) ? "IDUser = ?" : "IDMessaggio = ?");

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $ID);
      return $stmt->execute();
  }

  public function getMessageByIDUser($IDUser, $toRead = false){
      $query = "SELECT * FROM segreteriamessaggi S WHERE S.IDUser = ?";
      if ($toRead)
          $query = $query." AND S.Lettura=0";

      $query = $query." ORDER BY S.DataMessaggio DESC";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  public function getArtistWorkInfo($IDManager){
      $query = "SELECT P.Nome, P.Cognome, A.NomeDArte, P.DataNascita, COUNT(E.IDEvento) AS 'EventNum', COUNT(B.Matricola) AS 'TicketBuy'
                FROM artista A LEFT JOIN evento E ON E.IDArtista=A.IDArtista
			                   INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                               LEFT JOIN biglietto B ON B.IDEvento=E.IDEvento
                WHERE A.IDReferente=?
                GROUP BY A.IDArtista ORDER BY EventNum DESC";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDManager);
      return $this->factoryFetchMethos($stmt);
  }

  public function getEventInfoReserved($IDManager){
      $query = "SELECT E.IDEvento, E.Titolo, P.Nome, P.Cognome, A.IDArtista, A.NomeDArte, L.Nome AS 'NomeLocation', E.DataInizio, COUNT(B.Matricola) AS 'TicketBuy'
                FROM evento E INNER JOIN location L ON L.IDLocation=E.IDLocation
			                  INNER JOIN artista A ON A.IDArtista=E.IDArtista
                              INNER JOIN persona P ON P.IDPersona=A.AnagraficaArtista
                              LEFT JOIN biglietto B ON E.IDEvento=B.IDEvento
                WHERE A.IDReferente=?
                GROUP BY E.IDEvento ORDER BY TicketBuy DESC";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDManager);
      return $this->factoryFetchMethos($stmt);
  }

  public function getNumTicketSold($IDManager = null){
      $query = "SELECT COUNT(B.Matricola) AS 'TicketBuy' FROM biglietto B";

      if(isset($IDManager))
        $query = $query." INNER JOIN evento E ON E.IDEvento=B.IDEvento WHERE E.IDOrganizzatore=".$IDManager;

      $stmt = $this->db->prepare($query);
      return $this->factoryFetchMethos($stmt)[0]["TicketBuy"];
  }

  public function getCahsTicketSold($IDManager = null){
      $query = "";
      if (isset($IDManager)) {
          $query = "SELECT SUM(T.Prezzounitario) AS 'CashDone'
                    FROM biglietto B INNER JOIN settore S ON S.IDSettore=B.IDSettore
				                     INNER JOIN tariffario T ON S.IDSettore=T.IDSettore AND T.IDEvento=B.IDEvento
                                     INNER JOIN evento E ON B.IDEvento=E.IDEvento
                    WHERE E.IDOrganizzatore=".$IDManager;
      } else
          $query = "SELECT SUM(A.PrezzoTotale) AS 'CashDone' FROM acquisto A";

      $stmt = $this->db->prepare($query);
      $row = $this->factoryFetchMethos($stmt)[0];

      if (isset($row["CashDone"]))
          return $row["CashDone"];
      else
          return "0,00";
  }

  private function joinStringFactory(){
      return " FROM acquisto A INNER JOIN bigliettoacquistato BA ON A.IDAcquisto=BA.IDAcquisto
                      INNER JOIN biglietto B ON BA.Matricola=B.Matricola
                      INNER JOIN evento E ON B.IDEvento=E.IDEvento
                      INNER JOIN artista AR ON AR.IDArtista=E.IDArtista
                      INNER JOIN persona P ON P.IDPersona=AR.AnagraficaArtista
                      INNER JOIN location L ON L.IDLocation=E.IDLocation
                      WHERE A.IDUser=? ";
  }

  public function getInfoTicketBuy($IDUser){
      $query = "SELECT COUNT(B.Matricola) AS 'NumTicket', P.Nome, P.Cognome, AR.NomeDArte, L.Nome AS 'NomeLocation', E.DataInizio, E.IDEvento".
                $this->joinStringFactory()." GROUP BY E.IDEvento";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  public function getNumTicketSoldByUser($IDUser){
    $numTicket = 0;

    foreach($this->getInfoTicketBuy($IDUser) as $key => $value)
        $numTicket += $value["NumTicket"];

    return $numTicket;
  }

  public function getFavouriteArtistByIDUser($IDUser){
      $query = "SELECT COUNT(B.Matricola) AS 'NumTicket', P.Nome, P.Cognome, AR.NomeDArte".
                $this->joinStringFactory()." GROUP BY E.IDArtista ORDER BY NumTicket DESC";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  public function nextLocationVisited($IDUser){
      $query = "SELECT COUNT(B.Matricola) AS 'NumTicket', P.Nome, P.Cognome, AR.NomeDArte, L.Nome AS 'NomeLocation', E.DataInizio, E.IDEvento".
                $this->joinStringFactory()." AND CURDATE() < E.DataInizio GROUP BY E.IDEvento ORDER BY E.DataInizio";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  private function joinReviewFactory(){
      return " FROM bigliettoacquistato BA INNER JOIN acquisto A ON BA.IDAcquisto=A.IDAcquisto
                                  INNER JOIN biglietto B ON B.Matricola=BA.Matricola
                                  INNER JOIN evento E ON E.IDEvento=B.IDEvento
                                  INNER JOIN location L ON L.IDLocation=E.IDLocation
                                  INNER JOIN artista AR ON AR.IDArtista=E.IDArtista
                                  INNER JOIN persona P ON P.IDPersona=AR.AnagraficaArtista ";
  }

  public function getEventEnableReview($IDUser){
      $query = "SELECT BA.*, L.Nome AS 'NomeLocation', P.Nome, P.Cognome, AR.NomeDArte".$this->joinReviewFactory().
                "WHERE A.IDUser=? GROUP BY B.IDEvento";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  public function getReviewDoneByIDUser($IDUser){
      $query = "SELECT R.Recensione, L.Nome AS 'NomeLocation', E.DataInizio, P.Nome, P.Cognome, AR.NomeDArte, E.IDEvento".$this->joinReviewFactory().
                "INNER JOIN recensione R ON R.Matricola=BA.Matricola AND R.IDAcquisto=BA.IDAcquisto
                WHERE A.IDUser=? GROUP BY B.IDEvento";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDUser);
      return $this->factoryFetchMethos($stmt);
  }

  public function getReviewDoneByIDArtista($IDArtista){
      $query = "SELECT R.Recensione, L.Nome AS 'NomeLocation', E.DataInizio, P.Nome, P.Cognome, AR.NomeDArte, E.IDEvento, R.Recommendation".$this->joinReviewFactory().
                "INNER JOIN recensione R ON R.Matricola=BA.Matricola AND R.IDAcquisto=BA.IDAcquisto
                WHERE E.IDArtista=?";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDArtista);
      return $this->factoryFetchMethos($stmt);
  }

  public function getReviewReceiptsByIDManager($IDManager){
      $query = "SELECT R.Recensione, L.Nome AS 'NomeLocation', E.DataInizio, P.Nome, P.Cognome, AR.NomeDArte, E.IDEvento, R.Recommendation, E.Locandina".$this->joinReviewFactory().
                "INNER JOIN recensione R ON R.Matricola=BA.Matricola AND R.IDAcquisto=BA.IDAcquisto
                WHERE E.IDOrganizzatore=? ORDER BY E.DataInizio DESC";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDManager);
      return $this->factoryFetchMethos($stmt);
  }

  public function eventInfoByIDArtist($IDArtista){
      $query = "SELECT L.Nome AS 'LocationName', E.Titolo, E.DataInizio, E.DataFine, E.DataPubblicazione, E.IDEvento, SUM(T.Disponibilita) AS 'TotTicket', COUNT(B.Matricola) AS 'TicketBuy'
                FROM evento E INNER JOIN location L ON E.IDLocation=L.IDLocation
			                  INNER JOIN tariffario T ON T.IDEvento=E.IDEvento
                              LEFT JOIN biglietto B ON B.IDEvento=E.IDEvento AND T.IDSettore=B.IDSettore
              WHERE E.DataInizio >= CURDATE() && E.IDArtista = ?
              GROUP BY E.IDEvento ORDER BY E.DataInizio";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDArtista);
      return $this->factoryFetchMethos($stmt);
  }

  public function insertNewMessageInSecretary($IDUser, $Message){
      $query = "INSERT INTO segreteriamessaggi(IDMessaggio, IDUser, Contenuto, DataMessaggio) VALUES (IDMessaggio, ?, ?, NOW())";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('is', $IDUser, $Message);
      return $stmt->execute();
  }

  public function getAllParticipantsByEvent($IDEvent){
      $query = "SELECT DISTINCT T.*
                FROM biglietto B INNER JOIN bigliettoacquistato BA ON BA.Matricola=B.Matricola
				                 INNER JOIN acquisto A ON BA.IDAcquisto=A.IDAcquisto INNER JOIN ticketuser T ON T.IDUser=A.IDUser
                WHERE B.IDEvento = ?";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDEvent);
      return $this->factoryFetchMethos($stmt);
  }

  public function getMonthlyRevenue(){
      $query = "SELECT YEAR(A.Data) AS 'acquistoYear', MONTH(A.Data) AS 'acquistoMonth', SUM(A.PrezzoTotale) AS 'TotalRevenue'
                FROM  acquisto A
                GROUP BY acquistoYear, acquistoMonth ORDER BY acquistoYear DESC, acquistoMonth DESC LIMIT 12";

      $stmt = $this->db->prepare($query);
      return $this->factoryFetchMethos($stmt);
  }

  public function getMonthlyEvent($IDManager){
      $query = "SELECT YEAR(E.DataInizio) AS 'eventoYear', MONTH(E.DataInizio) AS 'eventoMonth', COUNT(E.IDEvento) AS 'EventNum'
                FROM evento E
                WHERE E.IDOrganizzatore = ? AND E.DataFine >= NOW() GROUP BY eventoYear, eventoMonth ORDER BY eventoYear DESC, eventoMonth DESC LIMIT 12";

      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $IDManager);
      return $this->factoryFetchMethos($stmt);
  }

  public function getMajorManager(){
      $query = "SELECT COUNT(E.IDEvento) AS 'EventNum', T.*, P.*
                FROM ticketuser T LEFT JOIN evento E ON E.IDOrganizzatore=T.IDUser
                                  INNER JOIN persona P ON P.IDPersona=T.AnagraficaUtente
                WHERE T.IDAccesso=2 GROUP BY T.IDUser ORDER BY EventNum DESC LIMIT 3";

      $stmt = $this->db->prepare($query);
      return $this->factoryFetchMethos($stmt);
  }

  public function getMajorArtistByIDManager($IDManager){
      return $this->getArtistWorkInfo($IDManager);
  }
}
?>
