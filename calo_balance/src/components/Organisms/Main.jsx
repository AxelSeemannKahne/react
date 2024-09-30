import React, {useState} from "react";
import {PresetForm} from "../Forms/PresetForm";
import {StartContent} from "../Molecules/StartContent";
import {Calories} from "../Charts/Calories";
import {Intake} from "../Charts/Intake";
import {Balance} from "../Charts/Balance";


export function Main(){

    return (
        <div className="d-flex flex-column flex-column-fluid">
            <div className="content fs-6 d-flex flex-column-fluid" id="kt_content">
                <div className="container">

                    <div className="row mb-6">
                        <div className="col-12 col-lg-3">
                            <StartContent/>
                        </div>
                        <div className="col-12 col-lg-3">
                            <Calories/>
                        </div>
                        <div className="col-12 col-lg-3">
                            <Intake/>
                        </div>
                        <div className="col-12 col-lg-3">
                            <Balance/>
                        </div>
                    </div>

                    <div className="row">

                        <div className="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div className="modal-dialog modal-dialog-centered">
                                <div className="modal-content bg-accent">
                                    <div className="modal-header p-10">
                                        <div className="modal-title fs-5" id="exampleModalLabel"><h2>Neues Preset erstellen</h2></div>
                                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div className="modal-body p-10 pb-0">
                                       <PresetForm />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}