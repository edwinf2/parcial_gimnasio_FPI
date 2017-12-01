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
public class Tiempo {
    private int id;
    private int idmiembro;
    private String nombre;
    private String detalles;
    private String fecha;

    public Tiempo() {
    }

    public Tiempo(int id, int idmiembro, String nombre, String detalles, String fecha) {
        this.id = id;
        this.idmiembro = idmiembro;
        this.nombre = nombre;
        this.detalles = detalles;
        this.fecha = fecha;
    }

    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdmiembro() {
        return idmiembro;
    }

    public void setIdmiembro(int idmiembro) {
        this.idmiembro = idmiembro;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDetalles() {
        return detalles;
    }

    public void setDetalles(String detalles) {
        this.detalles = detalles;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }
    
    
}
