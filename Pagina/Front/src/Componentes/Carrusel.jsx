import React from "react";
import '../../node_modules/slick-carousel/slick/slick-theme.css';
import '../../node_modules/slick-carousel/slick/slick.css';
import img_1 from "../Componentes/imagenes/Colombia.png"
import img_2 from "../Componentes/imagenes/banner_ejemplo_1.jpg"
import img_3 from "../Componentes/imagenes/banner_1.png"
import '../Componentes/css/Carrusel.css'
import Slider from "react-slick";

const Carrusel = () => {

    const imgs = [
        img_1, img_2, img_3
    ]

    const settings = {
        dots: true,              // Muestra los puntitos de navegación debajo del carrusel
        infinite: true,          // Permite que el carrusel vuelva al inicio al llegar al último slide (bucle infinito)
        speed: 800,            // Duración de la animación de transición entre slides (en milisegundos)
        autoplay: true,          // Activa el desplazamiento automático de los slides
        autoplaySpeed: 3000,        // Tiempo que el carrusel espera antes de pasar al siguiente slide (en milisegundos)
        pauseOnHover: true,      // Pausa el autoplay cuando el usuario pasa el mouse sobre el carrusel
        swipeToSlide: true,     // Si es true, permite arrastrar (swipe) libremente al siguiente slide con el dedo o mouse
        arrows: true,            // Muestra las flechas izquierda/derecha para navegar manualmente
        slidesToShow: 1,         // Cantidad de slides visibles al mismo tiempo
        slidesToScroll: 1        // Cantidad de slides que avanza cada vez
    };

    return (
        <>
            <Slider {...settings} className="contenedor_carrusel">
            {imgs.map((img, i) => (
                <div key={i} className="caja_carrusel">
                    <div className="caja_carrusel_2">
                        <img className="img_carrusel" src={img} alt=""/>
                    </div>
                </div>
            ))}
            </Slider>
        </>
    );
};

export default Carrusel;
