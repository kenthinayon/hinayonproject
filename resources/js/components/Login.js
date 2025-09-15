import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";

export default function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState(null);
    const navigate = useNavigate();

    // Fetch CSRF token
    const getCsrfToken = async () => {
        try {
            await axios.get("/sanctum/csrf-cookie", { withCredentials: true });
        } catch (err) {
            setError("Failed to fetch CSRF token. Please refresh and try again.");
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError(null);

        try {
            // Fetch CSRF token
            await getCsrfToken();

            // Make login request to Laravel API
            const response = await axios.post(
                "/api/login",
                { email, password },
                { withCredentials: true, headers: { Accept: "application/json" } }
            );

            // Store token and user in localStorage
            const { token, user } = response.data;
            localStorage.setItem("authToken", token);
            localStorage.setItem("user", JSON.stringify(user));

            // Navigate to admin dashboard
            navigate("/admin");
        } catch (err) {
            // Handle specific HTTP errors
            if (err.response?.status === 405) {
                setError("Server error: POST method not supported for login route. Contact your administrator.");
            } else {
                setError(
                    err.response?.data?.message || "Login failed. Please check your credentials and try again."
                );
            }
        }
    };

    return (
        <div className="nav-login flex flex-col items-center justify-center min-h-screen bg-gray-100">
            <img
                className="login-logo"
                style={{ width: "100px", marginBottom: "20px" }}
            />
            <div className="login-form bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h2 className="text-2xl font-bold text-center mb-6">
                    Father Saturnino Urios University
                    <br />
                    Academic Administration Dashboard
                </h2>
                {error && (
                    <p className="error text-red-500 text-center mb-4">{error}</p>
                )}
                <form onSubmit={handleSubmit}>
                    <div className="mb-4">
                        <label className="block text-gray-700 font-medium mb-2">
                            Email:
                        </label>
                        <input
                            type="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            required
                            className="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div className="mb-6">
                        <label className="block text-gray-700 font-medium mb-2">
                            Password:
                        </label>
                        <input
                            type="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                            className="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <button
                        type="submit"
                        className="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition"
                    >
                        Login
                    </button>
                </form>
            </div>
        </div>
    );
}