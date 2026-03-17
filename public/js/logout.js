async function logout() {
    const token = localStorage.getItem('token');

    await fetch('/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    });

    localStorage.removeItem('token');
    window.location.href = '/login';
}
