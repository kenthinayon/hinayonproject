import React from "react";
import {Link}  from "react-router-dom";

export default function Home() {
    return (
        <div>
            <Link to="/Example">Example</Link>
            <p>Welcome to the Home page!</p>
        </div>
    );
}