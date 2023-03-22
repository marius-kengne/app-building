import React from "react";
import { createRoot } from "react-dom/client";
import Start from './components/Start.jsx';

const container = document.getElementById('contenu');


const root = createRoot(container);
root.render(
    <React.StrictMode>
        <Start />
    </React.StrictMode>

)