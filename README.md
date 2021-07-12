Необходимо реализовать 1 страничный сайт.<br>
На этой странице должна выводиться таблица c данными из таблицы action. Должна быть возможность<br>
фильтрации данных по:<br>
<ul>
    <li> 1) дате создания - должна быть возможность указывать промежуток времени</li>
    <li> 2) sale_id - должна быть возможность указать несколько значений</li>
    <li> 3) статусу - должна быть возможность выбрать значения из списка (могут быть значения "На проверке", "Подтверждено", "Отклонено")</li>
    <li> 4) subid1-subid5 - возможность указать тип subid и несколько значений (например, тип - subid1 и значения 123, 456, tre, lorem)
          Значениями полей sale_id и subid1-subid5 могут быть буквенно-цифровые наборы</li>
</ul>

 /** SQL **/
 <code>
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


create table subid<br>
(<br>
    id      int auto_increment primary key,<br>
    pub_id  int          not null,<br>
    keyword varchar(255) not null,<br>
    type    tinyint(1)   not null<br>
)<br>
    collate = utf8_unicode_ci;<br>

<br>
  Связи таблиц:<br>
  action.subid1 => subid.id (type = 1)<br>
  action.subid2 => subid.id (type = 2)<br>
  action.subid3 => subid.id (type = 3)<br>
  action.subid4 => subid.id (type = 4)<br>
  action.subid5 => subid.id (type = 5)<br>
 <br>
</code>
SQL таблицы должны заполняться фейковыми данными через консольную команду<br>
 /** SQL **/
