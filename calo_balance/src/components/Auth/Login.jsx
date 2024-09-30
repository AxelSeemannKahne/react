import React, { useState } from "react";
import {useNavigate} from 'react-router-dom'
import winnerIllustration from '../../images/winner.png';
import logo from "../../images/sport.png";
import formIllustration from "../../images/terms-1.png";


export function Login() {

    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [token, setToken] = useState(localStorage.getItem('token'));

    const handleUsernameChange = (event) => {
        setUsername(event.target.value);
    }
    const handlePasswordChange = (event) => {
        setPassword(event.target.value);
    }

    const handleLogin = (data) => {
        // Speichere das Token im Local Storage
        localStorage.setItem('token', data.token);
        setToken(data.token);
    };

    const navigate = useNavigate();

    const handleSubmit = (event) => {
        event.preventDefault();

        // Build the request body with username and password
        const body = {
            username,
            password,
        };

        fetch('https://restapi.seemann-kahne.de/api/auth', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(body),
        })
            .then(response => response.json())
            .then(data => {

                if (data.token){
                    console.log('Login successful:', data.token);
                    handleLogin(data);
                    navigate('/Dashboard');
                }
                else {
                    console.log (data.error);
                }

            })
            .catch(error => {
                console.error('Login error:', error);
            });
    };


    return (

        <div className="d-flex flex-column flex-root">
            <div className="d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
                <div className="d-flex flex-column flex-lg-row-auto bg-primary w-lg-600px pt-15 pt-lg-0">
                    <div className="d-flex flex-column-auto flex-column pt-lg-40 pt-15 text-center">
                        <a className="mb-6" href="/start-react-free/">
                            <img alt="Logo" src={logo} className="h-75px" />
                        </a>
                        <h3 className="fw-bolder fs-2x text-white lh-lg">
                            <span>Discover Start<br/>with great build tools</span>
                        </h3>
                    </div>
                    <div className="d-flex flex-row-fluid bgi-size-contain bgi-no-repeat bgi-position-y-bottom bgi-position-x-center min-h-350px"
                         style={{
                             backgroundImage: `url(${winnerIllustration})`,
                         }}>></div>
                </div>
                <div className="login-content flex-lg-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden py-20 px-10 p-lg-7 mx-auto mw-450px w-100">
                    <div className="d-flex flex-column-fluid flex-center py-10">
                        <form className="form w-100" id="kt_login_signin_form" onSubmit={handleSubmit}>

                            <div className="pb-lg-15">
                                <h3 className="fw-bolder text-dark display-6">Welcome to Start</h3>
                                <div className="text-muted fw-bold fs-3">
                                    New Here?{" "}
                                </div>
                            </div>


                            <div className="mb-lg-15 alert alert-info">
                                <div className="alert-text ">
                                    Use credentials <strong>admin@demo.com</strong> and{" "}
                                    <strong>demo</strong> to sign in.
                                </div>
                            </div>



                            <div className="v-row mb-10 fv-plugins-icon-container">
                                <label className="form-label fs-6 fw-bolder text-dark">E-Mail</label>
                                <input
                                    placeholder="Email"
                                    className="form-control form-control-lg form-control-solid"
                                    type="username"
                                    name="username"
                                    value={username}
                                    onChange={handleUsernameChange}
                                    autoComplete="off"
                                />

                                <div className="fv-plugins-message-container">
                                    <div className="fv-help-block"></div>
                                </div>

                            </div>

                            <div className="fv-row mb-10 fv-plugins-icon-container">
                                <div className="d-flex justify-content-between mt-n5">
                                    <label className="form-label fs-6 fw-bolder text-dark pt-5">
                                        Password
                                    </label>
                                </div>
                                <input
                                    type="password"
                                    autoComplete="off"
                                    name="password"
                                    value={password}
                                    onChange={handlePasswordChange}
                                    className="form-control form-control-lg form-control-solid"
                                />

                            </div>

                            <div className="pb-lg-0 pb-5">
                                <button
                                    type="submit"
                                    id="kt_login_signin_form_submit_button"
                                    className="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3" >
                                    Sign In
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    );
}