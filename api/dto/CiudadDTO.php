<?php

class CiudadDTO
{

    private $id;
    private $ciudad_nombre;
    private $ciudad_pais;
    private $ciudad_estado_clima;
    private $ciudad_temperatura;
    private $ciudad_humedad;
    private $ciudad_fecha;

    public function getId()
    {
        return $this->id;
    }

    public function getCiudad_nombre()
    {
        return $this->ciudad_nombre;
    }

    public function getCiudad_pais()
    {
        return $this->ciudad_pais;
    }

    public function getCiudad_estado_clima()
    {
        return $this->ciudad_estado_clima;
    }

    public function getCiudad_temperatura()
    {
        return $this->ciudad_temperatura;
    }

    public function getCiudad_humedad()
    {
        return $this->ciudad_humedad;
    }

    public function getCiudad_fecha()
    {
        return $this->ciudad_fecha;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setCiudad_nombre($ciudad_nombre): void
    {
        $this->ciudad_nombre = $ciudad_nombre;
    }

    public function setCiudad_pais($ciudad_pais): void
    {
        $this->ciudad_pais = $ciudad_pais;
    }

    public function setCiudad_estado_clima($ciudad_estado_clima): void
    {
        $this->ciudad_estado_clima = $ciudad_estado_clima;
    }

    public function setCiudad_temperatura($ciudad_temperatura): void
    {
        $this->ciudad_temperatura = $ciudad_temperatura;
    }

    public function setCiudad_humedad($ciudad_humedad): void
    {
        $this->ciudad_humedad = $ciudad_humedad;
    }

    public function setCiudad_fecha($ciudad_fecha): void
    {
        $this->ciudad_fecha = $ciudad_fecha;
    }

}
