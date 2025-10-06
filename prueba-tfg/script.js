async function sendForm(url, data) {
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  const result = await res.json();
  document.getElementById('message').textContent = result.message;
}

document.getElementById('loginForm').addEventListener('submit', (e) => {
  e.preventDefault();
  sendForm('../backend/login.php', {
    username: document.getElementById('loginUser').value,
    password: document.getElementById('loginPass').value
  });
});

document.getElementById('registerForm').addEventListener('submit', (e) => {
  e.preventDefault();
  sendForm('../backend/register.php', {
    username: document.getElementById('registerUser').value,
    password: document.getElementById('registerPass').value
  });
});
