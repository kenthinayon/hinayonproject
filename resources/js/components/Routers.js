import React from "react";
import ReactDom from "react-dom";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";

import Example from "./Example";
import Home from "./Home";       

export default function Routers() {
    return (
        <Router>
            <Routes>
                <Route path="/Example" element={<Example />} />
                <Route path="/Home" element={<Home />} />
            </Routes>
        </Router>
    );
}

if(document.getElementById("app")){
    ReactDom.render(<Routers/>, document.getElementById("app"));
}