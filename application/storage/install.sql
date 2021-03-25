create table brand
(
    id           varchar(50)  not null
        constraint brand_pk
            primary key,
    long_name    varchar(255) not null,
    short_name   varchar(255) not null,
    description  text         not null,
    note         varchar(255) not null,
    img_src_path text         not null
);

create unique index brand_id_uindex
    on brand (id);

create table image
(
    id             integer      not null
        constraint image_pk
            primary key autoincrement,
    brand          varchar(50)  not null
        references brand
            on update cascade on delete cascade,
    name           varchar(50)  not null,
    description    text         not null,
    image_src_path varchar(255) not null
);

create unique index image_id_uindex
    on image (id);

create table model
(
    id              integer
        constraint model_pk
            primary key autoincrement,
    brand           varchar(255) not null
        references brand
            on update cascade on delete cascade,
    title           varchar(50)  not null,
    subtitle        varchar(50),
    description     text         not null,
    creation_method varchar(255) not null,
    model_x3d_path  varchar(255) not null,
    model_x3d_title varchar(50)  not null
);

create unique index model_id_uindex
    on model (id);

create table strings
(
    key   varchar(255) not null
        constraint strings_pk
            primary key,
    value text         not null
);

create unique index strings_key_uindex
    on strings (key);

