import React, {useState, useEffect} from 'react';
import {Header} from "./components/Molecules/Header";
import {Sidebar} from "./components/Molecules/Sidebar";
import {Main} from "./components/Organisms/Main";
import {Footer} from "./components/Molecules/Footer";

function App() {
    return (
        <div className="App">
            <body id="kt_body" className="header-fixed header-tablet-and-mobile-fixed" data-sidebar="off">

            <div id="root">
                <div className="d-flex flex-column flex-root">
                    <div className="page d-flex flex-row flex-column-fluid">
                        <div className="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                            <Header/>
                            <Sidebar/>
                            <Main/>
                            <Footer/>

                        </div>
                    </div>
                </div>
            </div>
            </body>
        </div>
    );
}

export default App;