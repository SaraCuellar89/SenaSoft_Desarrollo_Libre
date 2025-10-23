import React from "react";
import { Link } from 'react-router-dom';
import '../Componentes/css/Menu_Desplegable.css'

const Menu_Desplegable = () => {
    return(
        <div className="contenedor_menu_desplegable">
            <div>
                <div>
                    <Link to={'/'}>Inicio</Link>
                    <Link to={'/Vuelos'}>Vuelos</Link>
                </div>

                <div>
                    <Link>Entrar</Link>
                </div>
            </div>
        </div>
    )
}

export default Menu_Desplegable