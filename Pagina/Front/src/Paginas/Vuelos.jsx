import React, { useState, useEffect } from "react";
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Footer from "../Componentes/Footer";
import Filtro from "../Componentes/Filtro";
import Tabla_Resultados from "../Componentes/Tabla_Resultados";
import '../Paginas/css/Vuelos.css'

const Vuelos = () => {

    // ================ Listar todos los vuelos ================ 
    const [info_vuelos, setInfo_vuelos] = useState([])

    useEffect(() => {
        const Obtener_Vuelos = async () => {
            const res = await fetch('http://127.0.0.1:8000/api/vuelos')
            const datos = await res.json()

            setInfo_vuelos(datos.data)
        }

        Obtener_Vuelos()
    }, [])



    // ================ Buscar vuelos por ida y vuelta ================
    const [tipo_vuelo, setTipo_vuelo] = useState('')

    const Buscar_Tipo_vuelo = async (e) => {
        e.preventDefault()
        try{
            const res = await fetch(`http://127.0.0.1:8000/api/vuelos?tipo_vuelo=${tipo_vuelo}`, {
                method: 'GET'
            })
            const datos = await res.json()
            console.log(datos)
            setInfo_vuelos(datos.data)
        }
        catch(error){
            console.error('Error: ' + error)
        }
    }



    // ================ Buscar vuelos por origen ================ 
    const [origen, setOrigen] = useState('')

    const Buscar_Origen = async (e) => {
        try{
            const res = await fetch(`http://127.0.0.1:8000/api/vuelos?origen=${origen}`, {
                method: 'GET'
            })
            const datos = await res.json()
            console.log(datos)
            setInfo_vuelos(datos.data)
        }
        catch(error){
            console.error('Error: ' + error)
        }
    }



    // ================ Buscar vuelos por destino ================ 
    const [destino, setDestino] = useState('')

    const Buscar_Destino = async (e) => {
        try{
            const res = await fetch(`http://127.0.0.1:8000/api/vuelos?destino=${destino}`, {
                method: 'GET'
            })
            const datos = await res.json()
            console.log(datos)
            setInfo_vuelos(datos.data)
        }
        catch(error){
            console.error('Error: ' + error)
        }
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

            <Filtro
                Buscar_Tipo_vuelo = {Buscar_Tipo_vuelo}
                setTipo_vuelo = {setTipo_vuelo}
                Buscar_Origen = {Buscar_Origen} 
                origen = {origen} 
                setOrigen = {setOrigen}
                Buscar_Destino = {Buscar_Destino} 
                destino = {destino}
                setDestino = {setDestino}
            />

            <Tabla_Resultados
                info_vuelos={info_vuelos}
            />

            <Footer/>
        </div>
    )
}

export default Vuelos