import React, { useState } from "react";
import '../Paginas/css/General.css'
import '../Paginas/css/Inicio.css'
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Carrusel from "../Componentes/Carrusel";
import Buscador from "../Componentes/Buscador";
import Footer from "../Componentes/Footer";

const Inicio = () => {

    const [ver_menu, setVer_menu] = useState(false)

    const Mostrar_Menu = () => {
        if(ver_menu === false){
            setVer_menu(true)
        }
        else{
            setVer_menu(false)
        }
    }

    return(
        <div className="contenedor_inicio">
            {ver_menu === true ? 
            (
                <Menu_Desplegable/>
            ) : 
            (
                null
            )}
            <Encabezado
                Mostrar_Menu={Mostrar_Menu}
            />

            <Carrusel/>

            <Buscador/>

            <Footer/>
        </div>
    )
}

export default Inicio