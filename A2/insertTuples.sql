INSERT INTO `Clients652` (`clientCity652`, `dollarsOnOrder652`, `clientStatus652`, `clientName652`, `clientCompPassword652`, `moneyOwed652`) VALUES ('Halifax','10','alive','Frank McGuy','password123','0');
INSERT INTO `Parts652` (`partDescription652`, `QoH652`, `partName652`, `currentPrice652`) VALUES ('a red toy car','10', 'Cool Car', '10.02');
INSERT INTO `Parts652` (`partDescription652`, `QoH652`, `partName652`, `currentPrice652`) VALUES ('metal cylinder', '5', 'Tube', '3.0');
INSERT INTO `Parts652` (`partDescription652`, `QoH652`, `partName652`, `currentPrice652`) VALUES ('6 mm wide screw', '12', 'Screw', '1.23');
INSERT INTO `PO652` (`datePO652`, `status652`, `Clients652_clientId652`) VALUES (STR_TO_DATE("10-17-2021", "%m-%d-%Y"),'waiting for delivery','1');
INSERT INTO `Lines652` (`lineNO652`,`numOfUnits652`, `linePrice652`, `PO652_poNO652`, `Parts652_partNo652`) VALUES ('1','2','10.02','1','1');