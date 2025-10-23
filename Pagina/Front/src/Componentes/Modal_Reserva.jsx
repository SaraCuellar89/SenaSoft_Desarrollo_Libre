import React from "react";
import '../Componentes/css/Modales.css'

const Modal_Reserva = () => {
    return(
        <div className="contenedor_modal_verificacion">
            <div>
                <h1>Reserva</h1>

                <div>
                    <div>
                        <h3>Codigo</h3>
                        <p>243rf</p>
                    </div>

                    <div>
                        <h3>Vuelo</h3>
                        <p>243rf</p>
                    </div>

                    <div>
                        <h3>Pasajeros</h3>
                        <p>5</p>
                    </div>

                    <div>
                        <h3>Valor Total</h3>
                        <p>$500.000</p>
                    </div>

                    <button>PDF/JSON</button>
                    <button>Cerrar</button>
                </div>
                
            </div>
        </div>
    )
}

export default Modal_Reserva