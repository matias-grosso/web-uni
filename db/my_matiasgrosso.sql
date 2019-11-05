-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 20, 2015 alle 17:37
-- Versione del server: 5.1.71-community-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_matiasgrosso`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accesso_manager`
--

CREATE TABLE IF NOT EXISTS `accesso_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `accesso_manager`
--

INSERT INTO `accesso_manager` (`id`, `user`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struttura della tabella `bio`
--

CREATE TABLE IF NOT EXISTS `bio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `bio`
--

INSERT INTO `bio` (`id`, `data`, `testo_it`, `testo_en`, `img`) VALUES
(1, '2015-05-03 08:09:18', '<p>\r\nHa studiato ingegneria elettrica e informatica presso la Technische Universit&aumlt M&uumlnchen (TUM), ricevendo la laurea da ingegnere nel 1998. Dopo un periodo di ricerca presso l''Universit&agrave di Notre Dame, entra a far parte dell&#39Institute of Communication Networks presso la TUM guidato da J&oumlrg Ebersp&aumlcher, dove &egrave stato un membro del gruppo di ricerca ed insegnante fino al 2003. Ha ricevuto il Dr.-Ing. laurea con lode da TUM nel 2004 con una tesi sulla modellistica di mobilit&agrave, connettivit&agrave e clustering adattivo in reti wireless ad hoc. Prima di diventare un professore, &egrave stato ricercatore senior presso DOCOMO Euro-Labs dal 2003 fino al 2005.\r\n</p>\r\n<p>\r\nHa pubblicato circa 30 articoli su riviste e libri, e pi&ugrave di 80 pubblicazioni su atti di convegni peer-reviewed. Due pubblicazioni hanno ricevuto i migliori riconoscimenti di carta dalla IEEE Vehicular Tecnologia Society, e un altro premio documento d&#39eccellenza nel 2004 dal tedesco Informationstechnische Gesellschaft (ITG). &Egrave anche co-autore dei libri di testo "Wiley GSM - Architettura, protocolli e servizi." L&#39attuale h-index di Schilcher, essendo una misura per la visibilit&agrave delle pubblicazioni, &egrave 34 (basato su Google Scholar). Tre documenti ricevuto pi&ugrave di 800 citazioni. Schilcher ha servito come redattore per ACM Mobile Computing and Communications Review e membro del comitato di diverse conferenze. Ha servito come presidente TPC del International Workshop on Self-Organizing Systems del 2011, membro del comitato organizzativo di ACM MobiCom 2005 e membro del consiglio direttivo del programma Minema 2006-2009, finanziato dal Fondo sociale europeo.\r\n</p>', '<p>He studied electrical and computer engineering at Technische Universit&aumlt M&uumlnchen (TUM), receiving the Dipl.-Ing. degree in 1998. After a research stay at the University of Notre Dame, he joined the Institute of Communication Networks at TUM lead by J&oumlrg Ebersp&aumlcher, where he was a research and teaching staff member until 2003. He received the Dr.-Ing. degree with summa cum laude from TUM in 2004 with a dissertation on mobility modeling, connectivity, and adaptive clustering in wireless ad hoc networks. Before becoming a professor, he was a senior researcher at DOCOMO Euro-Labs from 2003 until 2005.</p>\r\n<p>\r\nThe publication record includes about 30 articles in journals, magazines, and books, and over 80 papers in peer-reviewed conference proceedings. Two publications received best paper awards from the IEEE Vehicular Technology Society, and another one the 2004 outstanding paper award from the German Informationstechnische Gesellschaft (ITG). He also co-authored the Wiley textbook &quotGSM - Architecture, protocols and services.&quot Schilcher&#39s current h-index, being a measure for the visibility of publications, is 34 (based on Google Scholar). Three papers received more than 800 citations.\r\nSchilcherhas served as editor for ACM Mobile Computing and Communications Review and committee member of several conferences. He served as TPC chair of the 2011 International Workshop on Self-Organizing Systems, organizational committee member of ACM MobiCom 2005, and steering board member of the ESF-funded program MiNEMA from 2006 to 2009. \r\n</p>\r\n', 'img-bio.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `extrabio`
--

CREATE TABLE IF NOT EXISTS `extrabio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nome_it` varchar(255) NOT NULL,
  `nome_en` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `extrabio`
--

INSERT INTO `extrabio` (`id`, `data`, `tipo`, `nome_it`, `nome_en`, `periodo`, `testo_it`, `testo_en`) VALUES
(5, '0000-00-00 00:00:00', '2', 'Esperto in telecomunicazioni', 'Telecommunications expert', '', '<p>\r\nHa studiato ingegneria elettrica e informatica presso la Technische Universit&aumlt M&uumlnchen (TUM), ricevendo la laurea da ingegnere nel 1998. Dopo un soggiorno di ricerca presso l''Universit&agrave di Notre Dame, entra a far parte dell''Istituto di reti di comunicazione a TUM guidato da J&oumlrg Ebersp&aumlcher, dove &egrave stato un membro del personale di ricerca ed insegnante fino al 2003. Ha ricevuto il Dr.-Ing. laurea con lode da TUM nel 2004 con una tesi sulla modellistica di mobilit&agrave, connettivit&agrave e clustering adattivo in reti wireless ad hoc.\r\n</p>\r\n', '<p>He studied electrical and computer engineering at Technische Universit&aumlt M&uumlnchen (TUM), receiving the Dipl.-Ing. degree in 1998. After a research stay at the University of Notre Dame, he joined the Institute of Communication Networks at TUM lead by J&oumlrg Ebersp&aumlcher, where he was a research and teaching staff member until 2003. He received the Dr.-Ing. degree with summa cum laude from TUM in 2004 with a dissertation on mobility modeling, connectivity, and adaptive clustering in wireless ad hoc networks.</p>\r\n'),
(6, '2014-09-04 15:09:34', '1', 'Ricerca ed insegnamento', 'Research and teaching', '2000 - 2003', '<p>\r\nRicercatore ed insegnante presso l&#39Istituto di Reti di Comunicazione all&#39Universit&agrave di Tecnologia di Monaco.</p>\r\n', '<p>Research and teaching staff member at the Institute of Communication Networks at the Munich University of Technology</p>\r\n'),
(7, '2014-09-04 15:09:34', '1', 'Senior researcher ', 'Senior researcher ', '2003 - 2005', '<p>Senior researcher at DOCOMO Euro-Labs</p>\r\n', '<p>Senior researcher at DOCOMO Euro-Labs</p>\r\n'),
(8, '0000-00-00 00:00:00', '3', 'Interference Dynamics in Wireless Networks', 'Interference Dynamics in Wireless Networks', '2009 - now', '<p>Interferenza in reti wireless si verifica se la trasmissione da un mittente ad un ricevitore &egrave disturbato da ulteriori dispositivi che trasmettono in prossimit&agrave del ricevitore. Le interferenze possono provocare il fallimento della trasmissione, perdendo cosi dell&#39informazione.</p>\r\n', '<p>Interference in wireless networks occurs if the transmission from a sender to a receiver is disturbed by additional devices transmitting in the vicinity of the receiver. Interference may cause transmissions to fail and sent information to be lost.</p>\r\n'),
(9, '0000-00-00 00:00:00', '3', 'Cooperative Relaying in Wireless Networks', 'Cooperative Relaying in Wireless Networks', '2009 - now', '<p>\r\nCooperative relaying &egrave una tecnica innovativa per le comunicazioni wireless che promettono guadagni di produttivit&agrave ed efficienza energetica. L&#39idea di base &egrave semplice: un dispositivo trasmette un segnale dati a una destinazione. Un terzo dispositivo ritrasmette questa informazione al destinatario. Infine, il destinatario combina i due segnali ricevuti per migliorare la decodifica.\r\n</p>\r\n', '<p>Cooperative relaying is a novel technique for wireless communications promising gains in throughput and energy efficiency. The basic idea sounds simple: A device transmits a data signal to a destination. A third device overhears this transmission and relays the signal to the destination as well. Finally, the destination combines the two received signals to improve decoding.</p>\r\n'),
(10, '0000-00-00 00:00:00', '3', 'Self-Organizing Synchronization', 'Self-Organizing Synchronization', '2009 - now', '<p>\r\nIl lampeggio sincrono di lucciole &egrave un esempio spettacolare di auto-organizzazione in natura. Migliaia di lucciole si riuniscono in alberi e lampeggiano all&#39unisono con un meccanismo distribuito che pu&ograve essere compreso mediante l&#39applicazione della teoria degli oscillatori accoppiati discreti. Questa teoria &egrave stata utilizzata con successo per modellare molti fenomeni di sincronizzazione e coordinamento, come i cicli del sonno, sparando dei neuroni, e le vibrazioni di ponti.\r\n</p>\r\n', '<p>The synchronous flashing of fireflies is a spectacular example for self-organization in nature. Thousands of fireflies gather in trees and flash in unison using a distributed mechanism that can be understood by applying the theory of discrete coupled oscillators. This theory has successfully been used for modeling many synchronization and coordination phenomena, such as sleep cycles, firing of neurons, and vibration of bridges.</p>\r\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `posizione_it` text NOT NULL,
  `posizione_en` text NOT NULL,
  `mappa` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `home`
--

INSERT INTO `home` (`id`, `data`, `testo_it`, `testo_en`, `img`, `posizione_it`, `posizione_en`, `mappa`, `facebook`, `facebook_link`, `twitter`, `twitter_link`, `mail`, `phone`) VALUES
(1, '2015-03-27 16:08:16', '<p>\r\nAndreas Schilcher &egrave professore e direttore dell''Istituto Networked and Embedded Systems presso l''Universit&agrave di Klagenfurt. &Egrave inoltre direttore scientifico e fondatore di Lakeside Labs GmbH, una societ&agrave di ricerca e di innovazione incentrata su  self-organizing networked systems con applicazioni nel settore delle telecomunicazioni, reti di sensori e robotica mobile, tra cui UAV.\r\n</p>\r\n<p>\r\nI progetti in corso riguardano cooperative relaying  ed interferenze nelle reti wireless, la sincronizzazione di auto-organizzazione, e le comunicazioni e il coordinamento di robot volanti. Prof. Schilcher insegna nel corso magistrale di Electricity and Magnetism, Mobile Communication, Wireless Networks e seminari multidisciplinari sulle reti di calcolatori.\r\n</p>\r\n<p>\r\nE ''stato revisore di progetto per la European Commission and national science in Germania, Svizzera e Paesi Bassi, ed &egrave stata costantemente impegnata nella gestione e amministrazione della sua universit&agrave.\r\n</p>', '<p>Andreas Schilcher is professor and head of the Institute of Networked and Embedded Systems at the University of Klagenfurt. He is also scientific director and founder of Lakeside Labs GmbH, a research and innovation company focussing on self-organizing networked systems with application to telecommunications, sensor networks, and mobile robotics including UAVs.</p>\r\n\r\n<p>Current projects address cooperative relaying and interference dynamics in wireless networks, self-organizing synchronization, and communications and coordination of flying robots. The teaching portfolio comprises an undergraduate lecture on electricity and magnetism, two graduate lectures on mobile communications and networking, and multidisciplinary seminars on networks.</p>\r\n<p>He has been project reviewer for the European Commission and national science funds in Germany, Switzerland, and the Netherlands, and has been continuously engaged in the management and administration of his university.\r\n</p>\r\n', 'img-profilo.jpg', '<p>Dr. Andreas Schilcher <br />\r\n<br />\r\nDepartment of Networked and Embedded Systems<br />\r\nLakeside Park B04b, Level 1<br />\r\n<br />\r\nUniversit&aumltsstrasse 65<br />\r\n<br />\r\n9020 Klagenfurt, Austria</p>\r\n', '<p>Dr. Andreas Schilcher <br />\r\n<br />\r\nDepartment of Networked and Embedded Systems<br />\r\nLakeside Park B04b, Level 1<br />\r\n<br />\r\nUniversit&aumltsstrasse 65<br />\r\n<br />\r\n9020 Klagenfurt, Austria</p>\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2740.508651685586!2d14.264943899999986!3d46.6167124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4770746bc02f6953%3A0xd784c148719ee9ad!2sUniversity+of+Klagenfurt!5e0!3m2!1sit!2sfr!4v143202462204', 'Dottor Schilcher', 'https://www.facebook.com/uniklagenfurt?fref=ts', '@drSchilcher', 'https://twitter.com/Schilcher/', 'andreas.schilcher@lakeside-labs.com', '+43 463 2800 3841');

-- --------------------------------------------------------

--
-- Struttura della tabella `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `nome_prof` varchar(255) NOT NULL,
  `nome_uni` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_it` text NOT NULL,
  `footer_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `info`
--

INSERT INTO `info` (`id`, `data`, `nome_prof`, `nome_uni`, `favicon`, `footer_it`, `footer_en`) VALUES
(1, '2014-09-03 15:09:15', 'Dr. Schilcher', 'Alpen-Adria Universit&aumlt', '', '<p>&copy;&nbsp;2015 Dr. Andreas Schilcher. Tutti i diritti riservati.</p>\r\n', '<p>&copy;&nbsp;2015 Dr. Andreas Schilcher. All rights reserved.</p>\r\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `materiale`
--

CREATE TABLE IF NOT EXISTS `materiale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `nome` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `titolo_it` varchar(255) NOT NULL,
  `titolo_en` varchar(255) NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `data`, `titolo_it`, `titolo_en`, `testo_it`, `testo_en`) VALUES
(3, '2015-06-13 09:00:00', 'Open Lab 2015', 'Open Lab 2015', '<p> \r\nL''Istituto di Networked and Embedded Systems e Lakeside Labs hanno aperto i loro laboratori al pubblico il 11 marzo, dove circa 120 ospiti hanno partecipato a progetti di ricerca su sistemi mobili, pervasive computing, sistemi auto-organizzati, sistemi multimediali e intelligente reti energetiche.\r\nUna presentazione fatta da Andreas Schilcher ha aperto la manifestazione. Egli ha delineato i risultati e gli obiettivi di entrambe le istituzioni e ha dato una panoramica delle dimostrazioni di laboratorio.\r\n\r\n</p>\r\n', '<p> The Institute of Networked and Embedded Systems and Lakeside Labs opened their laboratories to the public on March 11. About 120 visitors informed themselves and discussed about ongoing research in the domains of mobile systems, pervasive computing, self-organizing systems, multimedia systems, and smart energy grids.\r\nA presentation given by Andreas Schilcher opened the event. He outlined the achievements and goals of both institutes and gave an overview of the laboratory demonstrations.</p>'),
(4, '2015-06-19 09:00:00', 'Research day on multi-UAV systems', 'Research day on multi-UAV systems', '<p>Robot autonomamente volanti - chiamati anche piccoli Unmanned Aerial Vehicles (UAV) - sono sempre pi&ugrave sfruttati nelle applicazioni civili e commerciali per la sorveglianza ed il monitoraggio di catastrofi. Per alcune applicazioni, &egrave vantaggioso se una squadra di UAV coordinato, anzich&eacute un singolo UAV &egrave impiegato. Pi&ugrave UAV possono coprire una determinata area pi&ugrave veloce o scattare foto da prospettive diverse allo stesso tempo. Questa tecnologia emergente &egrave ancora in una fase iniziale e, di conseguenza, sono necessari sforzi di ricerca e sviluppo profondi.</p>', '<p>Autonomously flying robots - also called small-scale unmanned aerial vehicles (UAVs) - are more and more exploited in civil and commercial applications for monitoring, surveillance, and disaster response. For some applications, it is beneficial if a team of coordinated UAVs rather than a single UAV is employed. Multiple UAVs can cover a given area faster or take photos from different perspectives at the same time. This emerging technology is still at an early stage and, consequently, profound research and development efforts are needed.</p>');

-- --------------------------------------------------------

--
-- Struttura della tabella `pub`
--

CREATE TABLE IF NOT EXISTS `pub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `pub`
--

INSERT INTO `pub` (`id`, `data`, `tipo`, `titolo`, `extra`, `pdf`, `testo_it`, `testo_en`, `link`) VALUES
(10, '2014-08-21 01:08:59', '2', 'Self-Organizing Systems', 'Andreas Schilcher and Carlos Gershenson', 'lib1.pdf', '', 'This book constitutes the refereed proceedings of the International Workshop on Self-Organizing Systems (IWSOS) held in Karlsruhe, Germany, in February 2011. The nine revised full papers presented together with one invited paper were carefully selected from 25 initial submissions. It was the 5th workshop in a series of multidisciplinary events dedicated to self-organization in networked systems with main focus on communication and computer networks. The papers address theoretical aspects of self-organization as well as applications in communication and computer networks and robot networks.', 'http://www.amazon.it/Self-Organizing-Systems-International-Karlsruhe-Proceedings/dp/B0068I0ZQC/ref=sr_1_2?ie=UTF8&qid=1432029798&sr=8-2&keywords=Self-Organizing+Systems'),
(11, '2014-08-21 01:08:59', '2', 'GSM - Architecture, Protocols, and Services', ' J&oumlrg Ebersp&aumlcher, Hans-J&oumlrg V&oumlgel, Christian Bettstetter, and Christian Hartmann', '', 'da trad', 'GSM is the world’s most commonly used technology for wireless communication. Taking an instructive approach to the topic, this book gives special emphasis to system architecture and protocol aspects, ranging from addressing concepts through mobility management to network management. The fully updated, third edition of the book is both an introductory textbook for graduate students as well as a reference resource for telecommunications engineers and researchers. Special features include a detailed chapter on the General Packet Radio Service (GPRS) as well as descriptions of EDGE and multimedia messaging (MMS).', 'http://www.amazon.it/Gsm-Architecture-Protocols-Jorg-Eberspacher/dp/0470030704/ref=sr_1_1?ie=UTF8&qid=1432029824&sr=8-1&keywords=GSM+-+Architecture%2C+Protocols%2C+and+Services'),
(9, '2014-08-21 01:08:59', '2', 'Towards 4G Technologies: Services with Initiative', 'Hendrik Berndt', 'lib1.pdf', '', 'This book provides a comprehensive explanation of future networking and service delivering technologies for next generation mobile systems. The authors explain how personalization, mobile middleware, peer-to-peer services, semantic computing, and content-awareness fit into this new concept and why they will become a necessity for future mobile services. The book presents the latest challenges and opportunities of next generation mobile systems, explaining new paradigms of service provisioning that include flexible and adaptable services. The book is intended for telecoms engineers in R&D departments, CTOs, and telecoms managers as well as academic researchers in electrical, electronic engineering, and telecommunications.\r\n\r\nThe chapter Mobile Communication Networks (Chapter 2, pp. 17-50) was written by Christian Prehofer, Christian Bettstetter, and Jörg Widmer. It explains current wireless technologies and networking techniques at a glance and describes recent trends in next-generation IP-based networks, ad hoc networking, and programmable networks.', 'http://www.amazon.it/Towards-4G-Technologies-Services-Initiative/dp/0470010312/ref=sr_1_1?ie=UTF8&qid=1432029841&sr=8-1&keywords=Towards+4G+Technologies%3A+Services+with+Initiative'),
(6, '2015-02-04 18:09:53', '1', 'Cooperative Relay Scheme Having Backward Compatibility', 'Helmut Adam, Wilfried Elmenreich, and Christian Bettstetter', 'pubb1.pdf', '<p>In uno schema di relay, un trasmettitore wireless, un apparato di ricezione senza fili e un apparato di relay senza fili collaborano per la gestione di errori di trasmissione da canali con diversit&agrave spazio / temporali. Cos&igrave, per un buon SNR (Signal to Noise Ratio) tra sorgente e destinazione, il protocollo inventivo ha prestazioni simili ad un approccio standard. In caso di fallimento nella trasmissione, una trasmissione con diversit&agrave spaziale &egrave ottenuta con l&#39utilizzo di un trasmettitore relay. Questo dispositivo relay verr&agrave attivato solo in caso di debole qualit&agrave del segnale tra il mittente e il destinatario. Per questo specifico caso &egrave stato creato un protocollo orientato alla comunicazione cooperativa con relay.</p>\r\n', '<p>In a relay scheme, a wireless source apparatus, a wireless destination apparatus and a wireless relay apparatus cooperate for handling transmission failures by space/time diverse channels. In the case of the successful direct transmission, reduced or no additional overhead for the relay selection is incurred. Thus, for a good SNR between source and destination, the inventive protocol has similar performance as a standard approach. In the case of a transmission failure e.g., due to small scale fading, a transmission via different communication paths implementing spatial diversity via a selected relay is supported. The device is to only activate the overhearing of signals in case of weak signal quality between sender and receiver. This selection of relay devices is done of demand only.; A specific protocol for the reservation of the wireless medium for the entire cooperative communication has been specified.</p>\r\n', ''),
(7, '2015-02-04 18:09:53', '1', 'Adaptive Forwarding System Operable in a Repeater and a Router Mode.', 'Christian Prehofer, Andreas Schilcher, and Gerhard Bauch.', 'pub2.pdf', '<p>\r\nUn trasmettitore di dati attraverso una rete di comunicazione ad un ricevitore comprende un mittente (107) essendo configurato per essere collocato in una modalit&agrave di ripetitore per ripetere il segnale dati, o per essere collocato in una modalit&agrave router per instradare il segnale dati, e un controllore (109) essendo configurato per ricevere informazioni di controllo e dell&#39immissione inoltro (107) nella modalit&agrave ripetitore o in modalit&agrave router in funzione delle informazioni di controllo. Pertanto, possono essere create reti di comunicazione flessibili.\r\n</p>\r\n', '<p>An apparatus for transmitting a data signal over a communication network to a receiver comprises a forwarder (107) being configured to be placed into a repeater mode for repeating the data signal, or to be placed into a router mode for routing the data signal, and a controller (109) being configured for receiving control information and for placing the forwarder (107) in the repeater mode or in the router mode in dependence on the control information. Therefore, flexible communication networks can be provided.</p>\r\n', ''),
(8, '2015-02-04 18:09:53', '1', 'Apparatus and Method for Synchronizing Transmitter and Receiver.', 'Gunther Auer, Alexander Tyrrell, and Christian Bettstetter.', 'pub3.pdf', '<p>\r\nApparecchiatura per la sincronizzazione di un primo dispositivo di trasmissione o ricezione di un secondo dispositivo di trasmissione o ricezione, in cui detto apparato comprende un ricevitore (110) realizzato per ricevere e rilevare un segnale di sincronismo (140) da detta seconda trasmissione o un dispositivo di ricezione e un trasmettitore (130) atto per trasmettere un segnale di sincronizzazione (140). L&#39apparecchiatura comprende inoltre una unit&agrave di elaborazione (120), che viene realizzato per aumentare un valore di segnale interno che in un primo stato di controllo associato ad un periodo di ascolto, e decidere se ripetere questo periodo ascolto. Per comandare questo trasmettitore (130) per trasmettere il segnale di sincronismo (140) in un secondo stato di controllo associato ad un periodo di trasmissione, e di decidere sulla base di questo periodo variabile se ripetere o meno(162).\r\n</p>\r\n', '<p>An apparatus for synchronizing a first transmit or receive device to a second transmit or receive device is described, wherein said apparatus comprises a receiver (110) implemented to receive and detect a synchronization signal (140) from said second transmit or receive device and a transmitter (130) implemented to transmit a synchronization signal (140).; The apparatus further comprises a processing unit (120), which is implemented to increase an internal signal value being in a first control state associated to a listening period, and to decide whether to repeat said listening period based on a period variable when the internal signal value equals a given threshold value, or to control said transmitter (130) to transmit said synchronization signal (140) in a second control state associated to a transmitting period, and to decide based on said period variable (next) whether to repeat said transmitting period (162) being in a third control state (190) associated to said transmitting period (162), when a receiver waiting time associated to said third control state is over.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `tea`
--

CREATE TABLE IF NOT EXISTS `tea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `anno` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `testo_it` text NOT NULL,
  `testo_en` text NOT NULL,
  `orari` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dump dei dati per la tabella `tea`
--

INSERT INTO `tea` (`id`, `data`, `anno`, `nome`, `testo_it`, `testo_en`, `orari`) VALUES
(7, '2014-08-22 01:08:55', '2012/2013', 'Electricity and Magnetism', 'Questo corso copre elettrostaticit&agrave, corrente elettrica, compi magnetici, elettromagnetismo ed onde elettromagnetiche. Le lezioni prevedono esperimenti in classe e saranno date in lingua tedesca.', 'This undergraduate course covers the fundamentals of &quotElectricity and Magnetism&quot. Contents includes electrostatics, electric current, magnetic field, electromagnetic induction, and electromagnetic waves. Lectures are supplemented by in-class experiments and tutorials. The textbook &quotPhysics for Scientists and Engineers&quot and video lectures are recommended to students to deepen the topics discussed in class. The course is given in German language.', '12-16'),
(13, '2014-08-22 01:08:55', '2014/2015', 'Mobile Communications', 'Antenne; propagazione radio; diversit&agrave; codifica di canale e modulazione; accesso multiplo e concetto di cellula; protocollo MAC; wireless LAN 802.11.', 'Antennas; radio propagation; diversity; channel coding and modulation; multiple access and cellular concept; MAC protocols; wireless LAN 802.11.', '12-16'),
(14, '2014-08-22 01:08:55', '2014/2015', 'Wireless Networks', 'Architettura di rete a protocolli di mobilit&agrave; reti LTE; sicurezza in reti mobili; reti ad hoc; economia, salute e aspetti sociali.', 'Network architecture and mobility protocols; LTE networks; security in mobile networks; ad hoc networks; economic, health, and social aspects.', '12-16'),
(8, '2014-08-22 01:08:55', '2013/2014', 'Electricity and Magnetism', 'Questo corso copre elettrostaticit&agrave, corrente elettrica, compi magnetici, elettromagnetismo ed onde elettromagnetiche. Le lezioni prevedono esperimenti in classe e saranno date in lingua tedesca.', 'This undergraduate course covers the fundamentals of &quotElectricity and Magnetism&quot. Contents includes electrostatics, electric current, magnetic field, electromagnetic induction, and electromagnetic waves. Lectures are supplemented by in-class experiments and tutorials. The textbook &quotPhysics for Scientists and Engineers&quot and video lectures are recommended to students to deepen the topics discussed in class. The course is given in German language.', '12-16'),
(9, '2014-08-22 01:08:55', '2014/2015', 'Electricity and Magnetism', 'Questo corso copre elettrostaticit&agrave, corrente elettrica, compi magnetici, elettromagnetismo ed onde elettromagnetiche. Le lezioni prevedono esperimenti in classe e saranno date in lingua tedesca.', 'This undergraduate course covers the fundamentals of &quotElectricity and Magnetism&quot. Contents includes electrostatics, electric current, magnetic field, electromagnetic induction, and electromagnetic waves. Lectures are supplemented by in-class experiments and tutorials. The textbook &quotPhysics for Scientists and Engineers&quot and video lectures are recommended to students to deepen the topics discussed in class. The course is given in German language.', '12-16'),
(10, '2014-08-22 01:08:55', '2013/2014', 'Mobile Communications', 'Antenne; propagazione radio; diversit&agrave; codifica di canale e modulazione; accesso multiplo e concetto di cellula; protocollo MAC; wireless LAN 802.11.', 'Antennas; radio propagation; diversity; channel coding and modulation; multiple access and cellular concept; MAC protocols; wireless LAN 802.11.', '12-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
