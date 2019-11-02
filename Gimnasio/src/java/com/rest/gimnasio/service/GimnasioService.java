/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.rest.gimnasio.service;

import com.rest.gimnasio.model.EstadoSalud;
import com.rest.gimnasio.model.Suscripcion;
import com.rest.gimnasio.model.Tiempo;
import com.rest.gimnasio.model.TiposMemoria;
import com.rest.gimnasio.model.Usuario;
import com.rest.gimnasio.model.datoUsuario;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.ejb.Stateless;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

/**
 *
 * @author degon
 */
@Stateless
@Path("/gimnasio")
public class GimnasioService implements Serializable {
    
        @GET
        @Path("/datoUsuario")
	@Produces(MediaType.APPLICATION_JSON)
	public List<datoUsuario> getDatoUsuario(){
		List <datoUsuario> dato = new ArrayList<datoUsuario>();
		dato.add (new datoUsuario (1,"no","1454208171","Andrea","Santa Ana","6100","1996-04-05","9209668896","andrea@gmail.com","5","130","salvadoreña","andrellita","no tengo","Maria","No hay","Inicio","2017-11-26","20","Female","cardio",""));
		dato.add (new datoUsuario (2,"no","1454763163","Mario","Chalchuapa","0","1995-02-04","9209668897","mario@gmail.com","6","160","salvadoreño","mario rivas","@mar23","no hay","no hay","Inicio","2017-11-26","26","male","cardio y piernas",""));
		
		return dato;
	}
        
        @GET
        @Path("/Usuario")
        @Produces(MediaType.APPLICATION_JSON)
        public List<Usuario> getUsuario(){
         List <Usuario> usuario = new ArrayList<Usuario>();
         usuario.add (new Usuario(1,"admin","admin","admin","5","male","administrador"));
         usuario.add (new Usuario(2,"cajero","cajero","cajero","4","male","cajero"));
         
         return usuario;
        }
        
        
        @GET
        @Path("/estadoSalud")
        @Produces(MediaType.APPLICATION_JSON)
        public List<EstadoSalud> getestadoSalud(){
         List <EstadoSalud> estados = new ArrayList<EstadoSalud>();
         estados.add (new EstadoSalud(1, 1,"Edwin","2017-11-26","No se sabe","Normal","Creciendo","Estandar","Esqueleto","Se observa bie"));
         estados.add (new EstadoSalud(2, 2,"David","2017-11-26","No se sabe","Normal","Creciendo","Estandar","Esqueleto","Se observa bie"));
         estados.add (new EstadoSalud(3, 3,"David","2017-11-26","No se sabe","Normal","Creciendo","Estandar","Esqueleto","Se observa bie"));
         
         return estados;
        }
        
        
        @GET
        @Path("/Suscripcion")
        @Produces(MediaType.APPLICATION_JSON)
        public List<Suscripcion> getSuscripcion(){
         List <Suscripcion> suscripcioness = new ArrayList<Suscripcion>();
         suscripcioness.add (new Suscripcion(1, 1230,"Nuevo","Edwin","Tipo1","2017-11-26","2018-02-01","100, 0","F343FFGGG23","Por Sesion","100","1454281200","si"));
         suscripcioness.add (new Suscripcion(1, 1231,"Nuevo","David","Tipo1","2017-11-26","2018-02-01","100, 0","F343FFGGG23","Por Sesion","100","1454281200","si"));
         suscripcioness.add (new Suscripcion(1, 1232,"Nuevo","Julio","Tipo1","2017-11-26","2018-02-01","100, 0","F343FFGGG23","Por Sesion","100","1454281200","si"));
         return suscripcioness;
        }
        
        @GET
        @Path("/Tiempo")
        @Produces(MediaType.APPLICATION_JSON)
        public List<Tiempo> getTiempo(){
         List <Tiempo> time = new ArrayList<Tiempo>();
         time.add (new Tiempo(1, 1230,"Edwin","No padece nada","2017-11-27"));
         time.add (new Tiempo(2, 1231,"David","No padece nada","2017-11-27"));
         time.add (new Tiempo(3, 1232,"Julio","No padece nada","2017-11-27"));
         return time;
        }
        
        @GET
        @Path("/TiposMemoria")
        @Produces(MediaType.APPLICATION_JSON)
        public List<TiposMemoria> getTiposMemoria(){
         List <TiposMemoria> tipos = new ArrayList<TiposMemoria>();
         tipos.add (new TiposMemoria(1,"Tipo1","Mensual","30","1000","Mensual"));
         tipos.add (new TiposMemoria(2 ,"Tipo1","Mensual","30","1000","Mensual"));
         tipos.add (new TiposMemoria(3,"Tipo2","Prueba","30","300","Prueba"));
         return tipos;
        }
        
}
