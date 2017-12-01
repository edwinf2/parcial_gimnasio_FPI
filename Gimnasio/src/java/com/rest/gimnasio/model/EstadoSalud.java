/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.rest.gimnasio.model;

/**
 *
 * @author degon
 */
public class EstadoSalud {
    private int idSalud;
    private int id;
    private String nombre;
    private String fecha1;
    private String grasaCorporal;
    private String agua;
    private String musculo;
    private String calorias;
    private String hueso;
    private String observaciones;

    public EstadoSalud() {
    }

    public EstadoSalud(int idSalud, int id, String nombre, String fecha1, String grasaCorporal, String agua, String musculo, String calorias, String hueso, String observaciones) {
        this.idSalud = idSalud;
        this.id = id;
        this.nombre = nombre;
        this.fecha1 = fecha1;
        this.grasaCorporal = grasaCorporal;
        this.agua = agua;
        this.musculo = musculo;
        this.calorias = calorias;
        this.hueso = hueso;
        this.observaciones = observaciones;
    }

    
    
    public int getIdSalud() {
        return idSalud;
    }

    public void setIdSalud(int idSalud) {
        this.idSalud = idSalud;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getFecha1() {
        return fecha1;
    }

    public void setFecha1(String fecha1) {
        this.fecha1 = fecha1;
    }

    public String getGrasaCorporal() {
        return grasaCorporal;
    }

    public void setGrasaCorporal(String grasaCorporal) {
        this.grasaCorporal = grasaCorporal;
    }

    public String getAgua() {
        return agua;
    }

    public void setAgua(String agua) {
        this.agua = agua;
    }

    public String getMusculo() {
        return musculo;
    }

    public void setMusculo(String musculo) {
        this.musculo = musculo;
    }

    public String getCalorias() {
        return calorias;
    }

    public void setCalorias(String calorias) {
        this.calorias = calorias;
    }

    public String getHueso() {
        return hueso;
    }

    public void setHueso(String hueso) {
        this.hueso = hueso;
    }

    public String getObservaciones() {
        return observaciones;
    }

    public void setObservaciones(String observaciones) {
        this.observaciones = observaciones;
    }
    
    
    
    
}
