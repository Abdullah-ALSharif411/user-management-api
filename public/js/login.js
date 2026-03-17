document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const response = await fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        })
    });

    const result = await response.json();

    if (response.ok) {
        localStorage.setItem('token', result.Token);

        if (result.User.role === 'Admin') {
            window.location.href = '/admin';
        } else if (result.User.role === 'Merchant') {
            window.location.href = '/merchant';
        } else {
            window.location.href = '/tasks';
        }
    } else {
        document.getElementById('errors').innerText = result.msg;
    }
});
