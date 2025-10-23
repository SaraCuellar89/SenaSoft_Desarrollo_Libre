import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Footer from "../Componentes/Footer";
import '../Paginas/css/Vuelos.css'
import Lista_Asientos from "../Componentes/Lista_Asientos";

const Asientos = () =>  {


    const navigate = useNavigate()

    // ================ Estados para buscar y posicionar las sillas ================ 
    const [sillas_1, setSillas_1] = useState([])
    const [sillas_2, setSillas_2] = useState([])
    const [array_sillas,  setArray_sillas] = useState([])

    const [array_reservadas, setArray_reservadas] = useState([])

    const id_evento = useParams().id_vuelo



    // ================ Validacion de la cantidad maxima de sillas por reserva ================ 
    const Seleccionar = (id) => {
        if(array_sillas.length > 5){
            return alert('No puedes selecionar mas de 5 asientos')
        }
        array_sillas.push(id)
    }



    useEffect(() => {
        // ================ Listar todas las sillas ================ 
        const Obtener_Sillas = async () => {
            const res = await fetch('http://127.0.0.1:8000/api/asientos')
            const datos = await res.json()

            const sillas_1 = datos.data.slice(0, 36)
            setSillas_1(sillas_1)

            const sillas_2 = datos.data.slice(36)
            setSillas_2(sillas_2)
        }

        Obtener_Sillas()


        // ================ Obtener Sillas Reservadas ================ 
        const Obtener_Sillas_Reservadas = async () => {
            const res = await fetch('http://127.0.0.1:8000/api/reservas')
            const datos = await res.json()

            datos.data.forEach(r => {
                array_reservadas.push(r.asiento_id)
            });
        }

        Obtener_Sillas_Reservadas()
    }, [])



    // ================ Funcion para ir a reserva ================ 
    const Ir_Reserva = () => {
        navigate(`/Datos_Usuario/${id_evento}/${array_sillas}`)
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

            <Lista_Asientos
                sillas_1={sillas_1}
                sillas_2={sillas_2}
                Ir_Reserva={Ir_Reserva}
                Seleccionar={Seleccionar}
            />

            <Footer/>
  
        </div>
    )
}

export default Asientos