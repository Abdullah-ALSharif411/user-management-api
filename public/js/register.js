document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const data = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value,
        role: document.getElementById('role').value
    };

    const response = await fetch('/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();

    if (response.ok) {
        localStorage.setItem('token', result.token);

        if (result.user.role === 'Admin') {
            window.location.href = '/admin';
        } else if (result.user.role === 'Merchant') {
            window.location.href = '/merchant';
        } else {
            window.location.href = '/tasks';
        }
    } else {
        document.getElementById('errors').innerHTML = '';
        Object.values(result.errors).forEach(e => {
            document.getElementById('errors').innerHTML += `<p>${e[0]}</p>`;
        });
    }
});
