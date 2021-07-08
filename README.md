Необходимо реализовать 1 страничный сайт.
На этой странице должна выводиться таблица c данными из таблицы action. Должна быть возможность
фильтрации данных по:
 1) дате создания - должна быть возможность указывать промежуток времени
 2) sale_id - должна быть возможность указать несколько значений
 3) статусу - должна быть возможность выбрать значения из списка (могут быть значения "На проверке", "Подтверждено", "Отклонено")
 4) subid1-subid5 - возможность указать тип subid и несколько значений (например, тип - subid1 и значения 123, 456, tre, lorem)
 Значениями полей sale_id и subid1-subid5 могут быть буквенно-цифровые наборы

 /** SQL **/
create table action
(
    id                    int auto_increment primary key,
    tid                   bigint                                   not null,
    sale_id               varchar(255)                             null,
    status                tinyint(1)     default 0                 not null,
    pub_id                int                                      not null,
    date_created          timestamp      default CURRENT_TIMESTAMP not null,
    date_closed           timestamp                                null,
    subid1                int                                      null,
    subid2                int                                      null,
    subid3                int                                      null,
    subid4                int                                      null,
    subid5                int                                      null
)
    charset = utf8;

create index date
    on action (date_created);

create unique index sale
    on action (sale_id);

create unique index tid
    on action (tid);

create table subid
(
    id      int auto_increment primary key,
    pub_id  int          not null,
    keyword varchar(255) not null,
    type    tinyint(1)   not null
)
    collate = utf8_unicode_ci;

/**
  Связи таблиц:
  action.subid1 => subid.id (type = 1)
  action.subid2 => subid.id (type = 2)
  action.subid3 => subid.id (type = 3)
  action.subid4 => subid.id (type = 4)
  action.subid5 => subid.id (type = 5)
 */

SQL таблицы должны заполняться фейковыми данными через консольную команду
 /** SQL **/
