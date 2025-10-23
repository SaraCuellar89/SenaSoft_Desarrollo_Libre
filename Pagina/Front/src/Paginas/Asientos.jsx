import React, { useState } from "react";
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Footer from "../Componentes/Footer";
import '../Paginas/css/Vuelos.css'
import Lista_Asientos from "../Componentes/Lista_Asientos";

const Asientos = () =>  {
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
        <div className="contenedor_vuelos">
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

            <Lista_Asientos/>

            <Footer/>
  
        </div>
    )
}

export default Asientos