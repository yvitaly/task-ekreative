<?php

const USER_PDO = 'root';
const  PASSWORD_PDO = '';
const ROLE_ADMIN = 'admin';
const ROLE_USER = 'user';
function connect ()
{
    return new PDO('mysql:host=localhost;dbname=ekreative-db', USER_PDO, PASSWORD_PDO);
}