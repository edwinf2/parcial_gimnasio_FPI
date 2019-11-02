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
public class Usuario {
    private int id;
    private String idUsuario;
    private String contrasenia;
    private String seguridad;
    private String nivel;
    private String sexo;
    private String nombre;

    public Usuario() {
    }

    public Usuario(int id, String idUsuario, String contrasenia, String seguridad, String nivel, String sexo, String nombre) {
        this.id = id;
        this.idUsuario = idUsuario;
        this.contrasenia = contrasenia;
        this.seguridad = seguridad;
        this.nivel = nivel;
        this.sexo = sexo;
        this.nombre = nombre;
    }

    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(String idUsuario) {
        this.idUsuario = idUsuario;
    }

    public String getContrasenia() {
        return contrasenia;
    }

    public void setContrasenia(String contrasenia) {
        this.contrasenia = contrasenia;
    }

    public String getSeguridad() {
        return seguridad;
    }

    public void setSeguridad(String seguridad) {
        this.seguridad = seguridad;
    }

    public String getNivel() {
        return nivel;
    }

    public void setNivel(String nivel) {
        this.nivel = nivel;
    }

    public String getSexo() {
        return sexo;
    }

    public void setSexo(String sexo) {
        this.sexo = sexo;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    
}
