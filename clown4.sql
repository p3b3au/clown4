
use clown4;

insert into clown values ("0","bertille", "1", "0", "1","#9DC953"),
("0","diva", "1", "0", "0","#EBC2E6"),
("0","frotti", "1", "1", "0","#A87438"),
("0","gustina", "1", "0", "1","#9E5BC8"),
("0","hopopop", "1", "1", "0","#6ACDCD"),
("0","josiane", "1", "0", "1","#A44237"),
("0","knup", "1", "1", "1","#37862D"),
("0","kristin", "1", "0", "1","#C6C95E"),
("0","motsa", "1", "1", "0","#304491"),
("0","patrick", "1", "1", "1","#C4804F"),
("0","petunia", "1", "0", "0","#6ECF86"),
("0","pirgo", "1", "1", "0","#143D3C"),
("0","popiette", "1", "0", "1","#501B3B"),
("0","pyrus", "1", "1", "0","#8C8E2F"),
("0","zoe", "1", "0", "1","#D79288");



insert into lieu (lieu) values ('AAAA'), ('BBBB'), ('CCCC'), ('DDDD'), ('EEEE'), ('FFFF'), ('GGGG'), ('HHHH'), ('IIII'), ('JJJJ');



INSERT INTO `interv` (`dateheure`,`lieu_id`,`statut`)
VALUES
  ("2032/02/04",4,3),
  ("2032/01/19",6,3),
  ("2032/09/27",3,3),
  ("2032/09/17",8,3),
  ("2032/05/11",7,3),
  ("2032/11/28",5,3),
  ("2032/04/03",2,3),
  ("2032/08/22",7,3),
  ("2032/06/03",10,3),
  ("2032/12/20",7,3);
  
  
  
  ("2021/08/31",12,9,5,0),
  ("2021/05/11",7,1,3,1),
  ("2021/10/06",11,6,4,1),
  ("2021/05/15",5,4,2,1),
  ("2022/02/26",6,10,4,0),
  ("2021/05/16",12,5,2,2),
  ("2021/06/01",15,8,10,1),
  ("2021/08/05",9,7,3,0),
  ("2021/08/12",9,6,1,2),
  ("2022/01/28",14,15,7,0),
  ("2021/09/12",6,2,8,1),
  ("2021/06/19",12,10,5,0),
  ("2021/07/15",11,14,8,2),
  ("2021/06/06",13,3,1,1),
  ("2022/01/13",3,7,10,1);
INSERT INTO `interv` (`dateheure`,`clown_a_id`,`clown_b_id`,`lieu_id`,`statut`)
VALUES
  ("2022/03/29",6,9,9,2),
  ("2022/03/25",14,10,2,0),
  ("2022/04/05",12,13,2,2),
  ("2021/11/22",10,9,6,2),
  ("2022/04/29",6,14,6,0),
  ("2022/03/04",8,5,8,1),
  ("2022/01/16",5,7,8,1),
  ("2021/09/04",15,12,3,2),
  ("2021/11/17",12,13,10,0),
  ("2022/04/25",10,11,1,1),
  ("2021/10/27",13,2,7,0),
  ("2021/05/10",11,8,8,0),
  ("2021/07/14",4,6,6,1),
  ("2022/03/03",7,6,10,2),
  ("2021/08/26",2,15,10,1),
  ("2022/04/20",12,5,4,2),
  ("2022/03/19",10,13,6,0),
  ("2022/02/06",8,13,7,1),
  ("2021/09/03",1,9,1,1),
  ("2022/01/08",9,3,9,1),
  ("2022/02/05",15,8,6,1),
  ("2022/04/26",13,10,5,0),
  ("2021/12/18",4,10,4,1),
  ("2021/08/12",13,4,2,1),
  ("2022/03/18",6,1,10,1);
INSERT INTO `interv` (`dateheure`,`clown_a_id`,`clown_b_id`,`lieu_id`,`statut`)
VALUES
  ("2021/11/03",8,14,4,1),
  ("2022/02/27",8,10,4,1),
  ("2021/11/23",8,12,9,1),
  ("2021/07/25",12,5,2,1),
  ("2021/08/12",4,5,10,2),
  ("2021/06/11",13,1,4,1),
  ("2021/08/10",14,9,4,0),
  ("2021/12/16",1,12,10,2),
  ("2021/10/20",2,13,4,1),
  ("2021/06/03",4,2,9,0),
  ("2022/03/22",11,8,7,1),
  ("2021/12/25",14,2,2,2),
  ("2021/06/24",7,11,4,1),
  ("2021/10/11",2,3,9,1),
  ("2021/06/04",12,14,8,0),
  ("2021/09/29",8,13,5,2),
  ("2022/04/03",12,11,2,1),
  ("2021/08/14",9,3,5,1),
  ("2021/06/20",6,8,3,1),
  ("2021/07/25",5,3,10,1),
  ("2021/12/28",7,3,5,1),
  ("2022/02/03",4,6,1,0),
  ("2021/11/21",11,1,4,2),
  ("2021/12/28",11,6,2,1),
  ("2021/12/14",4,10,5,1);
INSERT INTO `interv` (`dateheure`,`clown_a_id`,`clown_b_id`,`lieu_id`,`statut`)
VALUES
  ("2021/12/06",7,12,6,1),
  ("2022/01/03",14,3,8,1),
  ("2022/04/16",7,6,5,1),
  ("2021/10/25",8,10,9,1),
  ("2022/01/08",2,3,4,1),
  ("2022/04/20",13,4,2,0),
  ("2021/11/11",1,3,2,1),
  ("2021/06/06",13,14,9,1),
  ("2021/08/31",10,4,5,1),
  ("2022/02/18",7,8,3,1),
  ("2021/09/23",14,3,4,2),
  ("2022/02/09",6,10,5,2),
  ("2021/07/03",12,6,5,0),
  ("2021/12/07",3,12,6,1),
  ("2021/07/06",15,13,3,1),
  ("2022/03/18",6,11,5,1),
  ("2021/08/24",13,10,8,1),
  ("2022/03/08",8,11,4,2),
  ("2021/05/29",1,11,4,1),
  ("2021/09/24",5,9,3,1),
  ("2021/12/11",5,12,6,2),
  ("2021/12/24",13,3,2,2),
  ("2021/10/23",4,1,8,1),
  ("2022/04/05",5,14,1,2),
  ("2022/04/15",10,14,4,1);

