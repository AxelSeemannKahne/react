import React, {useState} from "react";
import MenuIcon from '../../icons/duotone/Text/Article.svg';
import {LogoutButton} from "../../components/Atoms/LogoutButton";


export function Header(){

    return (

        <div className="container">
            <div id="kt_header" className="header d-flex align-items-center justify-content-between w-100">

                <div className="d-flex align-center">
                    <button
                        className="btn btn-icon btn-accent me-3 me-lg-6"
                        id="kt_mega_menu_toggle"
                    >
                        <img src={MenuIcon}/>
                    </button>
                    <h3 className="text-dark fw-bolder my-3 fs-2">Calo-Balance</h3>
                </div>


                <div>
                    <button type="button" className="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        + Preset
                    </button>

                    <LogoutButton/>
                </div>

            </div>
        </div>

    );

}
