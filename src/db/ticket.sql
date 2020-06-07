-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 07, 2020 alle 15:53
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisto`
--

CREATE TABLE `acquisto` (
  `IDAcquisto` int(11) NOT NULL,
  `IDPayment` int(11) NOT NULL,
  `IDDelivery` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `PrezzoTotale` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `acquisto`
--

INSERT INTO `acquisto` (`IDAcquisto`, `IDPayment`, `IDDelivery`, `IDUser`, `Data`, `PrezzoTotale`) VALUES
(1, 2, 2, 3, '2020-05-04 12:12:12', 541.30),
(2, 3, 2, 2, '2020-04-04 14:24:54', 246.25),
(3, 2, 2, 3, '2020-05-04 21:03:21', 407.11),
(6, 3, 3, 10, '2020-05-17 16:59:41', 554.35),
(7, 1, 3, 3, '2020-05-17 18:40:11', 61.85),
(8, 1, 2, 11, '2020-06-07 15:49:48', 354.40);

-- --------------------------------------------------------

--
-- Struttura della tabella `artista`
--

CREATE TABLE `artista` (
  `IDArtista` int(11) NOT NULL,
  `AnagraficaArtista` int(11) NOT NULL,
  `NomeDArte` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `IDReferente` int(11) NOT NULL,
  `Biografia` varchar(3000) COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `artista`
--

INSERT INTO `artista` (`IDArtista`, `AnagraficaArtista`, `NomeDArte`, `IDReferente`, `Biografia`) VALUES
(1, 2, 'Salmo', 2, 'Nel 2011 produce il suo primo disco da solista, \"The Island Chainshaw Massacre\" e l\'anno successivo pubblica \"Death USB\", da subito primo in classifica su iTunes. Nel 2013 esce \"Midnite\" (disco di platino) che raggiunge il primo posto tra gli album più venduti in Italia. \r\nNel 2014 Salmo annuncia l\'uscita dall\'etichetta Tanta Roba per iniziare il suo nuovo progetto discografico in Machete Empire, e fonda la \"Lebonski Agency\", società di booking e management. Nel dicembre 2015 esce \"1984\" (doppio platino), che anticipa l\'album \"Hellvisback\" (febbraio 2016), certificato doppio platino, che ha debuttato al #1 della classifica di iTunes e della FIMI restandoci inchiodato per due settimane.\r\n\r\nVenerdì 21 settembre 2018 esce “90MIN”, il nuovo singolo certificato quadruplo disco di platino, che anticipa il nuovo album “PLAYLIST” (9 novembre 2018). Dopo aver infranto tutti i record su Spotify, aver dominato le classifiche FIMI-GfK e superato oltre 435,8 milioni di views su YouTube, SALMO è anche il primo artista italiano a lanciare in esclusiva su Netflix un video musicale e ad avere un canale dedicato su “Pornhub” dove, con un’operazione di marketing fuori dagli schemi, ha lanciato il nuovo album.\r\n\r\n“PLAYLIST”, già certificato quadruplo disco di platino, ha registrato su Spotify (Italia) il maggior numero di stream in 24h (9.956.884) nel giorno dell’uscita e il maggior numero di stream in una settimana (43.882.595). Inoltre, è la prima volta che un artista italiano si colloca nella Global Chart di Spotify con 8 brani. Nelle classifiche FIMI-Gfk “Playlist” è entrato direttamente al 1° posto degli album più venduti e ha conquistato totalmente il podio dei singoli più venduti. Tutti i 13 brani dell’album sono stati nelle prime 16 posizioni della classifica.'),
(2, 3, 'Marco Mengoni', 2, 'Dopo alcune esperienze nell\'ambito musicale come membro di un quintetto vocale, a 16 anni decide di intraprendere la carriera solista. E\' salito alla ribalta nel 2009, vincendo la terza edizione del talent show X Factor e firmando quindi un contratto discografico con la Sony Music. Nel corso della sua carriera ha partecipato due volte al Festival di Sanremo: nel 2010 con il brano Credimi ancora, giungendo terzo, e nel 2013, vincendo con il brano L\'essenziale. Con quest\'ultimo è stato scelto per rappresentare l\'Italia all\'Eurovision Song Contest 2013, classificandosi alla settima posizione. Sempre nel 2013 ha rappresentato l\'Italia anche all\'annuale MTV Europe Music Awards, vincendo il titolo di Best Italian Act e successivamente quello di Best South Europe Act.\r\n\r\nNel corso della sua carriera ha inoltre ottenuto numerosi riconoscimenti, tra cui dieci Wind Music Awards, tre MTV Europe Music Awards come Best Italian Act e Best European Act, oltre a nove candidature ai World Music Awards.\r\n\r\n\r\n'),
(3, 4, 'Gue Pequeno', 2, 'Oltre alla discografia dei Dogo, nel 2005 ha pubblicato insieme al producer italo-angolano Deleterio Hashishinz Sound vol. 1. Nel 2006 è arrivata la collaborazione con DJ Harsh per Fast Life Mixtape, che mostra il lato più ruvido di Guè e consacra il suo flow verso uno stile diverso, con il tono più «basso e scassato» secondo la sua stessa definizione[senza fonte]. Nel 2009 è uscito Fastlife Mixtape vol.2, la seconda parte del mixtape. Nel corso degli anni ha collaborato con molti artisti della scena underground e non, tra cui Truceklan, J-Ax e Marracash. Nel 2010 ha pubblicato il libro La legge del cane, scritto a quattro mani con il compagno Jake La Furia. Nel marzo del 2011 va in onda su Radio Deejay con il programma \"Un giorno da cani\", format televisivo in 4 puntate, dove Guè Pequeno e il compagno Jake La Furia provano esperienze lavorative tramutandole in testi per le loro canzoni rap, con Don Joe alla base. In giugno esce il suo primo album solista, intitolato Il ragazzo d\'oro, che vede featuring con diversi rapper italiani. I singoli estratti dall\'album sono \"Giù il soffitto\", \"Non lo spegnere Reloaded\", \"Il Ragazzo d\'Oro\", \"Pillole\" e \"La G, la U, la E\".'),
(4, 5, 'Carl Brave', 2, 'Nel 2017 ha pubblicato \"Polaroid\" in coppia con Franco126. Un disco emerso rapidamente e con forza dal tam tam del web per poi entrare stabilmente non solo nelle classifiche di vendita, ma anche e soprattutto nell\'immaginario collettivo contemporaneo. Un nuovo sound fresco e coinvolgente scaturito dall\'abile produzione di Brave che ha composto tutte le basi presenti nel disco. \"Polaroid\" ha conquistato tutta la penisola grazie anche alle decine di concerti sold-out messi a segno tra maggio 2017 e settembre 2018.\r\n\r\nLa prolifica capacità compositiva di Carl Brave è sfociata nell\'esordio solista \"Notti Brave\". L\'album, uscito a maggio 2018, è entrato diretto al primo posto in classifica, restandoci per due settimane. Notti Brave è senza dubbio un disco che ha colpito nel segno, trainato dal singolo \"Fotografia\" interpretato assieme a Fabri Fibra e Francesca Michielin. La produzione di Brave si sposa perfettamente con i due ospiti che colorano ulteriormente il pezzo con il loro stile inconfondibile. \"Fotografia\" con la sua immediata freschezza e sincerità è stato tra i più trasmessi dalle radio. Molti altri sono stati gli artisti che hanno animato le \"Notti Brave\" di Carl. Le quindici tracce dell\'album vedono infatti altre collaborazioni eccellenti come Coez, Franco126, Emis Killa, Federica Abbate, Gemitaiz, Giorgio Poi, Pretty Solero, Frah Quintale, B e Ugo Borghetti.\r\n\r\nUn caleidoscopio di generi e sfumature che, dal pop, all\'indie, al rap fa il paio con l\'instancabile verve di Carl Brave. Una continua ricerca di dettagli sonori che si riflette nei testi sempre densi di atmosfere e pratiche quotidiane in cui riconoscersi.'),
(5, 6, 'Raffaele Gualazzi', 2, 'Raphael Gualazzi presenta al Festival di Sanremo 2011 Follia d\'amore scritto, prodotto e arrangiato dallo stesso Gualazzi. Contestualmente al Festival, il 16 febbraio, esce il suo nuovo album Reality and Fantasy, contenente il brano sanremese. Il 18 febbraio 2011, Gualazzi viene dichiarato vincitore della categoria Giovani, e viene anche scelto come rappresentante dell\'Italia (che era assente dal 1997) all\'Eurovision Song Contest 2011.\r\nL\'evento, che si è tenuto il 10, 12 e 14 maggio 2011 a Düsseldorf, in Germania, vede Gualazzi partecipare con una versione in lingua inglese di Follia d\'amore, intitolata Madness of Love; il brano gli vale il 2° posto in classifica nella manifestazione e la vittoria del Premio della giuria tecnica della stessa manifestazione, alle spalle solamente dei vincitori dell\'Azerbaigian.\r\nIl 2 maggio 2011, insieme a Gianni Morandi e Roberto Vecchioni, prende parte come ospite al programma televisivo musicale Due.'),
(6, 7, 'Tiziano Ferro', 2, 'Tiziano Ferro è nato a Latina il 21 febbraio 1980. Dal 2005 vive a Londra. Superato brillantemente l\'esame di maturità scientifica, frequenta due diverse facoltà universitarie: un anno di ingegneria e un altro di scienze della comunicazione, entrambi a Roma. Molto più costanti e proficui si rivelano gli studi musicali: 7 anni di chitarra classica , 1 anno di batteria e 2 anni di pianoforte. Nel 1996, all\'età di 16 anni, entra nel coro gospel di Latina, che gli consente di affinare il proprio talento appassionandosi agli stilemi della musica nera Nel biennio \'96 - \'97 frequenta anche un corso di doppiaggio cinematografico e lavora come speaker in alcune radio locali della sua città. Nei due anni successivi si iscrive all\'Accademia della Canzone di Sanremo: nel 1997 non supera lo scoglio della prima settimana; invece nel 1998 è fra i dodici finalisti. L\'esibizione sanremese di Tiziano suscita l\'attenzione dei produttori Alberto Salerno e Mara Majonchi, che gli propongono di lavorare insieme: sulle composizioni di Ferro si alternano vari arrangiatori, finché Michele Canova riesce a tradurre le idee del giovane di Latina nel sound desiderato. Mentre le canzoni iniziano a prendere forma, nel 1999 partecipa come corista al tour dei Sottotono. Nel 2001 firma il contratto con la casa discografica EMI e nel luglio dello stesso anno pubblica il suo primo singolo: s\'intitola \"Xdono\" e scala vertiginosamente le classifiche fino a conquistare la prima posizione in Italia sia nelle vendite che nell\'airplay radiofonico. Ecco, in breve, le tappe della sua carriera.'),
(7, 8, 'Marracash', 2, 'Il nome d\'arte \"Marracash\" viene addottato dall\'artista perchè da piccolo, essendo di origini siciliane e avendo quindi il viso ben marcato, gli altri bambini lo chiamavano \"Marocchino\" o \"Marrakech\".\r\nA dieci anni la sua famiglia viene sfrattata dalla casa di via Bramante, a Milano, e si trasferisce nel quartiere periferico della Barona, dove cresce e dove vive tutt\'oggi. Queste vicende segnano molto l\'artista e ricorrono spesso nel sue canzoni ad inizio carriera e nel disco Marracash.\r\nMarracash, in un\'intervista televisiva su All Music del 7 luglio 2008, ha affermato che da bambino i suoi cantanti preferiti erano gli 883.\r\nApproda alla musica nel 2003, debuttando nel mixtape PMC versus Club Dogo. Nello stesso anno prende anche forma il progetto Dogo Gang.\r\nNel 2005 autoproduce assieme a Del (produttore della Dogo Gang) Roccia Music[1], una \"compilation di strada\", in cui collaborano gli altri membri della Gang e altri nomi noti della scena hip hop italiana. Roccia Music raggiunge le 2000 copie vendute pur non avendo una vera distribuzione. Poco tempo dopo Marracash firma un contratto con la Universal Music, per cui pubblica nel 2008 l\'album Marracash, che raggiunge il disco d\'oro.'),
(8, 15, 'Max Pezzali', 2, 'Max Pezzali fonda gli 883 nel 1992 con Mauro Repetto, con cui debutta al Festival di Castrocaro presentando il singolo \"Non me la menare\". Nello stesso anno, i due pubblicano il loro primo album â€œHanno ucciso l\'uomo ragnoâ€ e raggiungono la prima posizione della hit parade con oltre 600.000 copie vendute, oltre ad essere premiati come rivelazione dell\'anno a \"Vota la Voce\", il famosissimo referendum popolare di \"Tv Sorrisi e Canzoni\".\r\n\r\nL\'anno successivo esce \"Sei un mito\", singolo che anticipa \"Nord Sud Ovest Est\", album da oltre 1.300.000 copie. Il 1993 è anche l\'anno che vede il trionfo del duo al Festivalbar, prima che Mauro Repetto lasci l\'Italia e anche gli 883. Così, due anni dopo, Max Pezzali partecipa al Festival di Sanremo presentando Senza averti qui\" (1995), brano con cui vince il celebre concorso canoro italiano, anteprima del nuovo album \"La donna, il sogno & il grande incubo\"; il disco raggiunge la prima posizione in classifica grazie a brani come \"Tieni il tempo\", \"Gli Anni\" e \"Una canzone d\'amore\".\r\n\r\nSuccessivamente, Pezzali e la nuova Band debuttano dal vivo nei palazzetti d\'Italia con il primo 883Tour.\r\n\r\nIl 18 giugno 1997 esce \"La dura legge del gol\", che contiene \"La regola dell\'amico\", brano premiato da \"Vota la Voce\" con il Telegatto come \"Canzone dell\'estate\". Un anno più tardi, a luglio, Max pubblica \"Gli anni\", la raccolta dei più grandi successi degli 883 con l\'inedito \"Io ci sarò\". Il disco è il quinto album consecutivo degli 883 a raggiungere la posizione #1 della classifica di vendita (dati ufficiali Nielsen). Ma i successi non si fermano: nel 1999, infatti, è premiato come \"Best-selling Italian Artist/Group\" al THE 1999 WORLD MUSIC AWARDS, riconoscimento internazionale a cui segue la collaborazione con Boyzone per la canzone \"You Needed me / Tenendomi\".\r\n\r\nL\'11 marzo del 2000 parte il \"GRAZIE MILLE Tour 2000\", una nuova avventura che percorre Germania, Austria e Svizzera con un album dal titolo \"Mille grazie\" che raccoglie tutte le hit degli 883, comprese quelle dell\'ultimo \"Grazie mille\".\r\n\r\nLa vera svolta arriva nel 2001, quando Max Pezzali inaugura la sua carriera solista con l\'album \"1 IN +\", che conquista immediatamente la prima posizione della classifica di vendita. Seguono \"Il mondo insieme a te\", disco del 2004 contenente successi quali \"Lo strano percorso\", \"Il mondo insieme a te\", \"Me la caverò\" ed \"Eccoti\", e \"Tutto Max\" (2005), che registra il record di permanenza al #1 della TOP Nielsen, rimanendo in vetta per ben 10 settimane consecutive.\r\n'),
(9, 16, NULL, 2, 'Una carriera quella di Cesare iniziata con la pubblicazione - nel maggio 1999 - di â€œ50 Specialâ€, canzone diventata un vero e proprio inno generazionale e proseguita lungo un percorso costellato di una serie innumerevole di hit.\n\nIn questi anni Cesare ha sempre lavorato e scritto riuscendo a sposare la sua spiccata impostazione cantautorale con arrangiamenti e sonoritÃ  ricercate, lontane dalle mode del momento, diventando uno degli artisti piÃ¹ influenti del panorama musicale italiano.\n\nLa sua discografia e la sua biografia artistica, coincidono in un modo assolutamente unico: ventâ€™anni di canzoni di un ragazzo diventato uomo, nato e cresciuto sul palcoscenico. Ventâ€™anni che significano un altro passo verso il suo sogno piÃ¹ grande: fare della sua vita un unico grande spettacolo.'),
(10, 17, 'Ficarra e Picone', 4, 'La loro carriera artistica ha inizio dal cabaret e successivamente in teatro, per approdare poi alla televisione e al cinema. La loro esperienza inizia sui palchi del cabaret di tutta Italia tra 1993 e 1995 con lo spettacolo \"Certe notti di notte\", che li vede autori e protagonisti. Tra 1995 e 1997, dalla collaborazione con Andrea Brambilla (Zuzzurro) e Marco Posani, nasce lo spettacolo \"In Tre Sullâ€™arca Di NoÃ¨\". Negli anni 1997/1999 Ã¨ la volta di Vai avanti tu che io ti perseguito, di cui sono anche autori come per tutti i loro successivi spettacoli, con la regia di M. Olcese. Tra 1999 e 2002 girano nei teatri nazionali con \"Vuoti a perdere\", mentre lâ€™anno successivo con grandissimo successo di critica e pubblico in tutta Italia, Ã¨ la volta di \"Diciamoci la veritÃ \" con la regia di Giambattista Avellino, uno spettacolo che si puÃ² raccontare come uno â€œsguardo sul mondoâ€, apparentemente distaccato e racchiuso nella â€œsicilianitÃ â€ dei protagonisti. In questo spettacolo trovano spazio tra gli altri personaggi, i due siciliani â€œStanchiâ€ proposti a \"Zelig\", che chiacchierano svogliatamente spaziando tra problemi familiari e dellâ€™Italia intera, ed i \"Fratelli corner\" panchinari dellâ€™Inter.\n\nDal 2005 al 2007 la tournee che certifica la loro maturazione artistica, con lo spettacolo \"Sono cose che capitano\": un tessuto drammaturgico, suddiviso in tre microatti con epilogo finale che si allontana dagli stereotipi classici del cabaret, per affacciarsi a pieno titolo nel panorama della commedia teatrale. Nell\'estate 2010 hanno preso parte al tour \"Summer night live\" con il Mago Forest e Gian Luca Belardi.'),
(11, 18, NULL, 4, 'Alberto Urso Ã¨ un cantante, tenore e polistrumentista italiano, vincitore della diciottesima edizione di Amici di Maria De Filippi.'),
(12, 19, 'Il Volo', 4, 'Il loro primo album, uscito a maggio 2011, li consacra nuova meraviglia tra il classico e il pop, tra la melodia a respiro internazionale e la tradizione napoletana, vincendo premi in tutto il mondo. Nel novembre 2012 il loro secondo album WE ARE LOVE, che include duetti con Placido Domingo ed Eros Ramazzotti e una cover in inglese della hit degli U2 â€˜Beautiful Dayâ€™, conferma il loro successo globale.\nDopo il ritorno in Italia - reduci dallâ€™ultima tournÃ©e in USA e Sud America con il grande tutto esaurito al Radio City Hall di New York - Gianluca, Ignazio e Piero sono entrati nelle case di tutto il mondo con il loro Concerto di Natale. Ad Assisi - nella suggestiva Basilica di San Francesco, accompagnati dalla grande Orchestra della RAI e dal coro di Santa Cecilia - hanno cantato le piÃ¹ celebri arie natalizie tratte dal loro album Buon Natale, ospitando Arisa, vincitrice dellâ€™ultimo Festival di San Remo, e il grande attore italo-americano Paul Sorvino.\nDopo le loro ultime apparizioni televisive in â€œPorta a portaâ€ di Bruno Vespa e nella trasmissione â€œIl meglio dâ€™Italiaâ€ con Enrico Brignano, sono tornati a New York per duettare con Laura Pausini che li ha fortemente voluti suoi ospiti, insieme ad altrettanto famose star internazionali, nel concerto dedicato ai suoi 20 anni di carriera.'),
(13, 20, NULL, 4, 'Nasce a Trieste. Dopo aver fatto esperienza nei villaggi turistici, nel 2000 forma il duo Angelo&Max con il comico Max Vitale. Nel 2001 i due sono spesso ospiti al Maurizio Costanzo Show e appaiono in altre trasmissioni televisive. La coppia vince nel 2007 il concorso Dal Lago di Garda - Stasera mi butto, gara di comicitÃ  in diretta su Rai 1.\nAlla separazione del duo, segue la partecipazione di Angelo a diverse trasmissioni Mediaset, come Guida al campionato\nDal 2009, Ã¨ presenza fissa nel cast di Colorado in onda su Italia 1, in cui propone la rubrica \"Sfighe\" (parodia del programma di approfondimento sportivo Sfide), imitando fra gli altri il telecronista Bruno Pizzul, l\'allenatore JosÃ© Mourinho, il motociclista Valentino Rossi.\nNel 2011 propone la rubrica \"Non sopporto piÃ¹\"'),
(14, 21, 'Orchestra I Pomeriggi Musicali', 4, 'Il 27 novembre 1945 al Teatro Nuovo di Milano debutta lâ€™Orchestra I Pomeriggi Musicali. In programma Mozart e Beethoven accostati a Stravinskij e Prokovâ€™ev. Nellâ€™immediato dopoguerra, nel pieno fervore della ricostruzione, lâ€™impresario teatrale Remigio Paone e il critico musicale Ferdinando Ballo lanciano la nuova formazione con un progetto di straordinaria attualitÃ : dare alla cittÃ  unâ€™orchestra da camera con un solido repertorio classico ed una specifica vocazione alla contemporaneitÃ . Il successo Ã¨ immediato e lâ€™Orchestra contribuisce notevolmente alla divulgazione popolare in Italia della musica dei grandi del Novecento censurati durante la dittatura fascista: Stravinskij, Hindemith, Webern, Berg, Poulenc, Honegger, Copland, Yves, FranÃ§ais. I Pomeriggi Musicali avviano, inoltre, una tenace attivitÃ  di commissione musicale. Per i Pomeriggi compongono infatti Casella, Dallapiccola, Ghedini, Gian Francesco Malipiero, Pizzetti, Respighi. Questa scelta programmatica si consolida nel rapporto con i compositori delle leve successive: Berio, Bussotti, Luciano Chailly, Clementi, Donatoni, Hazon, Maderna, Mannino, Manzoni, Margola, Pennisi, Testi, Tutino, Panni, Fedele, Francesconi, Vacchi. Oggi I Pomeriggi Musicali contano su un vastissimo repertorio che include i capolavori del Barocco, del Classicismo e del primo Romanticismo insieme alla gran parte della musica moderna e contemporanea. Compositori come Honegger e Hindemith, Pizzetti, Dallapiccola, Petrassi e Penderecki hanno diretto la loro musica sul podio dei Pomeriggi Musicali, che diventano trampolino di lancio verso la celebritÃ  di tanti giovani artisti. Eâ€™ il caso di Claudio Abbado, Leonard Bernstein, Rudolf Buchbinder, Pierre Boulez, Michele Campanella, Giuliano Carmignola, Aldo Ceccato, Sergiu Celibidache, Riccardo Chailly, Daniele Gatti, Gianandrea Gavazzeni, Carlo Maria Giulini, Vittorio Gui, Natalia Gutman, Angela Hewitt, Leonidas Kavakos, Alexander Lonquich, Alexander Igor Markevitch, Zubin Mehta, Carl Melles, Riccardo Muti, Hermann Scherchen, Thomas Schippers, Christian Thielemann, Salvatore Accardo, Antonio Ballista, Arturo Benedetti Michelangeli, Bruno Canino, Dino Ciani, Severino Gazzelloni, Franco Gulli, Nikita Magaloff, Nathan Milstein, Massimo Quarta, Maurizio Pollini, Corrado Rovaris e Uto Ughi.'),
(15, 22, NULL, 4, 'Ennio Morricone Ã¨ un compositore, musicista, direttore d\'orchestra e arrangiatore italiano.\n\nHa studiato al Conservatorio di Santa Cecilia, a Roma, dove si Ã¨ diplomato in tromba; ha scritto le musiche per piÃ¹ di 500 film e serie TV, oltre che opere di musica contemporanea. La sua carriera include un\'ampia gamma di generi compositivi, che fanno di lui uno dei piÃ¹ versatili, prolifici e influenti compositori di colonne sonore di tutti i tempi. Le musiche di Morricone sono state usate in piÃ¹ di 60 film vincitori di premi. Come giovane arrangiatore della RCA, ha contribuito anche a formare il sound degli anni sessanta italiani, confezionando brani come Sapore di sale, Se telefonando, e i successi di Edoardo Vianello.'),
(16, 23, NULL, 7, 'Nato ad Asti, il debutto da protagonista avviene nel 1974 con lâ€™album Paolo Conte al quale seguirÃ  una produzione musicale sempre innovativa e raffinata che arriva fino ad oggi ad annoverare 15 album di studio, oltre a numerosissimi live e antologie, regalando alla musica italiana colori e suggestioni di un sapore unico e inconfondibile. Fra i suoi piÃ¹ grandi successi ricordiamo: Via con me, Diavolo Rosso, Bartali, Gli Impermeabili, Max, Gelato al limon, Sotto le stelle del jazz, Aguaplano.\n\nLâ€™originalitÃ  musicale di Paolo Conte Ã¨ oggi apprezzata nei teatri di tutto il mondo ed Ã¨ motivo di orgoglio per lo stile e per lâ€™immagine dellâ€™Italia allâ€™estero.'),
(17, 24, NULL, 7, 'Nato a Roma nel quartiere di Dragona, di origini siciliane ed abruzzesi, nonchÃ©, come indica il cognome, piemontesi, Ã¨ cresciuto all\'Accademia per giovani comici creata da Gigi Proietti, partecipa come comico e barzellettiere alla prima edizione del programma La sai l\'ultima?, in onda su Canale 5. Nel 1992 Ã¨ ospite nella prima edizione del programma televisivo Scherzi a parte condotto da Teo Teocoli e Gene Gnocchi.\n\nDal 1998 al 2000 Ã¨ Giacinto in Un medico in famiglia; la serie tv gli offre una maggiore visibilitÃ  e soprattutto un riconoscimento da parte del pubblico che lo segue anche in teatro con estremo interesse; del 1999 Ã¨ il primo spettacolo tutto suo, Io per voi un libro aperto, da Ostia Antica, trasmesso in diretta anche da Mediaset su Canale 5. Nel 2000 gira il suo primo film da regista e protagonista Si fa presto a dire amore al fianco di Vittoria Belvedere. Inizia l\'ascesa nel mondo dello spettacolo grazie alle tournÃ©e estive di teatro e cabaret e nel 2001 Carlo Vanzina lo sceglie per il ruolo di Francesco nel film South Kensington dove recita al fianco di Rupert Everett.'),
(18, 25, 'Ghali', 7, 'Nasce a Milano il 21 Maggio 1993, all\'etÃ  di undici anni si trasferisce da Via Padova con la famiglia nel quartiere di Baggio.\nNel 2011 insieme a Maite, Fawzy ed Er Nyah forma i Troupe D\'elite e subito dopo la pubblicazione del loro primo video ufficiale riceve una chiamata dal rapper Fedez e il contratto con Tanta Roba.\nNello stesso anno viene pubblicato il primo singolo â€œNon capisco una mazzaâ€ sotto etichetta che riceve pochi consensi e tante critiche al punto che viene posticipata e poi congelata l\'uscita dell\'Ep in progetto.\nNel Luglio 2013 esce Leader Mixtape in free download.\nAlla fine del 2015 vengono pubblicati tre video girati da Alessandro Murdaca e Jamie Robert Othieno che ottengono ottime recensioni e ben presto ricevono un buonissimo riscontro su Youtube.\nNel mese di Ottobre â€œNon lo soâ€ in collaborazione con il rapper ligure Izi e la produzione di Chris Nolan, a Novembre â€œSempre Meâ€ prodotta da Charlie Charles e a Dicembre â€œMarijuanaâ€ prodotta sempre da Charlie Charles che consacra il rapper milanese come una delle rivelazioni del 2015 nel panorama rap italiano.'),
(19, 26, 'Annalisa', 7, 'Annalisa Scarrone nasce a Savona il 5 Agosto 1985 e vive a Carcare, in provincia di Savona, con il padre e la madre. Fin da piccolissima si appassiona alla musica grazie ad una collezione di dischi invidiabile messa insieme dai genitori. E\' laureata in Fisica, ha studiato canto e diversi strumenti musicali.\n\nNel 2010 partecipa alla decima edizione di â€œAmiciâ€ dove arriva seconda nella categoria canto. Pubblica cosÃ¬ il suo primo album, NALI (il diminutivo affettuoso con cui la chiamano famigliari ed amici), che contiene brani giÃ  ascoltati proprio in trasmissione, come â€œQuesto bellissimo giocoâ€. A un anno di distanza esce il secondo disco di Annalisa, MENTRE TUTTO CAMBIA, lavoro piÃ¹ intimo, anticipato dal singolo â€œSenza riservaâ€.'),
(20, 27, 'Emma', 7, 'Emma Marrone, conosciuta anche come Emma, pseudonimo di Emmanuela Marrone, Ã¨ una cantante e produttrice discografica italiana.\n\nDopo alcune esperienze nell\'ambito musicale con diversi gruppi, Ã¨ salita alla ribalta come cantante solista tra il 2009 e il 2010, ottenendo la vittoria alla nona edizione del talent show Amici di Maria De Filippi e firmando un contratto con l\'etichetta discografica Universal Music Group.'),
(21, 28, 'Mannarino', 7, 'Mannarino nasce a Roma nel 1979. Inizia la sua attivitÃ  artistica a partire dal 2001 quando, girando per lâ€™antica suburra del rione Monti, si esibisce in session a cavallo tra il djing e il live acustico. Lasciandosi alle spalle queste esperienze di â€œdj con la chitarraâ€ nel 2006 dÃ  vita alla Kampina, una band formata da cinque elementi. Con questa formazione Mannarino comincia ad esibirsi nei maggiori club e locali della capitale fino ad approdare in veste di cantautore in vari festival, club e nelle piazze, anche in ambiti che esulano dal contesto strettamente musicale.\n\nSuccessivamente si esibisce in performances dal vivo e viene invitato da Fiorello e Baldini nella trasmissione â€œViva Radio 2â€. Lo stesso anno sale sul palco del Teatro Ambra Jovinellidi Roma nello spettacolo â€œAgostino, tutti contro tuttiâ€ (regia di Massimiliano Bruno) dove viene notato da Serena Dandini che lo vuole con sÃ©, per tre stagioni consecutive, nella trasmissione televisiva di Rai3 â€œParla con meâ€.'),
(22, 29, 'LIberato', 7, 'Liberato Ã¨ un cantante e cantautore italiano dall\'identitÃ  anonima, attivo a partire dal 13 febbraio 2017.\n\nSebbene la lingua di composizione dei suoi testi sia principalmente il napoletano, Ã¨ solito amalgamare anche parole o intere frasi in lingua italiana, inglese, francese e spagnola.');

-- --------------------------------------------------------

--
-- Struttura della tabella `biglietto`
--

CREATE TABLE `biglietto` (
  `Matricola` varchar(100) COLLATE utf16_bin NOT NULL,
  `IDSettore` int(11) DEFAULT NULL,
  `IDLocation` int(11) DEFAULT NULL,
  `IDEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `biglietto`
--

INSERT INTO `biglietto` (`Matricola`, `IDSettore`, `IDLocation`, `IDEvento`) VALUES
('1-3-1-1', 3, 1, 1),
('1-3-1-2', 3, 1, 1),
('1-3-1-3', 3, 1, 1),
('1-3-1-4', 3, 1, 1),
('1-4-17-1', 4, 1, 17),
('1-4-17-2', 4, 1, 17),
('1-4-17-3', 4, 1, 17),
('1-4-17-4', 4, 1, 17),
('4-23-23-1', 23, 4, 23),
('4-23-23-2', 23, 4, 23),
('5-28-3-1', 28, 5, 3),
('5-28-3-2', 28, 5, 3),
('9-48-25-1', 48, 9, 25),
('9-48-25-2', 48, 9, 25),
('9-48-25-3', 48, 9, 25),
('13-61-44-1', 61, 13, 44),
('13-61-44-2', 61, 13, 44),
('14-62-39-1', 62, 14, 39),
('14-62-39-2', 62, 14, 39),
('14-62-39-3', 62, 14, 39),
('14-62-39-4', 62, 14, 39),
('14-62-39-5', 62, 14, 39),
('15-70-38-1', 70, 15, 38),
('15-70-38-2', 70, 15, 38),
('17-73-18-1', 73, 17, 18),
('19-81-20-1', 81, 19, 20),
('19-81-20-2', 81, 19, 20),
('19-81-20-3', 81, 19, 20),
('19-84-20-1', 84, 19, 20),
('19-84-20-2', 84, 19, 20),
('19-84-20-3', 84, 19, 20),
('19-84-20-4', 84, 19, 20),
('22-86-51-1', 86, 22, 51),
('22-86-51-2', 86, 22, 51),
('22-86-51-3', 86, 22, 51);

-- --------------------------------------------------------

--
-- Struttura della tabella `bigliettoacquistato`
--

CREATE TABLE `bigliettoacquistato` (
  `Matricola` varchar(100) COLLATE utf16_bin NOT NULL,
  `IDAcquisto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `bigliettoacquistato`
--

INSERT INTO `bigliettoacquistato` (`Matricola`, `IDAcquisto`) VALUES
('1-3-1-1', 8),
('1-3-1-2', 8),
('1-3-1-3', 8),
('1-3-1-4', 8),
('1-4-17-1', 1),
('1-4-17-2', 1),
('1-4-17-3', 1),
('1-4-17-4', 1),
('13-61-44-1', 3),
('13-61-44-2', 3),
('14-62-39-1', 3),
('14-62-39-2', 3),
('14-62-39-3', 3),
('14-62-39-4', 3),
('14-62-39-5', 8),
('15-70-38-1', 1),
('15-70-38-2', 1),
('17-73-18-1', 7),
('19-81-20-1', 6),
('19-81-20-2', 6),
('19-81-20-3', 6),
('19-84-20-1', 6),
('19-84-20-2', 6),
('19-84-20-3', 6),
('19-84-20-4', 6),
('22-86-51-1', 6),
('22-86-51-2', 6),
('22-86-51-3', 6),
('4-23-23-1', 1),
('4-23-23-2', 1),
('5-28-3-1', 1),
('5-28-3-2', 1),
('9-48-25-1', 2),
('9-48-25-2', 2),
('9-48-25-3', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `IDEvento` int(11) NOT NULL,
  `Titolo` varchar(50) COLLATE utf16_bin NOT NULL,
  `Locandina` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `IDOrganizzatore` int(11) DEFAULT NULL,
  `IDArtista` int(11) DEFAULT NULL,
  `IDLocation` int(11) DEFAULT NULL,
  `IDGenere` int(11) DEFAULT NULL,
  `Info` varchar(1000) COLLATE utf16_bin DEFAULT NULL,
  `DataInizio` datetime NOT NULL,
  `DataFine` datetime DEFAULT NULL,
  `DataPubblicazione` datetime DEFAULT NULL,
  `Recommendation` double DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`IDEvento`, `Titolo`, `Locandina`, `IDOrganizzatore`, `IDArtista`, `IDLocation`, `IDGenere`, `Info`, `DataInizio`, `DataFine`, `DataPubblicazione`, `Recommendation`) VALUES
(1, 'Salmo ', '\\eventImages\\Salmo.jpg', 2, 1, 1, 4, 'Una nuova e imperdibile occasione per assistere a un concerto live del fuoriclasse del rap italiano! L\'attesissimo evento prodotto e distribuito da Vivo Concerti che vedrà SALMO esibirsi allo stadio SAN SIRO di Milano, infatti, sarà preceduto dalla data zero prevista per martedì 9 giugno 2020 presso lo Stadio Comunale di Bibione (VE).', '2020-06-14 21:00:00', '2020-06-14 23:50:00', '2020-03-28 15:00:00', 3.5),
(2, 'Tiziano Ferro', '\\eventImages\\TizianoFerro.jpg', 2, 6, 1, 1, 'A grande richiesta, i concerti allo Stadio San Siro di Milano diventano tre con l\'aggiunta di lunedì 8 giugno 2020, mentre raddoppia lo show allo Stadio Olimpico di Roma con l\'inserimento in calendario di una replica giovedì 16 luglio 2020.\r\n\r\nIl tour partirà ufficialmente il 30 maggio dallo Stadio G. Teghil di Lignano e sbarcherà allo Stadio San Siro di Milano (con tre date il 5, 6 e 8 giugno), allo Stadio Olimpico di Torino (l\'11 giugno), allo Stadio Euganeo di Padova (il 14).', '2020-06-06 20:45:00', '2020-06-07 00:00:00', '2020-03-28 15:00:00', 4.3),
(3, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 5, 4, NULL, '2020-09-13 21:00:00', '2020-09-14 00:00:00', '2020-03-28 15:00:00', 4.7),
(4, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 5, 4, NULL, '2020-09-14 21:00:00', '2020-09-15 00:00:00', '2020-03-28 15:00:00', 4.7),
(5, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 5, 4, NULL, '2020-09-16 21:00:00', '2020-09-17 00:00:00', '2020-03-28 15:00:00', 4.7),
(6, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 5, 4, NULL, '2020-09-17 21:00:00', '2020-09-18 00:00:00', '2020-03-28 15:00:00', 4.7),
(7, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 2, 4, NULL, '2020-11-27 21:00:00', '2020-11-28 00:00:00', NULL, 4.2),
(8, 'Marracash', '\\eventImages\\Marracash.jpg', 2, 7, 3, 4, NULL, '2020-10-24 21:00:00', '2020-10-25 00:00:00', NULL, 4.8),
(9, 'Salmo ', '\\eventImages\\Salmo.jpg', 2, 1, 18, 4, 'Una nuova e imperdibile occasione per assistere a un concerto live del fuoriclasse del rap italiano! L\'attesissimo evento prodotto e distribuito da Vivo Concerti che vedrÃ  SALMO esibirsi allo stadio SAN SIRO di Milano, infatti, sarÃ  preceduto dalla data zero prevista per martedÃ¨ 9 giugno 2020 presso lo Stadio Comunale di Bibione (VE).', '2020-06-09 21:00:00', '2020-06-10 00:00:00', NULL, 4.2),
(10, 'Tiziano Ferro', '\\eventImages\\TizianoFerro.jpg', 2, 6, 19, 1, 'A grande richiesta, i concerti allo Stadio San Siro di Milano diventano tre con l\'aggiunta di lunedÃ¬ 8 giugno 2020, mentre raddoppia lo show allo Stadio Olimpico di Roma con l\'inserimento in calendario di una replica giovedÃ¬ 16 luglio 2020.\n\nIl tour partirÃ  ufficialmente il 30 maggio dallo Stadio G. Teghil di Lignano e sbarcherÃ  allo Stadio San Siro di Milano (con tre date il 5, 6 e 8 giugno), allo Stadio Olimpico di Torino (l\'11 giugno), allo Stadio Euganeo di Padova (il 14).', '2020-07-15 21:00:00', '2020-07-16 00:00:00', NULL, 4.7),
(11, 'Tiziano Ferro', '\\eventImages\\TizianoFerro.jpg', 2, 6, 17, 1, 'A grande richiesta, i concerti allo Stadio San Siro di Milano diventano tre con l\'aggiunta di lunedÃ¬ 8 giugno 2020, mentre raddoppia lo show allo Stadio Olimpico di Roma con l\'inserimento in calendario di una replica giovedÃ¬ 16 luglio 2020.\n\nIl tour partirÃ  ufficialmente il 30 maggio dallo Stadio G. Teghil di Lignano e sbarcherÃ  allo Stadio San Siro di Milano (con tre date il 5, 6 e 8 giugno), allo Stadio Olimpico di Torino (l\'11 giugno), allo Stadio Euganeo di Padova (il 14).', '2020-05-30 21:00:00', '2020-05-31 00:00:00', NULL, 5),
(12, 'Roma Sound Festival', '\\eventImages\\CarlBrave.jpg', 2, 4, 23, 4, NULL, '2020-09-04 21:00:00', '2020-09-04 23:30:00', NULL, 3.6),
(15, 'Urban Park Milano', '\\eventImages\\CarlBrave.jpg', 2, 4, 25, 4, NULL, '2020-09-01 21:00:00', '2020-09-01 22:30:00', NULL, 4.6),
(16, 'Max Pezzali BIBIONE - Biglietti', '\\eventImages\\MaxPezzali.jpg', 2, 8, 18, 1, NULL, '2020-07-02 21:00:00', '2020-07-02 23:00:00', NULL, 5),
(17, 'Max Pezzali MILANO - Biglietti', '\\eventImages\\MaxPezzali.jpg', 2, 8, 1, 1, NULL, '2020-07-11 21:30:00', '2020-07-11 23:00:00', NULL, 3.6),
(18, 'Cesare Cremonini LIGNANO SABBIADORO - Biglietti', '\\eventImages\\CesareCremonini.jpg', 2, 9, 17, 1, NULL, '2020-06-21 21:00:00', '2020-06-21 23:00:00', NULL, 5),
(19, 'Cesare Cremonini MILANO - Biglietti', '\\eventImages\\CesareCremonini.jpg', 2, 9, 1, 1, NULL, '2020-06-27 21:00:00', '2020-06-27 23:00:00', NULL, 4.9),
(20, 'Cesare Cremonini ROMA - Biglietti', '\\eventImages\\CesareCremonini.jpg', 2, 9, 19, 1, NULL, '2020-09-13 20:00:00', '2020-09-13 21:30:00', NULL, 4.9),
(21, 'Ficarra e Picone VERONA - Biglietti', '\\eventImages\\FicarraePicone.jpg', 4, 10, 26, 20, 'Lâ€™Arena di Verona apre le porte alla comicitÃ  di Ficarra e Picone, che calcheranno per la prima volta nella loro carriera artistica, il prestigioso palco della cittÃ  scaligera, il prossimo 22 luglio con il loro spettacolo â€œAbbiamo fattoâ€¦25 anniâ€, che si snoderÃ  in oltre cento tappe in giro per lâ€™Italia e che prenderÃ  il via il prossimo 2 maggio da La Spezia.', '2020-08-22 21:00:00', '2020-08-22 23:00:00', NULL, 3.6),
(22, 'Ficarra e Picone TAORMINA - Biglietti', '\\eventImages\\FicarraePicone.jpg', 4, 10, 9, 20, 'Lâ€™Arena di Verona apre le porte alla comicitÃ  di Ficarra e Picone, che calcheranno per la prima volta nella loro carriera artistica, il prestigioso palco della cittÃ  scaligera, il prossimo 22 luglio con il loro spettacolo â€œAbbiamo fattoâ€¦25 anniâ€, che si snoderÃ  in oltre cento tappe in giro per lâ€™Italia e che prenderÃ  il via il prossimo 2 maggio da La Spezia.\n', '2020-07-31 21:00:00', '2020-07-31 23:00:00', NULL, 5),
(23, 'Ficarra e Picone ROMA - Biglietti', '\\eventImages\\FicarraePicone.jpg', 4, 10, 4, 20, 'Lâ€™Arena di Verona apre le porte alla comicitÃ  di Ficarra e Picone, che calcheranno per la prima volta nella loro carriera artistica, il prestigioso palco della cittÃ  scaligera, il prossimo 22 luglio con il loro spettacolo â€œAbbiamo fattoâ€¦25 anniâ€, che si snoderÃ  in oltre cento tappe in giro per lâ€™Italia e che prenderÃ  il via il prossimo 2 maggio da La Spezia.\n', '2020-09-22 21:00:00', '2020-09-22 23:30:00', NULL, 4.8),
(24, 'Ficarra e Picone TAORMINA - Biglietti', '\\eventImages\\FicarraePicone.jpg', 4, 10, 9, 20, 'Lâ€™Arena di Verona apre le porte alla comicitÃ  di Ficarra e Picone, che calcheranno per la prima volta nella loro carriera artistica, il prestigioso palco della cittÃ  scaligera, il prossimo 22 luglio con il loro spettacolo â€œAbbiamo fattoâ€¦25 anniâ€, che si snoderÃ  in oltre cento tappe in giro per lâ€™Italia e che prenderÃ  il via il prossimo 2 maggio da La Spezia.\r\n', '2020-08-01 21:00:00', '2020-08-01 23:00:00', NULL, 4.5),
(25, 'Ficarra e Picone TAORMINA - Biglietti', '\\eventImages\\FicarraePicone.jpg', 4, 10, 9, 20, 'Lâ€™Arena di Verona apre le porte alla comicitÃ  di Ficarra e Picone, che calcheranno per la prima volta nella loro carriera artistica, il prestigioso palco della cittÃ  scaligera, il prossimo 22 luglio con il loro spettacolo â€œAbbiamo fattoâ€¦25 anniâ€, che si snoderÃ  in oltre cento tappe in giro per lâ€™Italia e che prenderÃ  il via il prossimo 2 maggio da La Spezia.\r\n', '2020-08-02 21:00:00', '2020-08-02 23:00:00', NULL, 4.5),
(26, 'Alberto Urso TAORMINA - Biglietti', '\\eventImages\\AlbertoUrso.jpg', 4, 11, 9, 19, NULL, '2020-07-24 21:00:00', '2020-07-24 23:30:00', NULL, 4.6),
(27, 'Alberto Urso ROMA - Biglietti', '\\eventImages\\AlbertoUrso.jpg', 4, 11, 8, 19, NULL, '2020-09-27 21:00:00', '2020-09-27 23:00:00', NULL, 3.6),
(28, 'Alberto Urso MILANO - Biglietti', '\\eventImages\\AlbertoUrso.jpg', 4, 11, 7, 19, NULL, '2020-10-02 21:00:00', '2020-10-02 23:00:00', NULL, 4.1),
(29, 'Il Volo TAORMINA - Biglietti', '\\eventImages\\IlVolo.jpg', 4, 12, 9, 19, NULL, '2020-09-04 21:00:00', '2020-09-04 23:00:00', NULL, 3.9),
(30, 'Il Volo VERONA - Biglietti', '\\eventImages\\IlVolo.jpg', 4, 12, 26, 19, NULL, '2020-08-30 21:30:00', '2020-08-30 23:00:00', NULL, 4.1),
(31, 'Il Volo ASSAGO - Biglietti', '\\eventImages\\IlVolo.jpg', 4, 12, 5, 19, NULL, '2020-11-30 21:15:00', '2020-11-30 23:00:00', NULL, 3.9),
(32, 'Pintus@Taormina TAORMINA - Biglietti', '\\eventImages\\AngeloPintus.jpg', 4, 13, 9, 20, NULL, '2020-09-19 21:00:00', '2020-09-19 23:00:00', NULL, 4.1),
(33, 'Destinati all\'Estinzione SANREMO - Biglietti', '\\eventImages\\AngeloPintus.jpg', 4, 13, 15, 20, NULL, '2020-10-23 21:15:00', '2020-10-23 23:30:00', NULL, 4.2),
(35, 'Concerti Giovedi 2019/20 MILANO', '\\eventImages\\OrchestraIPomeriggiMusicali.jpg', 4, 14, 12, 22, 'Per una coincidenza tanto fortunata quanto piacevole, l’anniversario dei 75 anni dei Pomeriggi Musicali coincide con altri importanti ricorrenze legate a interpreti ed autori a noi particolarmente cari. Un nome per tutti: Beethoven, nel 250° della nascita.\r\nQuale migliore occasione per rivisitare le nove Sinfonie, i cinque Concerti per Pianoforte ed il Concerto per Violino?\r\n\r\nAccanto agli appuntamenti beethoveniani, saranno sei i protagonisti di altrettanti Anniversari che celebreremo in musica', '2020-09-16 21:00:00', '2020-09-16 23:00:00', NULL, 4.4),
(36, 'Festival Charlie Chaplin MILANO', '\\eventImages\\OrchestraIPomeriggiMusicali.jpg', 4, 14, 12, 21, NULL, '2020-10-15 15:30:00', '2020-10-15 18:00:00', NULL, 4.2),
(37, 'The Legend of Ennio Morricone MILANO', '\\eventImages\\EnnioMorricone.jpg', 4, 15, 12, 5, 'Il Buono Il Brutto Ed Il Cattivo, Mission, La Leggenda Del Pianista Sullâ€™oceano, Câ€™era Una Volta Il West, Nuovo Cinema Paradiso, Per Un Pugno Di Dollari, The Hateful Eight, C\'era Una Volta In America, Per Qualche Dollaro In Piu\', Malenaâ€¦ Gli straordinari capolavori di uno dei piuâ€™ grandi compositori musicali riarrangiati e proposti in un concerto teatrale di grande impatto emotivo.\r\n\r\n500 colonne sonore, 70 milioni di dischi venduti nel mondo, sei nominations e due Oscar vinti, tre Grammy, quattro Golden Globe e un Leone d’Oro fanno di Ennio Morricone un gigante della musica di tutti i tempi.', '2021-01-22 21:00:00', '2021-01-22 23:00:00', NULL, 3.6),
(38, 'Paolo Conte SANREMO', '\\eventImages\\PaoloConte.jpg', 7, 16, 15, 3, 'Alla lista delle leggende della musica che hanno calcato il palco del Lucca Summer Festival mancava il nome di una delle figure fondamentali della storia del cantautorato Italiano: Paolo Conte.\n\nQuesta lacuna verrÃ  colmata il prossimo 24 Luglio quando il cantautore piemontese si esibirÃ  davanti alla statua di Maria Luisa di Borbone in uno spettacolo che lo vedrÃ  riproporre tutti i suoi grandi classici a partire da Azzurro, il brano inizialmente interpretato da Adriano Celentano che ha portato Paolo Conte ad essere conosciuto in Italia e nel mondo.\n\nEd Ã¨ stato proprio il 50Â° anniversario di Azzuro a dare spunto al disco â€œLive in Caracalla - 50 years of Azzurroâ€ a cui ha fatto seguito il tour che lo ha portato ad esibirsi nei piÃ¹ importanti teatri europei e che a luglio lo farÃ  approdare al Lucca Summer Festival.', '2020-11-06 21:15:00', '2020-11-06 23:00:00', NULL, 5),
(39, 'Paolo Conte PADOVA', '\\eventImages\\PaoloConte.jpg', 7, 16, 14, 3, 'Alla lista delle leggende della musica che hanno calcato il palco del Lucca Summer Festival mancava il nome di una delle figure fondamentali della storia del cantautorato Italiano: Paolo Conte.\n\nQuesta lacuna verrÃ  colmata il prossimo 24 Luglio quando il cantautore piemontese si esibirÃ  davanti alla statua di Maria Luisa di Borbone in uno spettacolo che lo vedrÃ  riproporre tutti i suoi grandi classici a partire da Azzurro, il brano inizialmente interpretato da Adriano Celentano che ha portato Paolo Conte ad essere conosciuto in Italia e nel mondo.\n\nEd Ã¨ stato proprio il 50Â° anniversario di Azzuro a dare spunto al disco â€œLive in Caracalla - 50 years of Azzurroâ€ a cui ha fatto seguito il tour che lo ha portato ad esibirsi nei piÃ¹ importanti teatri europei e che a luglio lo farÃ  approdare al Lucca Summer Festival.', '2020-10-17 21:15:00', '2020-10-17 23:00:00', NULL, 4.7),
(40, 'Un\'ora sola vi vorrei - VERONA', '\\eventImages\\EnricoBrignano.jpg', 7, 17, 26, 20, NULL, '2020-09-20 21:00:00', '2020-09-20 23:00:00', NULL, 4.1),
(41, 'Un\'ora sola vi vorrei - MILANO', '\\eventImages\\EnricoBrignano.jpg', 7, 17, 7, 20, NULL, '2020-10-16 21:00:00', '2020-10-16 23:00:00', NULL, 3.5),
(42, 'Un\'ora sola vi vorrei - MILANO', '\\eventImages\\EnricoBrignano.jpg', 7, 17, 7, 20, NULL, '2020-10-17 21:00:00', '2020-10-17 23:00:00', NULL, 4.5),
(43, 'Ghali - FABRIQUE', '\\eventImages\\Ghali.jpg', 7, 18, 13, 4, NULL, '2020-10-08 22:00:00', '2020-10-08 23:45:00', NULL, 4.9),
(44, 'Ghali - FABRIQUE', '\\eventImages\\Ghali.jpg', 7, 18, 13, 4, NULL, '2020-10-09 22:00:00', '2020-10-09 23:45:00', NULL, 4.5),
(45, 'Ghali - FABRIQUE', '\\eventImages\\Ghali.jpg', 7, 18, 13, 4, NULL, '2020-10-10 22:00:00', '2020-10-10 23:45:00', NULL, 4.5),
(46, 'Annalisa- FABRIQUE', '\\eventImages\\Annalisa.jpg', 7, 19, 13, 1, NULL, '2020-10-22 21:00:00', '2020-10-22 23:45:00', NULL, 4.7),
(47, 'Emma - ASSAGO', '\\eventImages\\Emma.jpg', 7, 20, 5, 1, 'Per celebrare questi primi 10 anni saranno â€œ9+1â€ i concerti di EMMA nel 2020: dopo lâ€™Arena di Verona, infatti, da ottobre EMMA sarÃ  impegnata con â€œFORTUNA LIVE PALASPORT 2020â€, 9 concerti nei principali palasport dâ€™Italia.', '2020-10-05 21:15:00', '2020-10-05 23:00:00', NULL, 4.2),
(48, 'Emma - BOLOGNA', '\\eventImages\\Emma.jpg', 7, 20, 3, 1, 'Per celebrare questi primi 10 anni saranno â€œ9+1â€ i concerti di EMMA nel 2020: dopo lâ€™Arena di Verona, infatti, da ottobre EMMA sarÃ  impegnata con â€œFORTUNA LIVE PALASPORT 2020â€, 9 concerti nei principali palasport dâ€™Italia.', '2020-10-23 21:15:00', '2020-10-23 23:00:00', NULL, 4.9),
(49, 'Emma - TORINO ', '\\eventImages\\Emma.jpg', 7, 20, 2, 1, 'Per celebrare questi primi 10 anni saranno â€œ9+1â€ i concerti di EMMA nel 2020: dopo lâ€™Arena di Verona, infatti, da ottobre EMMA sarÃ  impegnata con â€œFORTUNA LIVE PALASPORT 2020â€, 9 concerti nei principali palasport dâ€™Italia.', '2020-10-24 21:00:00', '2020-10-24 23:00:00', NULL, 4.8),
(50, 'Emma - VERONA', '\\eventImages\\Emma.jpg', 7, 20, 26, 1, 'Per celebrare questi primi 10 anni saranno â€œ9+1â€ i concerti di EMMA nel 2020: dopo lâ€™Arena di Verona, infatti, da ottobre EMMA sarÃ  impegnata con â€œFORTUNA LIVE PALASPORT 2020â€, 9 concerti nei principali palasport dâ€™Italia.', '2020-08-25 21:00:00', '2020-08-25 23:00:00', NULL, 3.9),
(51, 'Mannarino Live', '\\eventImages\\Mannarino.jpg', 7, 21, 22, 7, 'Mannarino, lâ€™artista definito â€œpoeta segretoâ€, Ã¨ stato ospite dâ€™onore, e primo italiano, invitato ad esibirsi al MusÃ©e Dâ€™Orsay di Parigi allâ€™evento â€œCurieuse Nocturneâ€. Una performance davvero speciale, davanti a seimila persone, scelta come occasione per annunciare il suo ritorno live: il nuovo tour partirÃ  il 9 ottobre dallâ€™Arena di Verona e proseguirÃ  nei palazzetti di tutta Italia.', '2020-10-20 21:30:00', '2020-10-20 23:45:00', NULL, 3.6),
(52, 'Mannarino Live', '\\eventImages\\Mannarino.jpg', 7, 21, 2, 8, 'Mannarino, lâ€™artista definito â€œpoeta segretoâ€, Ã¨ stato ospite dâ€™onore, e primo italiano, invitato ad esibirsi al MusÃ©e Dâ€™Orsay di Parigi allâ€™evento â€œCurieuse Nocturneâ€. Una performance davvero speciale, davanti a seimila persone, scelta come occasione per annunciare il suo ritorno live: il nuovo tour partirÃ  il 9 ottobre dallâ€™Arena di Verona e proseguirÃ  nei palazzetti di tutta Italia.', '2020-10-29 21:15:00', '2020-10-29 23:00:00', NULL, 3.7);

-- --------------------------------------------------------

--
-- Struttura della tabella `genere`
--

CREATE TABLE `genere` (
  `IDGenere` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf16_bin NOT NULL,
  `IDTipologia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `genere`
--

INSERT INTO `genere` (`IDGenere`, `Name`, `IDTipologia`) VALUES
(1, 'Pop & Rock', 1),
(2, 'Metal', 1),
(3, 'Jazz', 1),
(4, 'Hip-Hop/R&B', 1),
(5, 'Musica Classica', 1),
(6, 'Musica Elettronica', 1),
(7, 'Reggae', 1),
(8, 'Country', 1),
(15, 'Mostre d\'arte e di storia', 3),
(16, 'Musei e siti archeologici', 3),
(17, 'Festival e varieta', 4),
(18, 'Prosa', 4),
(19, 'Teatro Lirico', 4),
(20, 'Cabaret', 4),
(21, 'Concerti di musica classica', 4),
(22, 'Balletto classico e moderno', 4),
(23, 'Opera', 4),
(24, 'Conferenza', 4),
(25, 'Circo', 5),
(26, 'Fiera', 5),
(27, 'Parco tematico', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `location`
--

CREATE TABLE `location` (
  `IDLocation` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `Indirizzo` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `Immagine` varchar(100) COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `location`
--

INSERT INTO `location` (`IDLocation`, `Nome`, `Indirizzo`, `Immagine`) VALUES
(1, 'Stadio San Siro', 'Piazzale Angelo Moratti, 20151', '\\locationImages\\StadioSanSiro.jpg'),
(2, 'Pala Alpitour', 'Corso Sebastopoli, 123', '\\locationImages\\PalaAlpitour.jpg'),
(3, 'Unipol Arena ', 'Via Gino Cervi', '\\locationImages\\UnipolArena.jpg'),
(4, 'Teatro Sistina', 'Via Sistina, 129', '\\locationImages\\TeatroSistina.jpg'),
(5, 'Mediolanum Forum Assago', 'Via G. di Vittorio, 6', '\\locationImages\\MediolanumForumAssago.jpg'),
(6, 'Mamamia', 'Via Mattei, 32', '\\locationImages\\Mamamia.jpg'),
(7, 'Teatro degli Arcimboldi', 'Viale dell\'Innovazione, 20', '\\locationImages\\TeatroDegliArcimboldi.jpg'),
(8, 'Auditorium Parco della Musica ', 'Largo Luciano Berio, 3', '\\locationImages\\AuditoriumParcoDellaMusica.jpg'),
(9, 'Teatro Antico Taormina', 'Via Teatro Greco', '\\locationImages\\TeatroAnticoTaormina.jpg'),
(10, 'Teatro Centrale Roma', 'Via Celsa, 6', '\\locationImages\\TeatroCentraleRoma.jpg'),
(11, 'Carisport', 'Piazzale Paolo Tordi, 99', '\\locationImages\\Carisport.jpg'),
(12, 'Teatro dal Verme', 'Via San Giovanni Sul Muro, 22', '\\locationImages\\TeatroDalVerme.jpg'),
(13, 'Fabrique', 'Via Fantoli, 9', '\\locationImages\\Fabrique.jpg'),
(14, 'Gran Teatro Geox', 'Via Tassinari, 1', '\\locationImages\\GranTeatroGeox.jpg'),
(15, 'Teatro Ariston', 'Corso Giacomo Matteotti, 212', '\\locationImages\\TeatroAariston.jpg'),
(17, 'Stadio Comunale Lignano Sabbiadoro', 'Viale Europa 144, 33054', '\\locationImages\\StadioComunaleLignanoSabbiadoro.jpg'),
(18, 'Stadio Comunale Bibione ', 'Via Timavo, 10, 30020 ', '\\locationImages\\StadioComunaleBibione.jpg'),
(19, 'Stadio Olimpico Roma', 'Viale dello Stadio Olimpico 1, 00194', '\\locationImages\\StadioOlimpico.jpg'),
(22, 'Teatro Palapartenope', 'Via Barbagallo, 115', '\\locationImages\\TeatroPalapartenope.jpg'),
(23, 'Ippodromo Capannelle', 'Via Appia Nuova. 1255', '\\locationImages\\IppodromoCapannelle.jpg'),
(25, 'Urban Park Milano', 'Novegro, 20090', '\\locationImages\\UrbanParkMilano.jpg'),
(26, 'Arena di Verona', 'Piazza Bra, 1', '\\locationImages\\ArenadiVerona.jpg'),
(27, 'Nelson Mandela Forum ', 'Piazza Enrico Berlinguer', '\\locationImages\\NelsonMandelaForum.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `modalitaconsegna`
--

CREATE TABLE `modalitaconsegna` (
  `IDDelivery` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `Descrizione` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `Prezzo` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `modalitaconsegna`
--

INSERT INTO `modalitaconsegna` (`IDDelivery`, `Nome`, `Descrizione`, `Prezzo`) VALUES
(1, 'Ritiro sul luogo', 'La modalità prevede il ritiro presso la sede dell\'evento', '1.50'),
(2, 'Spedizione', 'La modalità prevede la psedizione presso il domicilio indicato', '10.00'),
(3, 'Stampa a casa', 'La modalità prevede l\'invio attraverso la mail', '2.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `modalitapagamento`
--

CREATE TABLE `modalitapagamento` (
  `IDPayment` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `Descrizione` varchar(100) COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `modalitapagamento`
--

INSERT INTO `modalitapagamento` (`IDPayment`, `Nome`, `Descrizione`) VALUES
(1, 'Carta di Credito', 'La modalità prevede la disponibilità di una carta di credito'),
(2, 'PayPal', 'La modalità è rivolta coloro che possiedo un account PayPal'),
(3, '18APP', 'La modalità è rivolta a colore che possiedono tale funzionaltià');

-- --------------------------------------------------------

--
-- Struttura della tabella `persona`
--

CREATE TABLE `persona` (
  `IDPersona` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `Cognome` varchar(50) COLLATE utf16_bin NOT NULL,
  `CF` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `DataNascita` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `persona`
--

INSERT INTO `persona` (`IDPersona`, `Nome`, `Cognome`, `CF`, `DataNascita`) VALUES
(1, 'Matteo', 'Alesiani', 'LSNMTT97M13L500K', '1997-08-13 00:00:00'),
(2, 'Maurizio', 'Pisciottu', NULL, '1984-06-29 00:00:00'),
(3, 'Marco', 'Mengoni', NULL, '1988-12-25 00:00:00'),
(4, 'Cosimo ', 'Fini', NULL, '1980-12-25 00:00:00'),
(5, 'Carlo Luigi ', 'Coraggio', NULL, '1989-09-23 00:00:00'),
(6, 'Raffaele', 'Gualazzi ', NULL, '1981-11-11 00:00:00'),
(7, 'Tiziano', 'Ferro', NULL, '2020-02-21 00:00:00'),
(8, 'Fabio Bartolo', 'Rizzo', NULL, '1979-05-22 00:00:00'),
(9, 'Simone', 'Paradisi', NULL, '1997-05-05 00:00:00'),
(10, 'Elisa', 'Tito', NULL, '1998-08-23 00:00:00'),
(11, 'Luca', 'Ciaroni', NULL, '1997-03-29 00:00:00'),
(12, 'Michele', 'Di Pumpo', NULL, '1992-05-14 00:00:00'),
(13, 'Adriana', 'Avallone', NULL, '1997-09-20 00:00:00'),
(14, 'Sofia', 'Alesiani', NULL, '1999-04-30 00:00:00'),
(15, 'Massimo ', 'Pezzali', NULL, '2018-11-14 00:00:00'),
(16, 'Cesare', 'Cremonini ', NULL, '1980-03-27 00:00:00'),
(17, 'Ficarra', 'Picore', NULL, NULL),
(18, 'Alberto ', 'Urso', NULL, '1997-07-23 00:00:00'),
(19, 'Il ', 'Volo', NULL, NULL),
(20, 'Angelo', 'Pintus', NULL, '1975-05-21 00:00:00'),
(21, 'Orchestra I', 'Pomeriggi', NULL, NULL),
(22, 'Ennio ', 'Morricone', NULL, '1928-11-10 00:00:00'),
(23, 'Paolo ', 'Conte', NULL, '1937-01-06 00:00:00'),
(24, 'Enrico ', 'Brignano', NULL, '1966-05-18 00:00:00'),
(25, 'Ghali ', 'Amdouni', NULL, '1993-05-21 00:00:00'),
(26, 'Annalisa ', 'Scarrone', NULL, '1985-08-05 00:00:00'),
(27, 'Emma ', 'Marrone', NULL, '1984-05-25 00:00:00'),
(28, 'Alessandro ', 'Mannarino', NULL, '1979-08-23 00:00:00'),
(29, 'Liberato', 'Anonimo', NULL, NULL),
(30, 'Alberto', 'Grosso', NULL, '1997-11-06 00:00:00'),
(31, 'Beatrice', 'Di Francesco', NULL, '1999-02-07 00:00:00'),
(32, 'Matteo', 'Programmatore', NULL, '1997-08-13 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `IDRecensione` int(11) NOT NULL,
  `Matricola` varchar(100) COLLATE utf16_bin NOT NULL,
  `IDAcquisto` int(11) NOT NULL,
  `Recensione` varchar(2000) COLLATE utf16_bin NOT NULL,
  `Recommendation` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`IDRecensione`, `Matricola`, `IDAcquisto`, `Recensione`, `Recommendation`) VALUES
(1, '5-28-3-1', 1, 'Marra ha spaccato tutto!', 4),
(2, '19-81-20-1', 6, 'Ho sempre voluto partecipare ad un suo concerto!!', 3),
(3, '4-23-23-1', 1, 'ottimo spettacolo!', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `segreteriamessaggi`
--

CREATE TABLE `segreteriamessaggi` (
  `IDMessaggio` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `Contenuto` varchar(2000) COLLATE utf16_bin NOT NULL,
  `DataMessaggio` datetime NOT NULL,
  `Lettura` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `segreteriamessaggi`
--

INSERT INTO `segreteriamessaggi` (`IDMessaggio`, `IDUser`, `Contenuto`, `DataMessaggio`, `Lettura`) VALUES
(1, 2, 'Sei stato abilitato dall\'admin.\nPuÃ² ora usufruire di tutti i servizi a tua disposizione.', '2020-05-16 16:29:40', 1),
(2, 1, 'L\'account albertogrosso4@gmail.com ha appena compiuto la registrazione.\nAbilitalo e rendilo subito operativo.', '2020-05-17 16:08:26', 1),
(3, 9, 'Grazie per esserti registrato al nostro servizio.', '2020-05-17 16:08:31', 1),
(4, 1, 'L\'account beatrice.pietro.difrancesco@gmail.com ha appena compiuto la registrazione.\nAbilitalo e rendilo subito operativo.', '2020-05-17 16:33:42', 1),
(5, 10, 'Grazie per esserti registrato al nostro servizio.', '2020-05-17 16:33:45', 1),
(6, 8, 'Sei stato abilitato dall\'admin.\nPuÃ² ora usufruire di tutti i servizi a tua disposizione.', '2020-05-17 16:36:03', 0),
(7, 10, 'Sei stato abilitato dall\'admin.\nPuÃ² ora usufruire di tutti i servizi a tua disposizione.', '2020-05-17 16:36:18', 1),
(8, 9, 'Sei stato abilitato dall\'admin.\nPuÃ² ora usufruire di tutti i servizi a tua disposizione.', '2020-05-17 16:36:28', 1),
(9, 2, 'E\' stata inserita una recensione per un evento da te organizzato.', '2020-05-17 17:00:43', 1),
(10, 4, 'E\' stata inserita una recensione per un evento da te organizzato.', '2020-05-17 18:42:46', 1),
(11, 1, 'L\'account m.alesiani@ienindustrie.com ha appena compiuto la registrazione.\nAbilitalo e rendilo subito operativo.', '2020-06-07 15:09:21', 1),
(12, 11, 'Grazie per esserti registrato al nostro servizio.', '2020-06-07 15:09:27', 1),
(13, 11, 'Sei stato abilitato dall\'admin.\nPuÃ² ora usufruire di tutti i servizi a tua disposizione.', '2020-06-07 15:11:06', 1),
(14, 1, 'Il settore \"Poltronissima\" dell\'evento con titolo\"Paolo Conte PADOVA\" Ã¨ ufficialmente SOLDOUT.\nCONGRATULAZIONI!!!', '2020-06-07 15:49:48', 1),
(15, 7, 'Il settore \"Poltronissima\" dell\'evento con titolo\"Paolo Conte PADOVA\" Ã¨ ufficialmente SOLDOUT.\nCONGRATULAZIONI!!!', '2020-06-07 15:49:51', 1),
(16, 11, 'Ciao m.alesiani@ienindustrie.com,\nIl resoconto del tuo acquisto Ã¨ il seguente:\n1xPaolo Conte PADOVA: 75\n4xSalmo : 253\nTi ringraziamo per aver utilizziato il nostro servizio e ti invitiamo a farci visita di nuovo.\n', '2020-06-07 15:49:54', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `settore`
--

CREATE TABLE `settore` (
  `IDSettore` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `IDLocation` int(11) NOT NULL,
  `Capienza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `settore`
--

INSERT INTO `settore` (`IDSettore`, `Nome`, `IDLocation`, `Capienza`) VALUES
(1, '1 Anello Rosso Numerato', 1, 2428),
(2, '1 Anello Blu Numerato', 1, 2123),
(3, '1 Anello Verde Numerato', 1, 1478),
(4, '2 Anello Rosso Numerato', 1, 1785),
(5, '2 Anello Blu Numerato', 1, 1500),
(6, '2 Anello Verde Numerato', 1, 1354),
(7, '3 Anello Rosso Numerato', 1, 1398),
(8, '3 Anello Blu Numerato', 1, 1178),
(9, '3 Anello Verde Numerato', 1, 934),
(10, 'Prato', 1, 5000),
(11, 'Parterre in Piedi', 2, 3000),
(12, 'Tribuna Gold Numerata', 2, 240),
(13, '1 Anello Numerato', 2, 1487),
(14, '2 Anello Numerato', 2, 1259),
(15, 'Secondo Settore', 2, 986),
(16, 'Parterre in Piedi', 3, 4000),
(17, '1 Anello Est Numerato', 3, 1500),
(18, '1 Anello Ovest Numerato', 3, 1200),
(19, '2 Anello Est Numerato', 3, 1500),
(20, '2 Anello Ovest Numerato', 3, 1200),
(21, 'Gradinata Frontale', 3, 1700),
(22, 'Poltronissima', 4, 100),
(23, 'Poltrona', 4, 120),
(24, 'Prima Galleria', 4, 140),
(25, 'Seconda Galleria ', 4, 160),
(26, 'Terza Galleria', 4, 200),
(27, 'Parterre in Piedi', 5, 5450),
(28, '1 Settore Anello A Numerato', 5, 1450),
(29, '1 Settore Tribuna Gold Numerata', 5, 150),
(30, '1 Settore Anello B Numerato', 5, 1200),
(31, '1 Settore Anello C Frontale Numerato', 5, 900),
(32, '2 Settore Anello B Numerato', 5, 1100),
(33, '2 Settore Anello B Lat. Non Numerato', 5, 800),
(34, 'Posto Unico ', 6, 2750),
(35, 'Platea Bassa', 7, 350),
(36, 'Platea alta Cat 1', 7, 150),
(37, 'Platea alta Cat 2', 7, 150),
(38, '1 Galleria', 7, 100),
(39, '2 Galleria', 7, 75),
(40, 'Platea 1 Settore', 8, 1478),
(41, 'Platea 2 Settore', 8, 460),
(42, 'Prima Galleria 1 Settore', 8, 420),
(43, 'Prima Gall. 1 Set. Balaustra Visibilita\' Ridotta', 8, 140),
(44, 'Prima Galleria 2 Settore', 8, 380),
(45, 'Prima Gall. 2 Set. Balaustra Visibilita\' Ridotta', 8, 245),
(46, 'Seconda Galleria', 8, 480),
(47, 'Galleria Laterale 7', 8, 70),
(48, 'Platea Numerata', 9, 1500),
(49, 'Tribuna Numerata', 9, 500),
(50, 'Cavea Numerata', 9, 300),
(51, 'Cavea Non Numerata', 9, 200),
(52, 'Posto Unico ', 10, 2500),
(53, 'Platea Numerata', 11, 2000),
(54, 'Tribunetta Numerata', 11, 1500),
(55, 'Tribuna Numerata', 11, 1750),
(56, 'Tribuna Alta Numerata', 11, 1100),
(57, '1 Settore', 12, 3000),
(58, '2 Settore', 12, 1500),
(59, '3 Settore', 12, 1000),
(60, 'Balconata', 12, 500),
(61, 'Posto Unico', 13, 4500),
(62, 'Poltronissima', 14, 200),
(63, 'Platea Numerata', 14, 500),
(64, 'Poltrona Primo Livello', 14, 400),
(65, 'Poltrona Secondo Livello', 14, 300),
(66, 'Tribuna Non Numerata', 14, 150),
(67, 'Poltronissima', 15, 150),
(68, 'Poltrona 1 Settore Numerato', 15, 300),
(69, 'Poltrona 2 Settore Numerato', 15, 450),
(70, 'Prima Fila Galleria', 15, 75),
(71, 'Galleria 1 Settore Numerato', 15, 250),
(72, 'Galleria 2 Settore Numerato', 15, 250),
(73, '1 Settore Numerato', 17, 750),
(74, '2 Settore Numerato', 17, 500),
(75, '3 Settore Numerato', 17, 250),
(76, 'Prato', 17, 3000),
(77, 'PIT 1', 18, 200),
(78, 'PIT 2', 18, 100),
(79, 'Prato', 18, 4000),
(80, '1 Settore Numerato', 19, 1248),
(81, '2 Settore Numerato', 19, 1000),
(82, '3 Settore Numerato', 19, 700),
(83, '4 Settore Numerato', 19, 500),
(84, 'Prato', 19, 4000),
(85, 'Parterre in Piedi', 22, 400),
(86, 'Tribuna Numerata', 22, 200),
(87, 'Posto Unico', 23, 3000),
(88, 'Posto Unico', 25, 5000),
(89, 'Platea - Cat 1', 26, 500),
(90, 'Platea - Cat 2', 26, 400),
(91, 'Poltroncina - Cat 1', 26, 500),
(92, 'Poltroncina - Cat 2', 26, 400),
(93, 'Gradinata Numerata Cat 1', 26, 200),
(94, 'Gradinata Numerata Cat 2', 26, 100),
(95, 'Primo Settore Numerato', 27, 500),
(96, 'Secondo Settore Numerato', 27, 500),
(97, 'Terzo Settore Numerato', 27, 50),
(98, 'Parterre In Piedi', 27, 450);

-- --------------------------------------------------------

--
-- Struttura della tabella `tariffario`
--

CREATE TABLE `tariffario` (
  `IDEvento` int(11) NOT NULL,
  `IDSettore` int(11) NOT NULL,
  `IDLocation` int(11) NOT NULL,
  `Prezzounitario` decimal(7,2) DEFAULT NULL,
  `Disponibilita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `tariffario`
--

INSERT INTO `tariffario` (`IDEvento`, `IDSettore`, `IDLocation`, `Prezzounitario`, `Disponibilita`) VALUES
(1, 1, 1, '63.25', 200),
(2, 1, 1, '80.50', 2400),
(17, 1, 1, '69.00', 2400),
(19, 1, 1, '75.00', 2400),
(1, 2, 1, '63.25', 2000),
(2, 2, 1, '60.00', 2100),
(17, 2, 1, '63.20', 2000),
(19, 2, 1, '71.00', 2000),
(1, 3, 1, '63.25', 1000),
(2, 3, 1, '60.00', 1400),
(17, 3, 1, '57.00', 1400),
(19, 3, 1, '71.00', 1400),
(1, 4, 1, '57.50', 1700),
(2, 4, 1, '55.00', 1700),
(17, 4, 1, '52.50', 10),
(19, 4, 1, '65.75', 1700),
(1, 5, 1, '51.50', 500),
(2, 5, 1, '55.00', 1500),
(17, 5, 1, '52.50', 150),
(19, 5, 1, '65.75', 1400),
(1, 6, 1, '46.00', 1300),
(2, 6, 1, '41.40', 1345),
(19, 6, 1, '65.75', 1300),
(1, 7, 1, '40.00', 1000),
(2, 7, 1, '35.00', 1298),
(1, 8, 1, '40.00', 1000),
(1, 9, 1, '40.00', 500),
(17, 9, 1, '40.35', 30),
(1, 10, 1, '50.00', 3000),
(2, 10, 1, '70.10', 4000),
(17, 10, 1, '35.75', 4000),
(19, 10, 1, '35.00', 4000),
(7, 11, 2, '25.00', 2500),
(49, 11, 2, '40.00', 10),
(52, 11, 2, '40.25', 10),
(7, 12, 2, '29.00', 200),
(49, 12, 2, '65.00', 5),
(52, 12, 2, '50.60', 15),
(7, 13, 2, '50.00', 448),
(49, 13, 2, '47.65', 5),
(52, 13, 2, '44.85', 20),
(7, 14, 2, '45.00', 259),
(52, 14, 2, '36.85', 25),
(7, 15, 2, '35.00', 980),
(52, 15, 2, '28.75', 30),
(8, 16, 3, '21.00', 3000),
(48, 16, 3, '40.00', 300),
(8, 17, 3, '35.00', 1500),
(48, 17, 3, '60.00', 100),
(8, 18, 3, '35.00', 1200),
(48, 18, 3, '45.00', 50),
(8, 21, 3, '50.00', 1700),
(48, 21, 3, '30.00', 10),
(23, 22, 4, '75.00', 100),
(23, 23, 4, '50.00', 80),
(23, 24, 4, '25.00', 20),
(3, 27, 5, '40.00', 5000),
(4, 27, 5, '40.00', 5000),
(5, 27, 5, '40.00', 5000),
(6, 27, 5, '40.00', 5000),
(31, 27, 5, '75.00', 50),
(47, 27, 5, '65.00', 15),
(3, 28, 5, '63.00', 150),
(4, 28, 5, '63.00', 150),
(5, 28, 5, '63.00', 150),
(6, 28, 5, '63.00', 150),
(31, 28, 5, '70.00', 50),
(47, 28, 5, '55.00', 20),
(3, 29, 5, '50.80', 50),
(4, 29, 5, '50.80', 50),
(5, 29, 5, '50.80', 50),
(6, 29, 5, '50.80', 50),
(31, 29, 5, '65.00', 50),
(47, 29, 5, '40.00', 20),
(3, 30, 5, '40.60', 1200),
(4, 30, 5, '40.60', 1200),
(5, 30, 5, '40.60', 1200),
(6, 30, 5, '40.60', 1200),
(3, 31, 5, '37.70', 800),
(4, 31, 5, '37.70', 800),
(5, 31, 5, '37.70', 800),
(6, 31, 5, '37.70', 800),
(31, 31, 5, '50.00', 25),
(3, 32, 5, '35.00', 1100),
(4, 32, 5, '35.00', 1100),
(5, 32, 5, '35.00', 1100),
(6, 32, 5, '35.00', 1100),
(31, 32, 5, '35.00', 25),
(3, 33, 5, '29.00', 500),
(4, 33, 5, '29.00', 500),
(5, 33, 5, '29.00', 500),
(6, 33, 5, '29.00', 500),
(47, 33, 5, '35.00', 20),
(28, 35, 7, '65.65', 50),
(41, 35, 7, '69.00', 50),
(42, 35, 7, '69.00', 50),
(28, 36, 7, '55.00', 50),
(41, 36, 7, '46.00', 25),
(42, 36, 7, '46.00', 25),
(28, 38, 7, '35.35', 50),
(41, 38, 7, '34.50', 10),
(42, 38, 7, '34.50', 10),
(27, 40, 8, '75.00', 400),
(27, 41, 8, '72.00', 200),
(27, 42, 8, '72.00', 200),
(27, 43, 8, '65.00', 100),
(27, 44, 8, '60.00', 200),
(27, 45, 8, '52.00', 45),
(27, 46, 8, '45.00', 40),
(27, 47, 8, '45.00', 10),
(22, 48, 9, '75.00', 5),
(24, 48, 9, '75.00', 5),
(25, 48, 9, '75.00', 5),
(26, 48, 9, '56.55', 500),
(29, 48, 9, '52.25', 500),
(32, 48, 9, '59.00', 500),
(22, 49, 9, '50.00', 2),
(24, 49, 9, '50.00', 2),
(25, 49, 9, '50.00', 2),
(26, 49, 9, '43.35', 200),
(29, 49, 9, '43.65', 50),
(32, 49, 9, '49.00', 250),
(22, 50, 9, '25.00', 3),
(24, 50, 9, '25.00', 3),
(25, 50, 9, '25.00', 3),
(26, 50, 9, '35.45', 100),
(29, 50, 9, '35.95', 30),
(32, 50, 9, '45.00', 200),
(35, 57, 12, '23.50', 300),
(36, 57, 12, '15.00', 200),
(37, 57, 12, '49.00', 200),
(35, 58, 12, '18.00', 200),
(37, 58, 12, '36.00', 200),
(37, 59, 12, '28.00', 300),
(35, 60, 12, '14.00', 50),
(37, 60, 12, '22.00', 100),
(43, 61, 13, '39.10', 400),
(44, 61, 13, '39.10', 400),
(45, 61, 13, '39.10', 400),
(46, 61, 13, '35.00', 200),
(39, 62, 14, '75.00', 5),
(39, 66, 14, '45.00', 5),
(33, 67, 15, '35.00', 50),
(38, 67, 15, '75.00', 5),
(33, 68, 15, '30.00', 20),
(38, 68, 15, '50.00', 3),
(33, 70, 15, '30.00', 10),
(38, 70, 15, '35.00', 2),
(33, 71, 15, '25.00', 5),
(11, 73, 17, '80.60', 700),
(18, 73, 17, '57.00', 750),
(11, 74, 17, '70.00', 200),
(18, 74, 17, '51.75', 400),
(18, 75, 17, '56.00', 200),
(11, 76, 17, '50.40', 2000),
(18, 76, 17, '50.00', 2000),
(9, 77, 18, '57.50', 200),
(16, 77, 18, '57.50', 150),
(16, 78, 18, '46.00', 100),
(9, 79, 18, '30.40', 400),
(16, 79, 18, '34.75', 3000),
(10, 80, 19, '79.90', 700),
(20, 80, 19, '65.25', 100),
(10, 81, 19, '59.40', 500),
(20, 81, 19, '51.75', 100),
(10, 82, 19, '43.70', 500),
(10, 84, 19, '50.00', 3000),
(20, 84, 19, '54.75', 100),
(51, 85, 22, '40.25', 5),
(51, 86, 22, '50.60', 5),
(12, 87, 23, '35.00', 2000),
(15, 88, 25, '30.05', 500),
(21, 89, 26, '75.55', 100),
(30, 89, 26, '65.35', 50),
(40, 89, 26, '92.00', 200),
(50, 89, 26, '75.00', 5),
(21, 91, 26, '55.00', 50),
(30, 91, 26, '45.65', 50),
(40, 91, 26, '69.00', 200),
(50, 91, 26, '55.00', 5),
(21, 93, 26, '35.00', 25),
(30, 93, 26, '25.35', 50),
(40, 93, 26, '46.00', 200),
(50, 93, 26, '35.00', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `ticketuser`
--

CREATE TABLE `ticketuser` (
  `IDUser` int(11) NOT NULL,
  `AnagraficaUtente` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf16_bin NOT NULL,
  `Password` varchar(200) COLLATE utf16_bin NOT NULL,
  `DataRegistrazione` datetime NOT NULL,
  `AccountAbilitato` tinyint(1) DEFAULT '0',
  `IDAccesso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `ticketuser`
--

INSERT INTO `ticketuser` (`IDUser`, `AnagraficaUtente`, `Email`, `Password`, `DataRegistrazione`, `AccountAbilitato`, `IDAccesso`) VALUES
(1, 1, 'teo.alesiani@outlook.it', '95744509d1237562e30e0ecfb17359a6c7039f36', '2020-01-23 00:00:00', 1, 1),
(2, 1, 'teo97.alesiani@gmail.com', '9ab7a46642e3b133690e2ec1dd8ddc72a00f1ba7', '2020-01-26 00:00:00', 1, 2),
(3, 9, 'simoneparadisi97@gmail.com', '6f532cec83a8d87721f598e8d28b74697ff6d340', '2020-03-30 00:02:06', 1, 3),
(4, 10, 'eli.tito2398@gmail.com', '7060ebc6c3348189030891c4b20f47d18f1fe1a6', '2020-03-30 00:05:33', 1, 2),
(5, 11, 'luca.ciaroni97@gmail.com', '842e9cb1b825f61cad286c23e871458327f4902b', '2020-03-30 00:07:47', 0, 3),
(6, 12, 'micheledipumpo93@gmail.com', '763bac07c105b69706b6b8be4c51c098ae5627f8', '2020-03-30 00:09:38', 0, 3),
(7, 13, 'adriana.avallone97@gmail.com', 'a7c734afe6043bbc196616e28af4ffaf1f7444ea', '2020-03-30 00:10:26', 1, 2),
(8, 14, 'sofia.alesiani@gmail.com', '625ee0fa5be10c425406b9bda9d59badef4f2913', '2020-05-01 15:42:12', 1, 3),
(9, 30, 'albertogrosso4@gmail.com', '7b32af1fab4550fedd36021007d712bb049e40f7', '2020-05-17 16:08:26', 1, 2),
(10, 31, 'beatrice.pietro.difrancesco@gmail.com', 'e2dd40ace62fee249f75d27c7b81e830b08f0f54', '2020-05-17 16:33:42', 1, 3),
(11, 32, 'm.alesiani@ienindustrie.com', '997c6d0a4251fd7bdaa4fffcfe7e07df514a65fa', '2020-06-07 15:09:21', 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipologia`
--

CREATE TABLE `tipologia` (
  `IDTipologia` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `tipologia`
--

INSERT INTO `tipologia` (`IDTipologia`, `Nome`) VALUES
(1, 'Concerto'),
(3, 'Mostre, Musei e Fiere'),
(4, 'Teatro'),
(5, 'Altre Manifestazioni');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipologiaaccesso`
--

CREATE TABLE `tipologiaaccesso` (
  `IDAccesso` int(11) NOT NULL,
  `Descrizione` varchar(50) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dump dei dati per la tabella `tipologiaaccesso`
--

INSERT INTO `tipologiaaccesso` (`IDAccesso`, `Descrizione`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'User');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquisto`
--
ALTER TABLE `acquisto`
  ADD PRIMARY KEY (`IDAcquisto`),
  ADD KEY `FK_PagamentoAcquisto` (`IDPayment`),
  ADD KEY `FK_ConsegnaAcquisto` (`IDDelivery`),
  ADD KEY `FK_Acquirente` (`IDUser`);

--
-- Indici per le tabelle `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`IDArtista`),
  ADD KEY `FK_referenteArtista` (`IDReferente`),
  ADD KEY `FK_ArtistaAnagrafe` (`AnagraficaArtista`);

--
-- Indici per le tabelle `biglietto`
--
ALTER TABLE `biglietto`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `FK_SettoreBiglietto` (`IDSettore`,`IDLocation`,`IDEvento`);

--
-- Indici per le tabelle `bigliettoacquistato`
--
ALTER TABLE `bigliettoacquistato`
  ADD PRIMARY KEY (`Matricola`,`IDAcquisto`),
  ADD KEY `FK_AcquistoManager` (`IDAcquisto`);

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IDEvento`),
  ADD KEY `FK_EventoOrg` (`IDOrganizzatore`),
  ADD KEY `FK_EventoArt` (`IDArtista`),
  ADD KEY `FK_EventoLoc` (`IDLocation`),
  ADD KEY `FK_EventoTipo` (`IDGenere`);

--
-- Indici per le tabelle `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`IDGenere`),
  ADD KEY `FK_tipologiaGenere` (`IDTipologia`);

--
-- Indici per le tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`IDLocation`);

--
-- Indici per le tabelle `modalitaconsegna`
--
ALTER TABLE `modalitaconsegna`
  ADD PRIMARY KEY (`IDDelivery`);

--
-- Indici per le tabelle `modalitapagamento`
--
ALTER TABLE `modalitapagamento`
  ADD PRIMARY KEY (`IDPayment`);

--
-- Indici per le tabelle `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IDPersona`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`IDRecensione`),
  ADD KEY `FK_RecensioneBiglAcqu` (`Matricola`,`IDAcquisto`);

--
-- Indici per le tabelle `segreteriamessaggi`
--
ALTER TABLE `segreteriamessaggi`
  ADD PRIMARY KEY (`IDMessaggio`),
  ADD KEY `FK_MessaggioUser` (`IDUser`);

--
-- Indici per le tabelle `settore`
--
ALTER TABLE `settore`
  ADD PRIMARY KEY (`IDSettore`,`IDLocation`),
  ADD KEY `FK_SettoreLoc` (`IDLocation`);

--
-- Indici per le tabelle `tariffario`
--
ALTER TABLE `tariffario`
  ADD PRIMARY KEY (`IDSettore`,`IDLocation`,`IDEvento`),
  ADD KEY `FK_tariffaEvento` (`IDEvento`);

--
-- Indici per le tabelle `ticketuser`
--
ALTER TABLE `ticketuser`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `FK_UserCredenziali` (`IDAccesso`),
  ADD KEY `FK_UserAnagrafe` (`AnagraficaUtente`);

--
-- Indici per le tabelle `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`IDTipologia`);

--
-- Indici per le tabelle `tipologiaaccesso`
--
ALTER TABLE `tipologiaaccesso`
  ADD PRIMARY KEY (`IDAccesso`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquisto`
--
ALTER TABLE `acquisto`
  MODIFY `IDAcquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `artista`
--
ALTER TABLE `artista`
  MODIFY `IDArtista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `evento`
--
ALTER TABLE `evento`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `genere`
--
ALTER TABLE `genere`
  MODIFY `IDGenere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `location`
--
ALTER TABLE `location`
  MODIFY `IDLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `modalitaconsegna`
--
ALTER TABLE `modalitaconsegna`
  MODIFY `IDDelivery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `modalitapagamento`
--
ALTER TABLE `modalitapagamento`
  MODIFY `IDPayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `persona`
--
ALTER TABLE `persona`
  MODIFY `IDPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `IDRecensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `segreteriamessaggi`
--
ALTER TABLE `segreteriamessaggi`
  MODIFY `IDMessaggio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `settore`
--
ALTER TABLE `settore`
  MODIFY `IDSettore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT per la tabella `ticketuser`
--
ALTER TABLE `ticketuser`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `IDTipologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `tipologiaaccesso`
--
ALTER TABLE `tipologiaaccesso`
  MODIFY `IDAccesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquisto`
--
ALTER TABLE `acquisto`
  ADD CONSTRAINT `FK_Acquirente` FOREIGN KEY (`IDUser`) REFERENCES `ticketuser` (`IDUser`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ConsegnaAcquisto` FOREIGN KEY (`IDDelivery`) REFERENCES `modalitaconsegna` (`IDDelivery`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PagamentoAcquisto` FOREIGN KEY (`IDPayment`) REFERENCES `modalitapagamento` (`IDPayment`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `FK_ArtistaAnagrafe` FOREIGN KEY (`AnagraficaArtista`) REFERENCES `persona` (`IDPersona`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_referenteArtista` FOREIGN KEY (`IDReferente`) REFERENCES `ticketuser` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `biglietto`
--
ALTER TABLE `biglietto`
  ADD CONSTRAINT `FK_SettoreBiglietto` FOREIGN KEY (`IDSettore`,`IDLocation`,`IDEvento`) REFERENCES `tariffario` (`IDSettore`, `IDLocation`, `IDEvento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `bigliettoacquistato`
--
ALTER TABLE `bigliettoacquistato`
  ADD CONSTRAINT `FK_AcquistoManager` FOREIGN KEY (`IDAcquisto`) REFERENCES `acquisto` (`IDAcquisto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MatricolaAcquisto` FOREIGN KEY (`Matricola`) REFERENCES `biglietto` (`Matricola`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_EventoArt` FOREIGN KEY (`IDArtista`) REFERENCES `artista` (`IDArtista`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EventoLoc` FOREIGN KEY (`IDLocation`) REFERENCES `location` (`IDLocation`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EventoOrg` FOREIGN KEY (`IDOrganizzatore`) REFERENCES `ticketuser` (`IDUser`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EventoTipo` FOREIGN KEY (`IDGenere`) REFERENCES `genere` (`IDGenere`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `genere`
--
ALTER TABLE `genere`
  ADD CONSTRAINT `FK_tipologiaGenere` FOREIGN KEY (`IDTipologia`) REFERENCES `tipologia` (`IDTipologia`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `FK_RecensioneBiglAcqu` FOREIGN KEY (`Matricola`,`IDAcquisto`) REFERENCES `bigliettoacquistato` (`Matricola`, `IDAcquisto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `segreteriamessaggi`
--
ALTER TABLE `segreteriamessaggi`
  ADD CONSTRAINT `FK_MessaggioUser` FOREIGN KEY (`IDUser`) REFERENCES `ticketuser` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `settore`
--
ALTER TABLE `settore`
  ADD CONSTRAINT `FK_SettoreLoc` FOREIGN KEY (`IDLocation`) REFERENCES `location` (`IDLocation`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `tariffario`
--
ALTER TABLE `tariffario`
  ADD CONSTRAINT `FK_Eventotariffa` FOREIGN KEY (`IDSettore`,`IDLocation`) REFERENCES `settore` (`IDSettore`, `IDLocation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tariffaEvento` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ticketuser`
--
ALTER TABLE `ticketuser`
  ADD CONSTRAINT `FK_UserAnagrafe` FOREIGN KEY (`AnagraficaUtente`) REFERENCES `persona` (`IDPersona`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserCredenziali` FOREIGN KEY (`IDAccesso`) REFERENCES `tipologiaaccesso` (`IDAccesso`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
