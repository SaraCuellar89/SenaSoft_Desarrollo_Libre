import React from "react";
import { Link } from 'react-router-dom';
import '../Componentes/css/Formu_Datos_Usuario.css'

const Formu_Datos_Usuario = () => {
    return(
        <div className="contenedor_formu_datos_usuario">

            <h1>Reserva</h1>

            <form action="">
                <div>
                    <label htmlFor="">Nombre Completo</label>
                    <input type="text"/>
                </div>

                <div>
                    <label htmlFor="">Tipo Documento</label>
                    <select name="" id="">
                        <option value="" hidden>Seleccionar</option>
                        <option value="">Cedula</option>
                        <option value="">Tarjeta de Identidad</option>
                    </select>
                </div>

                <div>
                    <label htmlFor="">Documento</label>
                    <input type="number" />
                </div>

                <div>
                    <label htmlFor="">Correo</label>
                    <input type="email" />
                </div>

                <div>
                    <label htmlFor="">Celular</label>
                    <input type="number" />
                </div>

                <button><Link >Siguiente</Link></button>
            </form>
        </div>
    )
}

export default Formu_Datos_Usuario