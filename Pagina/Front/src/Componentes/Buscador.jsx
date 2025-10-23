import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import '../Componentes/css/Buscador.css'
import ejemplo from '../Componentes/imagenes/colombia_2.jpg'
import { useNavigate } from "react-router-dom";

const Buscador = () => {

    const navigate = useNavigate()

    //Listar 3 vuelos por defecto
    const [vuelos, setVuelos] = useState([])

    useEffect(() => {

        const Obtener_Vuelos = async () => {
            const res = await fetch('http://127.0.0.1:8000/api/vuelos')
            const datos = await res.json()

            setVuelos(datos.data.slice(1, 4))
        }

        Obtener_Vuelos()
    }, [])


    //Buscar vuelos por su origen
    const [nombre, setNombre] = useState('')

    const Buscar_Vuelos = async (e) => {

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

    

    const Recargar_Pagina = () => {
        navigate(0)
    }

    return(
        <div className="contenedor_buscador">
            <div>
                <input type="text" name="" id="" placeholder="Nombre de la ciudad de origen" value={nombre} onChange={(e) => setNombre(e.target.value)} onInput={Buscar_Vuelos}/>

                <button onClick={Recargar_Pagina}>Refrezcar</button>
            </div>

            <div>
                {vuelos.map((v) => (
                    <Link key={v.id}>
                        <img src={ejemplo} alt="" />

                        <div>
                            <h2>{v.origen} - {v.destino}</h2>
                            <h4>{v.fecha_salida}</h4>
                            <p></p>
                        </div>

                        <h1>${v.precio}</h1>
                    </Link>
                ))}
            </div>

            <Link to={'/Vuelos'}>Descubre mas</Link>
        </div>
    )
}

export default Buscador