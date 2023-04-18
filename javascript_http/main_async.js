//è la mia applicazione principale
//prendo la cassetta degli attrezzi, chiamo tutti i pezzi che servono
//import è analogo a un require di php
//è la mia applicazione principale
//prendo la cassetta degli attrezzi, chiamo tutti i pezzi che servono
//import è analogo a un require di php

//VERSIONE2
import { getUser } from "./UserService.js";
import { UsersTable, UsersList } from "./RenderView.js";

const users = await getUser();

//console.log(users);

//coincidono con index
UsersTable(users, "lista_utenti2");
UsersList(users, "lista_utenti");
