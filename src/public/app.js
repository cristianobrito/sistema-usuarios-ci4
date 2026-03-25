const API = 'http://localhost:8080/api/users';

// carregar ao abrir
document.addEventListener('DOMContentLoaded', () => {
    loadUsers();
});

// submit do form
document.getElementById('userForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();

    // validação
    if (!name || name.length < 3) {
        showMessage('Nome deve ter pelo menos 3 caracteres', 'error');
        return;
    }

    try {
        showMessage('Salvando...', 'success');

        const res = await fetch(API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name })
        });

        const data = await res.json();

        if (data.status === 'error') {
            showMessage('Erro ao salvar', 'error');
            return;
        }

        showMessage('Usuário criado com sucesso!');

        document.getElementById('name').value = '';
        loadUsers();

    } catch (error) {
        showMessage('Erro na conexão com API', 'error');
    }
});

// 🔽 FORA DO EVENTO (IMPORTANTE)
async function loadUsers() {
    const res = await fetch(API);
    const data = await res.json();

    const list = document.getElementById('userList');
    list.innerHTML = '';

    data.data.forEach(user => {
        const li = document.createElement('li');
        li.innerHTML = `
            ${user.name}
            <button onclick="deleteUser(${user.id})">❌</button>
            <button onclick="editUser(${user.id}, '${user.name}')">✏️</button>
        `;
        list.appendChild(li);
    });
}

async function deleteUser(id) {
    if (!confirm('Tem certeza que deseja deletar?')) return;

    await fetch(`${API}/${id}`, {
        method: 'DELETE'
    });

    showMessage('Usuário removido!');
    loadUsers();
}

async function editUser(id, currentName) {
    const newName = prompt('Novo nome:', currentName);

    if (!newName || newName.length < 3) {
        showMessage('Nome inválido', 'error');
        return;
    }

    await fetch(`${API}/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name: newName })
    });

    showMessage('Usuário atualizado!');
    loadUsers();
}

function showMessage(text, type = 'success') {
    const msg = document.getElementById('message');

    msg.innerText = text;
    msg.style.color = type === 'error' ? 'red' : 'green';

    setTimeout(() => {
        msg.innerText = '';
    }, 3000);
}