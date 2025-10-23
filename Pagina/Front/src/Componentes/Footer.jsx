import React from "react";
import { Link } from 'react-router-dom';
import facebook from "../Componentes/imagenes/facebook.png"
import instagram from "../Componentes/imagenes/instagram.png"
import twitter from "../Componentes/imagenes/twitter.png"
import img_logo from "../Componentes/imagenes/logo_gris.png"
import '../Componentes/css/Footer.css'

const Footer = () => {
    return(
        <div className="contenedor_footer">
            <div>
                <h1>Flie</h1>
                <img src={img_logo} alt="" />
            </div>

            <div>
                <Link><img src={facebook} alt="" title="Facebook"/></Link>
                <Link><img src={instagram} alt="" title="Instagram"/></Link>
                <Link><img src={twitter} alt="" title="Twitter"/></Link>
            </div>
        </div>
    )
}

export default Footer