<?php

namespace Controllers;

class UserController
{
    protected $db;

    public function __construct($app)
    {
        $this->db = $app->getContainer()->get('db');

        $app->get('/lists',[$this, 'lists']);
        $app->get('/lists/{id}',[$this, 'listsDetail']);
    }

    
    public function lists($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM users");
        $sth->execute();
        return $response->withJson(["response" => $sth->fetchObject()]);
    }

    public function listsDetail($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        return $response->withJson(["response" => $sth->fetchObject()]);
    }
}
