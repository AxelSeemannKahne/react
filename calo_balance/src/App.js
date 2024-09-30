import React, {useState, useEffect} from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { useNavigate } from 'react-router-dom';
import {Dashboard} from "./components/Page/Dashboard";
import {Login} from "./components/Auth/Login";
import useIsAuthenticated from './hooks/useIsAuthenticated';

function App() {

    const isAuthenticated = useIsAuthenticated();

    return (

        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Login />} />
                <Route path="/Dashboard" element={<Dashboard />} />
            </Routes>
        </BrowserRouter>

        );
}

export default App;