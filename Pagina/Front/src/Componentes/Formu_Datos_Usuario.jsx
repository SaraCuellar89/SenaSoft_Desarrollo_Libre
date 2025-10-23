import React, { useState } from "react";
import { Link, useParams } from 'react-router-dom';
import '../Componentes/css/Formu_Datos_Usuario.css'
import Modal_Reserva from "../Componentes/Modal_Reserva"

const Formu_Datos_Usuario = ({Reservar, nombre, setNombre, tipo_documento, setTipo_documento, documento, setDocumento, correo, setCorreo, celular, setCelular, tipo_pago, setTipo_pago, ver_modal, id_reserva}) => {
    return(
        <div className="contenedor_formu_datos_usuario">

            <h1>Reserva</h1>

            <form action="" onSubmit={Reservar}>
                <div>
                    <label htmlFor="">Nombre Completo</label>
                    <input type="text" value={nombre} onChange={(e) => setNombre(e.target.value)}/>
                </div>

                <div>
                    <label htmlFor="">Tipo Documento</label>
                    <select name="" id="" value={tipo_documento} onChange={(e) => setTipo_documento(e.target.value)}>
                        <option value="" hidden>Seleccionar</option>
                        <option value="1">Tarjeta de Identidad</option>
                        <option value="2">Cedula de Ciudadania</option>
                        <option value="3">PPT</option>
                        <option value="4">Pasaporte</option>
                    </select>
                </div>

                <div>
                    <label htmlFor="">Documento</label>
                    <input type="number" value={documento} onChange={(e) => setDocumento(e.target.value)}/>
                </div>

                <div>
                    <label htmlFor="">Correo</label>
                    <input type="email" value={correo} onChange={(e) => setCorreo(e.target.value)}/>
                </div>

                <div>
                    <label htmlFor="">Celular</label>
                    <input type="number" value={celular} onChange={(e) => setCelular(e.target.value)}/>
                </div>

                <div>
                    <h1>Costo Total</h1>
                    <p>$500.000</p>
                </div>

                <div>
                    <label htmlFor="">Tipo de pago</label>
                    <select name="" id="" value={tipo_pago} onChange={(e) => setTipo_pago(e.target.value)}>
                        <option value="" hidden>Seleccionar</option>
                        <option value="1">Tarjeta Credito</option>
                        <option value="2">Tarjeta de Debito</option>
                        <option value="3">PSE</option>
                    </select>
                </div>

                <button type="submit">Finalizar Reserva</button>
            </form>

            {ver_modal === true ? 
            (<Modal_Reserva
                id_reserva={id_reserva}
            />) :
            null}
        </div>
    )
}

export default Formu_Datos_Usuario