<?php

require_once 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{

    public $conexiones = [];

    function onOpen(\Ratchet\ConnectionInterface $conn)
    {
        echo 'Ay una nueva conexion';
        foreach ($this->conexiones as $conexion){
            /** @var Ratchet\ConnectionInterface $conexion */
            $conexion->send("Se ah conectado un nuevo usuario");
        }
        $this->conexiones[] = $conn;
    }

    function onClose(\Ratchet\ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param \Ratchet\ConnectionInterface $conn
     * @param \Exception $e
     * @throws \Exception
     */
    function onError(\Ratchet\ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    /**
     * Triggered when a client sends data through the socket
     * @param \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
     * @param string $msg The message received
     * @throws \Exception
     */
    function onMessage(\Ratchet\ConnectionInterface $from, $msg)
    {
        foreach ($this->conexiones as $conexion):
            if ($conexion !== $from):
                $conexion->send($msg);
            endif;
            endforeach;
    }
 }