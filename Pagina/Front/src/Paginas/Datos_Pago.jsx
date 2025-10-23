import React, { useState } from "react";
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Footer from "../Componentes/Footer";
import '../Paginas/css/Vuelos.css'
import Formu_Datos_Pago from "../Componentes/Formu_Datos_Pago";
import Modal_Reserva from "../Componentes/Modal_Reserva";

const Datos_Pago = () => {
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

            <Formu_Datos_Pago/>

            <Footer/>
            
        </div>
    )
}

export default Datos_Pago