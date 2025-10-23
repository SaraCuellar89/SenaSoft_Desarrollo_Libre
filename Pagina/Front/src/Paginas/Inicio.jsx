import React, { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import '../Paginas/css/General.css'
import '../Paginas/css/Inicio.css'
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Carrusel from "../Componentes/Carrusel";
import Buscador from "../Componentes/Buscador";
import Footer from "../Componentes/Footer";

const Inicio = () => {

    const navigate = useNavigate()

    // ================ Listar 3 vuelos por defecto ================
    const [vuelos, setVuelos] = useState([])

    useEffect(() => {

        const Obtener_Vuelos = async () => {
            const res = await fetch('http://127.0.0.1:8000/api/vuelos')
            const datos = await res.json()

            setVuelos(datos.data.slice(1, 4))
        }

        Obtener_Vuelos()
    }, [])



    // ================ Buscar vuelos por su origen ================
    const [nombre, setNombre] = useState('')

    const Buscar_Vuelos = async () => {

        try{
            const res = await fetch(`http://127.0.0.1:8000/api/vuelos?origen=${nombre}`, {
                method: 'GET'
            })
            const datos = await res.json()
            setVuelos(datos.data)
            
        }
        catch(error){
            console.error('Error: ' + error)
        }
    }

    

    // ================ Recargar la pagina ================
    const Recargar_Pagina = () => {
        navigate(0)
    }



    // ================ Ocultar o Ver el menu ================
    const [ver_menu, setVer_menu] = useState(false)

    const Mostrar_Menu = () => {
        if(ver_menu === false){
            setVer_menu(true)
        }
        else{
            setVer_menu(false)
        }
    }


    // ================ Renderizado ================
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

            <Buscador
                Recargar_Pagina={Recargar_Pagina}
                nombre={nombre}
                setNombre={setNombre}
                vuelos={vuelos}
                Buscar_Vuelos={Buscar_Vuelos}
            />

            <Footer/>
        </div>
    )
}

export default Inicio