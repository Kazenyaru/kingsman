create database `kingsman`;
use `kingsman`;
create table `catalog_kingsman` (
  id_cat bigint(20) primary key not null,
  category varchar(30),
  nama_cat varchar(50),
  gambar varchar(191),
  harga varchar(255),
  ukuran enum("s", "m", "l", "xl", "xxl", "xxxl"),
  tahun year,
  designer bigint(20)
);

create table `user` (
  id_user bigint(20) primary key not null,
  nama_user varchar(30),
  password varchar(191),
  profpict varchar(191),
  role enum("user", "admin", "designer")
);

alter table `catalog_kingsman` add constraint fk_catalog FOREIGN KEY (`designer`) REFERENCES `user` (`id_user`);


