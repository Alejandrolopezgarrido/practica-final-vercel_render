import axios from 'axios';

const api = axios.create({
    // IMPORTANTE: Al usar Route::apiResource en Laravel, 
    // la URL siempre debe llevar /api al final.
    baseURL: 'https://backend-practica-0bwi.onrender.com/api', 
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

export default api;