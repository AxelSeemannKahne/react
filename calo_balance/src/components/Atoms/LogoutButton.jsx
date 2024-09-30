import React, { useState } from 'react';
import {useNavigate} from 'react-router-dom'

export function LogoutButton() {
    const [isLoading, setIsLoading] = useState(false);
    const navigate = useNavigate();

    const handleLogout = async () => {
        setIsLoading(true);

        try {
            const response = await fetch('https://restapi.seemann-kahne.de/api/auth/logout', {
                method: 'POST',
            });

            if (!response.ok) {
                throw new Error('Fehler beim Abmelden');
            }
        } catch (error) {
            console.error('Fehler beim Abmelden:', error);
        } finally {
            setIsLoading(false);
            navigate('/');
        }
    };

    return (
        <button className="btn btn-danger ms-4" disabled={isLoading} onClick={handleLogout}>
            {isLoading ? 'Abmelden...' : 'Abmelden'}
        </button>
    );
}

export default LogoutButton;