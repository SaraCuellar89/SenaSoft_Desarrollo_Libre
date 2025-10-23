import React, { useState, useSyncExternalStore } from "react";
import '../Componentes/css/Lista_Asientos.css'
import { useNavigate } from "react-router-dom";

const Lista_Asientos = () => {

    const navigate = useNavigate()

    const [num, setNum] = useState([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16])
    const [seleccionada, setSeleccionada] = useState(false)

    const Seleccionar = (e) => {
        console.log(e)
    }

    const Ir_Reserva = () => {
        navigate('/Datos_Usuario')
    }

    return(
        <div className="contenedor_lista_asientos">
            <h1>Asientos</h1>

            <div>

                <div>
                    <div className="sillas">
                        {num.map((e) => (
                            <div onClick={() => Seleccionar(e)}>{e}</div>
                        ))}
                    </div>

                    <div className="sillas">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <div className="sillas">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>


                <div>
                    <div className="sillas">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <div className="sillas">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <div className="sillas">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>

            <button onClick={Ir_Reserva}>Siguiente</button>
        </div>
    )
}

export default Lista_Asientos