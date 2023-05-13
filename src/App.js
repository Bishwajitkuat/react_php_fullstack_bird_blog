import React from "react";
import All_post from "./Components/All_post";
import Create_post from "./Components/Create_post";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Edite_post from "./Components/Edite_post";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<All_post />} />
        <Route path="/create" element={<Create_post />} />
        <Route path="/edit/:id" element={<Edite_post />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
