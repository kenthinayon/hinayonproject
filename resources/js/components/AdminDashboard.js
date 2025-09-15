import React, { useState, useEffect } from "react";
import axios from "axios";

export default function AdminDashboard() {
    const [users, setUsers] = useState([]);
    const [logs, setLogs] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const user = JSON.parse(localStorage.getItem("user"));

    // Fetch users and login logs from Laravel API
    useEffect(() => {
        const fetchData = async () => {
            try {
                const token = localStorage.getItem("authToken");
                const config = {
                    headers: { Authorization: `Bearer ${token}` },
                };

                // Fetch users
                const usersResponse = await axios.get("/api/users", config);
                setUsers(usersResponse.data);

                // Fetch login logs
                const logsResponse = await axios.get("/api/login-logs", config);
                setLogs(logsResponse.data);

                setLoading(false);
            } catch (err) {
                setError("Failed to load data. Please try again.");
                setLoading(false);
            }
        };

        fetchData();
    }, []);

    return (
        <div className="admin-dashboard min-h-screen bg-gray-100 p-8">
            <header className="bg-white shadow-md p-4 mb-8 fixed top-0 left-0 right-0 z-10">
                <h1 className="text-2xl font-bold text-gray-800">
                    Father Saturnino Urios University - Admin Dashboard
                </h1>
                {user && (
                    <p className="text-sm text-gray-600">Logged in as: {user.email}</p>
                )}
            </header>
            <div className="mt-20">
                <h2 className="text-3xl font-bold mb-6">Admin Dashboard</h2>
                <p className="text-lg mb-6">
                    Welcome to the admin dashboard. Here you can manage the application settings and user accounts.
                </p>

                {error && (
                    <p className="text-red-500 mb-4">{error}</p>
                )}

                {loading ? (
                    <p className="text-lg">Loading...</p>
                ) : (
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {/* User Management */}
                        <div className="bg-white p-6 rounded-lg shadow-md">
                            <h3 className="text-xl font-semibold mb-4">User Management</h3>
                            <table className="w-full text-left">
                                <thead>
                                    <tr className="bg-gray-200">
                                        <th className="p-2">ID</th>
                                        <th className="p-2">Name</th>
                                        <th className="p-2">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {users.map((user) => (
                                        <tr key={user.id} className="border-b">
                                            <td className="p-2">{user.id}</td>
                                            <td className="p-2">{user.name}</td>
                                            <td className="p-2">{user.email}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {/* Recent Activity Logs */}
                        <div className="bg-white p-6 rounded-lg shadow-md">
                            <h3 className="text-xl font-semibold mb-4">Recent Login Activity</h3>
                            <table className="w-full text-left">
                                <thead>
                                    <tr className="bg-gray-200">
                                        <th className="p-2">User ID</th>
                                        <th className="p-2">Email</th>
                                        <th className="p-2">Login Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {logs.map((log) => (
                                        <tr key={log.id} className="border-b">
                                            <td className="p-2">{log.user_id}</td>
                                            <td className="p-2">{log.email}</td>
                                            <td className="p-2">{new Date(log.login_time).toLocaleString()}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {/* Settings Placeholder */}
                        <div className="bg-white p-6 rounded-lg shadow-md">
                            <h3 className="text-xl font-semibold mb-4">Settings</h3>
                            <p className="text-gray-600">
                                Manage application settings here (e.g., update system configurations, roles, etc.).
                            </p>
                            {/* Add settings form or controls here */}
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}