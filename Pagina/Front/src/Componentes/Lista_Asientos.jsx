import React, { useEffect, useState } from "react";
import '../Componentes/css/Lista_Asientos.css'
import { useNavigate, useParams } from "react-router-dom";

const Lista_Asientos = ({sillas_1, sillas_2, Ir_Reserva, Seleccionar}) => {
    return(
        <div className="contenedor_lista_asientos">
            <h1>Asientos</h1>

            <div>

                <div>
                    <div className="sillas">
                        {sillas_1.map((e) => (
                            <div onClick={() => Seleccionar(e.id)}>
                                <p>{e.id}</p>
                                <h3 align="center">{e.asiento}</h3>
                            </div>
                        ))}
                    </div>

                    <div className="sillas">
                        {sillas_2.map((e) => (
                            <div onClick={() => Seleccionar(e.id)}>
                                <p>{e.id}</p>
                                <h3 align="center">{e.asiento}</h3>
                            </div>
                        ))}
                    </div>
                </div>
            </div>

            <button onClick={Ir_Reserva}>Siguiente</button>
        </div>
    )
}

export default Lista_Asientos