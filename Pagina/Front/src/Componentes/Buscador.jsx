import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import '../Componentes/css/Buscador.css'
import ejemplo from '../Componentes/imagenes/colombia_2.jpg'

const Buscador = ({nombre, setNombre, Recargar_Pagina, vuelos, Buscar_Vuelos}) => {
    return(
        <div className="contenedor_buscador">
            <div>
                <input type="text" name="" id="" placeholder="Nombre de la ciudad de origen" value={nombre} onChange={(e) => setNombre(e.target.value)} onInput={Buscar_Vuelos}/>

                <button onClick={Recargar_Pagina}>Refrezcar</button>
            </div>

            <div>
                {vuelos.map((v) => (
                    <Link key={v.id}>
                        <img src={ejemplo} alt="" />

                        <div>
                            <h2>{v.origen} - {v.destino}</h2>
                            <h4>{v.fecha_salida}</h4>
                            <p></p>
                        </div>

                        <h1>${v.precio}</h1>
                    </Link>
                ))}
            </div>

            <Link to={'/Vuelos'}>Descubre mas</Link>
        </div>
    )
}

export default Buscador