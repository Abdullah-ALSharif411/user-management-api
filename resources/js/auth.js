

//للتسجيل 
document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const data = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value,
        role: document.getElementById('role').value
    };

    const response = await fetch('http://127.0.0.1:8000/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();

    if (response.ok) {
        // حفظ التوكن
        localStorage.setItem('token', result.token);

        // تحويل حسب الدور
        if (result.user.role === 'Admin') {
            window.location.href = '/admin';
        } else if (result.user.role === 'Merchant') {
            window.location.href = '/merchant';
        } else {
            window.location.href = '/tasks';
        }

    } else {
        // عرض الأخطاء
        let errorsDiv = document.getElementById('errors');
        errorsDiv.innerHTML = '';

        if (result.errors) {
            Object.values(result.errors).forEach(err => {
                errorsDiv.innerHTML += `<p style="color:red">${err[0]}</p>`;
            });
        } else {
            alert(result.message);
        }
    }
});



//لتسجيل الدخول 

document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('http://127.0.0.1:8000/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    });

    const data = await response.json();

    if (response.ok) {
        // حفظ التوكن
        localStorage.setItem('token', data.Token);

        // تحويل المستخدم
        window.location.href = '/dashboard';
    } else {
        alert(data.msg || 'Login failed');
    }
});

