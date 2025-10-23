import React, { useState } from "react";
import { Link, useParams } from 'react-router-dom';
import Encabezado from "../Componentes/Encabezado";
import Menu_Desplegable from "../Componentes/Menu_Desplegable";
import Footer from "../Componentes/Footer";
import '../Paginas/css/Vuelos.css'
import Formu_Datos_Usuario from "../Componentes/Formu_Datos_Usuario";

const Datos_Usuario = () => {
    
    // ================ Estados para ver el modal ================
    const [ver_modal, setVer_modal] = useState(false)

    // ================ Estados para el formulario de reserva ================
    const [nombre, setNombre] = useState('')
    const [tipo_documento, setTipo_documento] = useState('')
    const [documento, setDocumento] = useState('')
    const [correo, setCorreo] = useState('')
    const [celular, setCelular] = useState('')
    const [tipo_pago, setTipo_pago] = useState('')

    // ================ id de la reserva ================
    const [id_reserva, setId_reserva] = useState('')

    // ================ Obtener el id de las sillas y del vuelo desde la url ================
    const id_sillas = useParams().id_sillas
    const id_vuelo = useParams().id_vuelo



    // ================ Formulario para reservar ================
    const Reservar = async (e) => {
        e.preventDefault()

        //Validaciones
        if(nombre.length < 3){
            return alert('El nombre debe tener mas de 3 caracteres')
        }
        else if(documento.length < 7){
            return alert('El documento debe tener mas de 7 digitos')
        }
        else if(celular.length < 10){
            return alert('El numero de telefono debe tener mas de 10 digitos')
        }

        try{
            const res = await fetch('http://127.0.0.1:8000/api/reservas', {
                method:'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    vuelo_id: id_vuelo,
                    asiento_id: id_sillas,
                    nombre_completo: nombre,
                    tipo_documento: tipo_documento,
                    documento: documento,
                    email: correo,
                    celular: celular,
                    metodo_id: tipo_pago,
                    monto: 500.000,
                    cantidad_reserva: 1
                })
            })

            const datos = await res.json()
            console.log(datos)

            console.log(datos.id)

            if(!res.ok ){
                return alert('No se pudo completar la reserva')
            }

            setId_reserva(datos.data.id)
            setVer_modal(true)
        }
        catch(error){
            console.error('Error: ' +  error)
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

            <Formu_Datos_Usuario
                Reservar = {Reservar}
                nombre = {nombre} 
                setNombre = {setNombre}
                tipo_documento = {tipo_documento} 
                setTipo_documento = {setTipo_documento}
                documento = {documento}
                setDocumento = {setDocumento}
                correo = {correo}
                setCorreo = {setCorreo}
                celular = {celular}
                setCelular = {setCelular}
                tipo_pago = {tipo_pago}
                setTipo_pago = {setTipo_pago}
                ver_modal = {ver_modal}
                id_reserva = {id_reserva}
            />

            <Footer/>
        </div>
    )
}

export default Datos_Usuario