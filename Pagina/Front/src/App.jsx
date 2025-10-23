import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom"
import Inicio from "./Paginas/Inicio";
import Vuelos from "./Paginas/Vuelos";
import Asientos from "./Paginas/Asientos";
import Datos_Usuario from "./Paginas/Datos_Usuario";
import Datos_Pago from "./Paginas/Datos_Pago";

const App = () => {
  return(
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Inicio/>}/> 
        <Route path="/Vuelos" element={<Vuelos/>}/> 
        <Route path="/Asientos" element={<Asientos/>}/> 
        <Route path="/Datos_Usuario" element={<Datos_Usuario/>}/> 
        <Route path="/Datos_Pago" element={<Datos_Pago/>}/> 
      </Routes>
    </BrowserRouter>
  )
}

export default App