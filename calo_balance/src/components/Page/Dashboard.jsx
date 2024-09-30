import React, {useState} from "react";
import {Header} from "../../components/Molecules/Header";
import {Sidebar} from "../../components/Molecules/Sidebar";
import {Main} from "../../components/Organisms/Main";
import {Footer} from "../../components/Molecules/Footer";

export function Dashboard() {

    return (
        <div className="d-flex flex-column flex-root">
            <div className="page d-flex flex-row flex-column-fluid">
                <div className="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <Header/>
                    <Main/>
                    <Sidebar/>
                    <Footer/>
                </div>
            </div>
        </div>
    )
}