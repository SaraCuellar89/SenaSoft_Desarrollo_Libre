import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom"
import Inicio from "./Paginas/Inicio";
import Vuelos from "./Paginas/Vuelos";
import Asientos from "./Paginas/Asientos";
import Datos_Usuario from "./Paginas/Datos_Usuario";

const App = () => {
  return(
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Inicio/>}/> 
        <Route path="/Vuelos" element={<Vuelos/>}/> 
        <Route path="/Asientos/:id_vuelo" element={<Asientos/>}/> 
        <Route path="/Datos_Usuario/:id_vuelo/:id_sillas" element={<Datos_Usuario/>}/> 
      </Routes>
    </BrowserRouter>
  )
}

export default App