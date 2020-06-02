create database pos_app_2020;
use pos_app_2020;

drop TABLE USER;
CREATE TABLE USER(
    id_user int not null primary key auto_increment,
    username varchar(50) not null,
    email VARCHAR(40) not null,
    password VARCHAR(50),
    level enum('1','2','3','4'),
    is_active TINYINT default 0,
    pegawai_id int not null,
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);

ALTER TABLE USER ADD FOREIGN KEY (pegawai_id) REFERENCES pegawai(id_pegawai);

CREATE TABLE supplier(
    id_supplier int not null primary key auto_increment,
    nama_supplier varchar(100),
    no_telp int(15),
    alamat varchar(250),
    deskripsi text, 
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);

CREATE TABLE kategori(
    id_kategori int not null primary key auto_increment,
    nama_kategori varchar(100),
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);

CREATE TABLE barang(
    id_barang int not null PRIMARY KEY auto_increment,
    barcode_barang VARCHAR(300),
    nama_barang VARCHAR(100), 
    harga_barang int,
    kemasan_barang VARCHAR(50),
    stock_barang int(20),
    kategori_id int not null,
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);
ALTER TABLE barang ADD FOREIGN KEY (kategori_id) REFERENCES kategori(id_kategori);

CREATE TABLE pegawai(
    id_pegawai int not null PRIMARY KEY auto_increment,
    nama_pegawai VARCHAR(50),
    alamat_pegawai text,
    jenis_kelamin enum('L','P'),
    no_telp int(12),
    jabatan varchar(30),
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);

CREATE TABLE stocks(
    id_stock int not null PRIMARY KEY auto_increment,
    type enum('In', 'Out'),
    detail varchar(200),
    jumlah int(15),
    tanggal DATE,
    barang_id INT not null,
    supplier_id INT not null,
    user_id INT not null,
    created_at timestamp not null default now(),
    updated_at timestamp not null default now() on update now()
);
ALTER TABLE stocks ADD FOREIGN KEY (barang_id) REFERENCES barang(id_barang);
ALTER TABLE stocks ADD FOREIGN KEY (supplier_id) REFERENCES supplier(id_supplier);
ALTER TABLE stocks ADD FOREIGN KEY (user_id) REFERENCES user(id_user);