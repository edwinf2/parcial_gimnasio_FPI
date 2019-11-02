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
public class Suscripcion {
    private int id;
    private int idMiembro;
    private String nombre;
    private String tiposuscripcion;
    private String fechapago;
    private String expiracion;
    private String total;
    private String pagado;
    private String factura;
    private String nombretiposuscripcion;
    private String balance;
    private String tiempoexpira;
    private String renovacion;

    public Suscripcion() {
    }

    public Suscripcion(int id, int idMiembro, String nombre, String tiposuscripcion, String fechapago, String expiracion, String total, String pagado, String factura, String nombretiposuscripcion, String balance, String tiempoexpira, String renovacion) {
        this.id = id;
        this.idMiembro = idMiembro;
        this.nombre = nombre;
        this.tiposuscripcion = tiposuscripcion;
        this.fechapago = fechapago;
        this.expiracion = expiracion;
        this.total = total;
        this.pagado = pagado;
        this.factura = factura;
        this.nombretiposuscripcion = nombretiposuscripcion;
        this.balance = balance;
        this.tiempoexpira = tiempoexpira;
        this.renovacion = renovacion;
    }

    
    
    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdMiembro() {
        return idMiembro;
    }

    public void setIdMiembro(int idMiembro) {
        this.idMiembro = idMiembro;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getTiposuscripcion() {
        return tiposuscripcion;
    }

    public void setTiposuscripcion(String tiposuscripcion) {
        this.tiposuscripcion = tiposuscripcion;
    }

    public String getFechapago() {
        return fechapago;
    }

    public void setFechapago(String fechapago) {
        this.fechapago = fechapago;
    }

    public String getExpiracion() {
        return expiracion;
    }

    public void setExpiracion(String expiracion) {
        this.expiracion = expiracion;
    }

    public String getTotal() {
        return total;
    }

    public void setTotal(String total) {
        this.total = total;
    }

    public String getPagado() {
        return pagado;
    }

    public void setPagado(String pagado) {
        this.pagado = pagado;
    }

    public String getFactura() {
        return factura;
    }

    public void setFactura(String factura) {
        this.factura = factura;
    }

    public String getNombretiposuscripcion() {
        return nombretiposuscripcion;
    }

    public void setNombretiposuscripcion(String nombretiposuscripcion) {
        this.nombretiposuscripcion = nombretiposuscripcion;
    }

    public String getBalance() {
        return balance;
    }

    public void setBalance(String balance) {
        this.balance = balance;
    }

    public String getTiempoexpira() {
        return tiempoexpira;
    }

    public void setTiempoexpira(String tiempoexpira) {
        this.tiempoexpira = tiempoexpira;
    }

    public String getRenovacion() {
        return renovacion;
    }

    public void setRenovacion(String renovacion) {
        this.renovacion = renovacion;
    }
    
    
    
}
