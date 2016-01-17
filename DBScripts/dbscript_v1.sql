create table feedback (id int(10) primary key auto_increment, name varchar(50), phone varchar(20), mail varchar(100), company varchar(100), message varchar(1000));

create table areaofinterest (id int(10), aoi int(2), FOREIGN KEY fk_id(id) references feedback(id) on update cascade on delete cascade);

create table areaofInterestMap (aoi int, details varchar(100));
insert into areaofInterestMap values (1, "ECOMMERCE");
insert into areaofInterestMap values (2, "BIGDATA");
insert into areaofInterestMap values (3, "MOBILE");
insert into areaofInterestMap values (4, "BI");
insert into areaofInterestMap values (5, "LBS");
insert into areaofInterestMap values (6, "OTHRES");

alter table feedback add (type varchar(20));