import React from "react";
import { Link } from 'react-router-dom';
import img_menu from "../Componentes/imagenes/menu.png"
import img_logo from "../Componentes/imagenes/logo_rosado.png"
import img_usuario from "../Componentes/imagenes/usuario.png"
import '../Componentes/css/Encabezado.css'

const Encabezado = ({Mostrar_Menu}) => {
    return(
        <div className="contenedor_encabezado">
            <div>
                <img src={img_menu} alt="" onClick={Mostrar_Menu}/>

                <div>
                    <h1>Flie</h1>
                    <img src={img_logo} alt="" />
                </div>
            </div>

            <div>
                <Link>Inicio de Sesion</Link>
                <img src={img_usuario} alt="" />
            </div>
        </div>
    )
}

export default Encabezado