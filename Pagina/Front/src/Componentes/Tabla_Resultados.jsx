import React, { useEffect, useState } from "react";
import '../Componentes/css/Tabla_Resultados.css'
import { Link } from "react-router-dom";

const Tabla_Resultados = ({info_vuelos}) => {

    return(
        <div className="contenedor_tabla_resultados">
            <h1>Ida - Regreso</h1>
            <table>
                {info_vuelos === '' || info_vuelos === 0 ?
                (
                   <h1 align='center'>No hay vuelos</h1> 
                ) :
                (
                    <>
                        {info_vuelos.map((v) => (
                            <Link to={'/Asientos'}>
                                <tr>
                                    <td>{v.tipo_vuelo}</td>
                                    <td>{v.fecha_salida}</td>
                                    <td>{v.fecha_llegada}</td>
                                    <td>${v.precio}</td>
                                    <td>Vuelo757</td>
                                </tr>
                            </Link>  
                        ))} 
                    </> 
                )}           
            </table>
        </div>
    )
}

export default Tabla_Resultados