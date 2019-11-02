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
public class TiposMemoria {
    private int id;
    private String idtipomemoria;
    private String nombrecontrato;
    private String dias;
    private String precio;
    private String detalles;

    public TiposMemoria() {
    }

    public TiposMemoria(int id, String idtipomemoria, String nombrecontrato, String dias, String precio, String detalles) {
        this.id = id;
        this.idtipomemoria = idtipomemoria;
        this.nombrecontrato = nombrecontrato;
        this.dias = dias;
        this.precio = precio;
        this.detalles = detalles;
    }

    
    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getIdtipomemoria() {
        return idtipomemoria;
    }

    public void setIdtipomemoria(String idtipomemoria) {
        this.idtipomemoria = idtipomemoria;
    }

    public String getNombrecontrato() {
        return nombrecontrato;
    }

    public void setNombrecontrato(String nombrecontrato) {
        this.nombrecontrato = nombrecontrato;
    }

    public String getDias() {
        return dias;
    }

    public void setDias(String dias) {
        this.dias = dias;
    }

    public String getPrecio() {
        return precio;
    }

    public void setPrecio(String precio) {
        this.precio = precio;
    }

    public String getDetalles() {
        return detalles;
    }

    public void setDetalles(String detalles) {
        this.detalles = detalles;
    }
    
    
    
    
    
}
