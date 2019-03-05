# LX MVC 

These is a simple MVC.
# Examples

## public
public access index: https://leandroximenes.000webhostapp.com/<br/>
public access example: https://leandroximenes.000webhostapp.com/contato<br/>
public access 404: https://leandroximenes.000webhostapp.com/sdfsdf<br/>


## Admin
public access admin: https://leandroximenes.000webhostapp.com/admin<br/>
email: leandroj.r.ximenes@gmail.com<br/>
senha: 123456<br/>

## Simple

This is a very simple [MVC][mvc-pattern] structure, it contains Bootstrap, jQuery and Ajax.
There is auth module and user register.

## Files tree

```bash

LXMVC
├── application
│   ├── control
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── CrudController.php
│   │   ├── ExampleController.php
│   │   ├── MainController.php
│   │   ├── PublicController.php
│   │   └── UsuarioController.php
│   ├── model
│   │   ├── DAO
│   │   │   ├── DAO.php
│   │   │   ├── example.php
│   │   │   └── usuarios.php
│   │   ├── conexao.php
│   │   ├── funcoes.php
│   │   ├── my_setting.ini
│   │   └── sql
│   └── views
│       ├── home
│       │   ├── 404.php
│       │   └── index.php
│       ├── login
│       │   └── index.php
│       ├── usuario
│       │   ├── alterarSenha.php
│       │   ├── editar.php
│       │   ├── index.php
│       │   └── novov.php
│       ├── example
│       │   ├── editar.php
│       │   ├── index.php
│       │   └── novov.php
│       ├── ViewModel.php
│       ├── layout.php
├── public
|    ├── css
│    ├── js
│    ├── 404.php
│    ├── contato.php
│    ├── index.php
|    └── layout.php
├── util
|    └── Util.php
├── .gitignore
├── .htaccess
├── config.php
├── index.php
└── loader.php

```
## Add new CRUD
1- Create new table
CREATE TABLE `controle`.`student` (
  `id` INT NOT NULL AUTOINCREMENT,
  `hash_id` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `ativo` SMALLINT(1) NULL,
  PRIMARY KEY (`id`));

2- clone "ExampleController.php", rename file to "StudentController.php" and change class name and parameters
3- clone model/DAO/"example.php", and rename to "student.php" and change class name keeping only constructor.
4- clone folder view/"example" and rename to "student"
5- Make the changes in the "new" and edit "pages"
6(Optional)- Change menu "view/layout.php"

## License

LX MVC Examples is open source software licensed. 
