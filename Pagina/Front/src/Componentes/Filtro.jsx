import React, { useState } from "react";
import '../Componentes/css/Filtro.css'

const Filtro = ({Buscar_Tipo_vuelo, Buscar_Destino, setTipo_vuelo, Buscar_Origen, origen, setOrigen, destino, setDestino}) => {
    return(
        <div className="contenedor_filtro">

            <form action="" onSubmit={Buscar_Tipo_vuelo}>
                <select name="" id="" onChange={(e) => setTipo_vuelo(e.target.value)}>
                    <option value="" hidden>Seleccionar</option>
                    <option value="solo ida">Ida</option>
                    <option value="ida y vuelta">Ida - Regreso</option>
                </select>

                <button type="submit">Filtrar</button>
            </form>


            <form action="">
                <input type="search" name="" id="" placeholder="Origen" value={origen} onChange={(e) => setOrigen(e.target.value)} onInput={Buscar_Origen}/>
                <button type="button">Filtrar</button>
            </form>


             <form action="" onSubmit={Buscar_Destino}>
                <input type="search" name="" id="" placeholder="Destino" value={destino} onChange={(e) => setDestino(e.target.value)} onInput={Buscar_Destino}/>
                <button type="button">Filtrar</button>
            </form>
            
        </div>
    )
}

export default Filtro