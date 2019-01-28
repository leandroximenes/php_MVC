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

## Simples

É um modelo muito simples de estrutrua de MVC. Contém Bootstrap, jQuery e Ajax.
Há um módulo de login e registro de usuário.

```bash

LXMVC
├── application
│   ├── control
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── CrudController.php
│   │   ├── MainController.php
│   │   ├── PublicController.php
│   │   └── UsuarioController.php
│   ├── model
│   │   ├── DAO
│   │   │   └── usuarios.php
│   │   ├── conexao.php
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
│       ├── ViewModel.php
│       ├── layout.php
├── public
|    ├── css
│    ├── js
│    ├── 404.php
│    ├── index.php
|    └── layout.php
├── util
|    └── Util.php
├── config.php
├── index.php
└── loader.php

```


## License

LX MVC Examples is open source software licensed. 
