best query:
 select tankLevel from logs where loraDevEui='9C65F9FFFE7F7395' and created_at=(select max(created_at)from logs where loraDevEui='9C65F9FFFE7F7395');
select loraDevEui, tankLevel, tankLevels from logs,logs_actuel  where loraDevEui=macAdresse and created_at=(select max(created_at)from logs where loraDevEui=macAdresse);
CREATE TABLE clients (clientId varchar(10) not null,
prenom varchar(100) not null,
nom varchar(100)not null ,
addresse varchar(250) not null,
courriel varchar(100) not null,
telephone varchar (15)not null,
PRIMARY KEY(clientId),
UNIQUE(courriel,telephone)
);
CREATE TABLE silo(siloId varchar(20) not null,
	nom varchar(50)not null,
	contenu varchar(50) not null,
	marque varchar(50)not null,
	type varchar(50)not null,
	modele varchar(50)not null,
	numeroSerie varchar(50)not null,
	hauteurCylindre decimal(10,3) not null,
	diametreCylindre decimal (10,3) not null,
	hauteurCone decimal (10,3) not null,
	penteCone decimal (10,3) not null,
    hauteurGlobal decimal (10,3) not null,
    capacite decimal (10,3) not null,
    clientId varchar(10) not null,
    PRIMARY KEY(siloId),
    FOREIGN KEY (clientId) REFERENCES clients(clientId) ON DELETE CASCADE
    );
INSERT INTO silo_info( siloId,nom,contenu,marque,type,modele,numeroSerie,hauteurCylindre,diametreCylindre,hauteurCone,penteCone,hauteurGlobal,capacite,clientId) 
    VALUES('00test','test','test','test','test','test','test','122','123.23','12.903','2553.9000','73.45','700000','0012345');

CREATE TABLE capteur (macAdresse varchar(100)not null,
 capteurMarque  varchar(100) not null,
 capteurModele varchar(100)not null,
 capteurType varchar(100)not null,
 fai varchar(100)not null,
 lot varchar(100)not null,
 initialiseLe date not null,
 clientId varchar(10)not null,
 initialisepar varchar(100)not null,
 siloId varchar(20)not null,
 PRIMARY KEY(macAdresse),
 UNIQUE(siloId),
  FOREIGN KEY(siloId) REFERENCES silo_info(siloId) ON DELETE CASCADE,
  FOREIGN KEY(clientId) REFERENCES clients(clientId) ON DELETE CASCADE
);
select
    concat(table_name, '.', column_name) as 'foreign key',  
    concat(referenced_table_name, '.', referenced_column_name) as 'references'
from
    information_schema.key_column_usage
where
    referenced_table_name is not null;
 4507795816@vmobile.ca
select * from logs where  loraDevEui='9C65F9FFFE4CC328' and created_at BETWEEN '2018-10-24%' and '2018-10-29%' order by created_at desc limit $nombre;
select * from logs where  loraDevEui='9C65F9FFFE4CC328' and created_at BETWEEN '2018-10-24%' and '2018-10-29%' order by created_at desc limi 3;

    select loraDevEui,count(*) from logs group by loraDevEui;
$query =select * from logs where  loraDevEui='9C65F9FFFE38D80F' and created_at BETWEEN '$2018-10-14%' and '$2018-10-14%' ;
INSERT INTO capteur(macAdresse,capteurMarque,capteurModele,capteurType,fai,lot,initialiseLe,clientId,initialisepar,siloId) 
    VALUES('9C65F9FFFE058CF6','Test','test','test','Test','test','2018-08-30','001234 ','Eric','001AB');

    INSERT INTO silo_info
         (siloId,nom,contenu,numeroSerie,hauteurCylindre,diametreCylindre,hauteurCone,densite,clientId,capteur_mac_adresse,
            volDucylindre ,volDucone,volTotale,hauDuSilo,capacite,cylindre,cone ) 
  VALUES('siloid','nom','contenu','serie',21,12,12,70,'166641','9C65F9FFFE554FFA',12.2,12.0,12.0,
  12.0,12.0,12.0,12);

    CREATE TABLE logs_actuel (
    ids  int(10) unsigned not null,
    version varchar(50) not null,
    macAdresse varchar(50) not null,
    loraPacketSequenceNumbers varchar(50) not null,
    packetTimestamps  varchar(50) not null,
    deviceSerialNumbers varchar(50) not null,
    tankLevels int(10) unsigned  not null,
    batteryVoltages int(10) unsigned not null,
    temperatures int(10) unsigned not null,
    rawPayloadBytess varchar(100)  not null,
    created_ats timestamp  not null,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(macAdresse)
    );

SELECT 
    *
FROM
    information_schema.triggers
WHERE
    trigger_schema = 'silo'
        AND trigger_name = 'transfer_logs';
 DELIMITER $$
CREATE TRIGGER transfer_logs 
AFTER INSERT ON logs FOR EACH ROW 
BEGIN if new.loraDevEui not in (select macAdresse from logs_actuel ) THEN
INSERT INTO logs_actuel 
(ids,version,macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,created_ats)
Values (new.id,new.version,new.loraDevEui,new.loraPacketSequenceNumber, new.packetTimestamp,new.deviceSerialNumber,new.tankLevel,new.batteryVoltage,new.temperature,new.rawPayloadBytes,new.created_at);
else
   UPDATE logs_actuel set ids=new.id,
   version=new.version,
   loraPacketSequenceNumbers = new.loraPacketSequenceNumber,
   packetTimestamps=new.packetTimestamp,
   deviceSerialNumbers = new.deviceSerialNumber, 
   tankLevels = new.tankLevel,
   batteryVoltages = new.batteryVoltage, 
    temperatures = new.temperature, 
    rawPayloadBytess = new.rawPayloadBytes, 
     created_ats = new.created_at where macAdresse = new.loraDevEui;
  END IF;   
END$$
DELIMITER;


DELIMITER $$
CREATE TRIGGER transfer_logs 
AFTER INSERT ON logs FOR EACH ROW 
BEGIN 
INSERT INTO capteur_data (macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids,created_ats)
Values (new.loraDevEui, new.loraPacketSequenceNumber, new.packetTimestamp,new.deviceSerialNumber,new.tankLevel,new.batteryVoltage,new.temperature,new.rawPayloadBytes,new.id,new.created_at);
END$$
DELIMITER ;

INSERT INTO capteur_data(version,macAdresse,loraPacketSequenceNumbers,packetTimestamps ,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids) 
VALUES('1','eurur','lora','packettime','devicesn',1,1,2,'rawpay',12);


while($carow = mysqli_fetch_array($caresults)){
		if($mac == $carow["macAdresse"]){
			$updateQuery ="UPDATE capteur_data set version='$version',loraPacketSequenceNumbers ='$lora',packetTimestamps ='$packettime',deviceSerialNumbers ='$devicesn',tankLevels ='$tank',batteryVoltages='$battery',temperatures='$temp',rawPayloadBytess='$rawpay',ids='$id' where macAdresse='$mac'";
			$updateResults = mysqli_query($con;$updateQuery);
		}
	}
 $sql="INSERT INTO capteur_data( version,macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids) 
    VALUES('$version','$mac','$lora','$packettime','$devicesn','$tank','$battery','$temp','$rawpay','$id')";
$myresults = mysqli_query($con,$sql);

else{
    	$sql="INSERT INTO capteur_data( version,macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids,created_ats) 
    VALUES('$version','$mac','$lora','$packettime','$devicesn','$tank','$battery','$temp','$rawpay','$id','$created')";
$myresults = mysqli_query($con,$sql);
    }
    /* Query to find information about clients; */
select prenom,silo_info.nom ,capteur_data.macAdresse as Capteur ,tankLevels,batteryVoltages,temperatures 
from clients,capteur_data,silo_info where silo_info.clientId=clients.clientId and silo_info.capteur_mac_adresse = capteur_data.macAdresse;
select distinct loraDevEui in(
select * from logs where  created_at like '%2019-02-11%');

select * from logs where  loraDevEui='9C65F9FFFE71EEF6' and created_at like '%2018-09-06%';
select * from  logs where (created_at between '2018-09-06 13:47:26' and '2018-09-06 14:49:11') and loraDevEui='9C65F9FFFE71EEF6';

 select * from logs where  loraDevEui='9C65F9FFFE71EEF6' and created_at like '%2018-09-06%' <> created_at like '%2018-09-06%';

select * from  logs where (created_at between created_at like '%2018-09-06%' and created_at like '%2018-09-06%') and loraDevEui='9C65F9FFFE71EEF6';

select * from  logs where (created_at between '2018-09-06' and '2018-09-06') and loraDevEui='9C65F9FFFE71EEF6';

select * from logs where  created_at between created_at like '%2018-09-06%' and  created_at like '%2018-09-10%';
select * from logs where  id between 100 and 110;
select * from logs where loraDevEui='9C65F9FFFE264EFE' and created_at > like '%2018-09-09%';
SELECT * FROM logs WHERE created_at BETWEEN '2018-09-09%' and '2018-09-11%' and loraDevEui='9C65F9FFFE264EFE';

select 
 insert into countries (country_name) Values (Rwanda);
insert into states (state_name, country_id) Values ('South',1);desc 
    insert into cities (city_name, state_id) Values ('Butare',1);


select * from logs_actuel where created_ats BETWEEN like'%2019-02-26%' and like '%2019-02-27%';

select macAdresse,count(*) from logs_actuel where created_ats between '2019-02-10' and '2019-02-14'  group by macAdresse;
    delete from logs_actuel where created_ats between '2018-02-11' and '2018-12-31';
 create table city ( cid int not null, cname varchar(50) not null, coid int(10) unsigned not null, foreign key(coid) 
  references country(coid), primary key(cid));


select loraDevEui,count(*) from logs where created_at like'%2019-03-27%' group by loraDevEui;
