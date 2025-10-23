import React, { useEffect, useState } from "react";
import '../Componentes/css/Modales.css'
import { useNavigate } from "react-router-dom";

const Modal_Reserva = ({id_reserva}) => {

    const navigate = useNavigate()

    const [info_reserva, setInfo_reserva] = useState([])

    useEffect(() => {
        const Obtener_Datos_Reserva = async () => {
            try{
                const res = await fetch(`http://127.0.0.1:8000/api/reservas/${id_reserva}`)
                const datos = await res.json()

                console.log(datos.data)
                setInfo_reserva(datos.data)
            }
            catch(error){
                console.error('Error: ' + error) 
            }
        }

        Obtener_Datos_Reserva()
    }, [])

    const Ir_Inicio = () => {
        navigate('/')
    }

    return(
        <div className="contenedor_modal_verificacion">
            <div>
                <h1>Reserva</h1>

                {info_reserva && (
                    <div>
                        <div>
                            <h3>Codigo</h3>
                            <p>{info_reserva.codigo}</p>
                        </div>

                        <div>
                            <h3>Vuelo</h3>
                            <p>243rf</p>
                        </div>

                        <div>
                            <h3>Pasajeros</h3>
                            <p>{info_reserva.cantidad_reserva}</p>
                        </div>

                        <div>
                            <h3>Valor Total</h3>
                            <p>${info_reserva.monto}</p>
                        </div>

                        <button>PDF/JSON</button>
                        <button onClick={Ir_Inicio}>Cerrar</button>
                    </div>
                )}
                
            </div>
        </div>
    )
}

export default Modal_Reserva