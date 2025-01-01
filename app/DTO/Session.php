<?php

namespace app\DTO;

/**
 * Description of Session
 *
 * @author Jonathan
 */
class Session {
    
    private $id;
    private $idUsuario;
    private $fechaInicio;
    private $fechaCierre;
    private $token;
    private $estado;
    private $agente;
    private $ipCliente;

      
    public function getId() {
        return $this->id;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaCierre() {
        return $this->fechaCierre;
    }

    public function getToken() {
        return $this->token;
    }

    public function getIpCliente() {
        return $this->ipCliente;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setFechaInicio($fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaCierre($fechaCierre): void {
        $this->fechaCierre = $fechaCierre;
    }

    public function setToken($token): void {
        $this->token = $token;
    }

    public function setIpCliente($ipCliente): void {
        $this->ipCliente = $ipCliente;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }
    public function getAgente() {
        return $this->agente;
    }

    public function setAgente($agente): void {
        $this->agente = $agente;
    }

}
?>