import React from "react";
import { Link } from 'react-router-dom';

const Formu_Datos_Pago = () => {
    return(
        <div className="contenedor_formu_datos_usuario">

            <h1>Reserva</h1>

            <form action="">
                <div>
                    <h1>Costo Total</h1>
                    <p>$500.000</p>
                </div>

                <div>
                    <label htmlFor="">Tipo de pago</label>
                    <select name="" id="">
                        <option value="" hidden>Seleccionar</option>
                        <option value="">Cedula</option>
                        <option value="">Tarjeta de Identidad</option>
                    </select>
                </div>

                <div>
                    <label htmlFor="">Numero de Cuenta</label>
                    <input type="number" />
                </div>

                <button><Link >Siguiente</Link></button>
            </form>
        </div>
    )
}

export default Formu_Datos_Pago