import React from "react";
import AllPost from "./Components/AllPost";
import CreatePost from "./Components/CreatePost";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import EditPost from "./Components/EditPost";
import "./Components/style.css";
import About from "./Components/About";

function App() {
  return (
    <BrowserRouter>
      <header>
        <h1>Bird Blog</h1>
        <nav>
          <ul>
            <li>
              <Link to={"/"}>Home</Link>
            </li>
            <li>
              <Link to={"/create"}>Create</Link>
            </li>
            <li>
              <Link to={"/about"}>About</Link>
            </li>
          </ul>
        </nav>
      </header>
      <div className="main">
        <Routes>
          <Route path="/" element={<AllPost />} />
          <Route path="/create" element={<CreatePost />} />
          <Route path="/edit/:id" element={<EditPost />} />
          <Route path="/about" element={<About />} />
        </Routes>
      </div>
    </BrowserRouter>
  );
}

export default App;
