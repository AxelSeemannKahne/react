import { useState, useEffect } from 'react';

function useIsAuthenticated() {
    const [isAuthenticated, setIsAuthenticated] = useState(false);

    useEffect(() => {
        const storedToken = localStorage.getItem('token');
        if (storedToken) {
            setIsAuthenticated(true);
        }
    }, []);

    return isAuthenticated;
}

export default useIsAuthenticated;