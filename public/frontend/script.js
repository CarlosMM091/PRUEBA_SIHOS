const API_BASE = "http://127.0.0.1:8000/api";
const LOGIN_URL = `${API_BASE}/login`;
const PACIENTES_URL = `${API_BASE}/pacientes`;

// Helpers token
function getToken() { return localStorage.getItem('jwt_token') || null; }
function setToken(token) { localStorage.setItem('jwt_token', token); }
function removeToken() { localStorage.removeItem('jwt_token'); }

// Mostrar alert bootstrap
function showAlert(message, type = 'danger', targetId = 'mensaje') {
  const target = document.getElementById(targetId) || document.getElementById('alertContainer');
  if (!target) return;
  target.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
  setTimeout(() => { target.innerHTML = ''; }, 5000);
}

// LOGIN
async function loginUser(event) {
  event.preventDefault();
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  try {
    const res = await fetch(LOGIN_URL, {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ email, password })
    });

    const data = await res.json();
    if (!res.ok) return showAlert(data.message || 'Error en login');

    const token = data.access_token;
    setToken(token);
    window.location = 'index.html';
  } catch {
    showAlert('Error al conectar con el servidor');
  }
}

// CARGAR PACIENTES
async function cargarPacientes() {
  const tabla = document.getElementById('tablaPacientes');
  if (!tabla) return;

  const token = getToken();
  if (!token) return showAlert('No autenticado. Por favor inicia sesión.', 'warning', 'alertContainer');

  try {
    const res = await fetch(PACIENTES_URL, { headers: { 'Authorization': `Bearer ${token}` } });
    const data = await res.json();

    tabla.innerHTML = data.map(p => `
      <tr>
        <td>${p.id}</td>
        <td>${p.nombre1} ${p.apellido1}</td>
        <td>${p.numero_documento}</td>
        <td>${p.correo || ''}</td>
        <td>
          <button class="btn btn-sm btn-primary" onclick="editar(${p.id})">Editar</button>
          <button class="btn btn-sm btn-danger" onclick="eliminar(${p.id})">Eliminar</button>
        </td>
      </tr>
    `).join('');
  } catch {
    tabla.innerHTML = `<tr><td colspan="5" class="text-danger text-center">Error al cargar pacientes</td></tr>`;
  }
}

// REGISTRAR PACIENTE
async function registrarPaciente(event) {
  event.preventDefault();
  const token = getToken();
  if (!token) return showAlert('No autenticado.');

  const payload = {
    tipo_documento_id: +document.getElementById('tipo_documento_id').value,
    numero_documento: document.getElementById('numero_documento').value,
    nombre1: document.getElementById('nombre1').value,
    nombre2: document.getElementById('nombre2').value || null,
    apellido1: document.getElementById('apellido1').value,
    apellido2: document.getElementById('apellido2').value || null,
    genero_id: +document.getElementById('genero_id').value,
    departamento_id: +document.getElementById('departamento_id').value,
    municipio_id: +document.getElementById('municipio_id').value,
    correo: document.getElementById('correo').value
  };

  const res = await fetch(PACIENTES_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Authorization': `Bearer ${token}` },
    body: JSON.stringify(payload)
  });

  const data = await res.json();
  if (!res.ok) return showAlert(data.message || 'Error al crear paciente');

  showAlert('Paciente creado correctamente', 'success');
  setTimeout(() => window.location = 'index.html', 1200);
}

// EDITAR PACIENTE
function editar(id) {
  window.location = `edit.html?id=${id}`;
}

// CARGAR DATOS EN EDITAR
async function cargarPacienteEditar() {
  const id = new URLSearchParams(window.location.search).get('id');
  if (!id) return;
  const token = getToken();

  const res = await fetch(`${PACIENTES_URL}/${id}`, { headers: { 'Authorization': `Bearer ${token}` } });
  const data = await res.json();

  document.getElementById('paciente_id').value = data.id;
  document.getElementById('nombre1').value = data.nombre1;
  document.getElementById('apellido1').value = data.apellido1;
  document.getElementById('correo').value = data.correo || '';
}

// ACTUALIZAR PACIENTE
async function actualizarPaciente(event) {
  event.preventDefault();
  const id = document.getElementById('paciente_id').value;
  const token = getToken();

  const payload = {
    nombre1: document.getElementById('nombre1').value,
    apellido1: document.getElementById('apellido1').value,
    correo: document.getElementById('correo').value
  };

  const res = await fetch(`${PACIENTES_URL}/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Authorization': `Bearer ${token}` },
    body: JSON.stringify(payload)
  });

  const data = await res.json();
  if (!res.ok) return showAlert(data.message || 'Error al actualizar paciente');
  showAlert('Paciente actualizado correctamente', 'success');
  setTimeout(() => window.location = 'index.html', 1200);
}

// ELIMINAR PACIENTE
async function eliminar(id) {
  if (!confirm('¿Seguro que deseas eliminar este paciente?')) return;
  const token = getToken();

  const res = await fetch(`${PACIENTES_URL}/${id}`, {
    method: 'DELETE',
    headers: { 'Authorization': `Bearer ${token}` }
  });

  const data = await res.json();
  if (!res.ok) return showAlert(data.message || 'Error al eliminar paciente');
  showAlert('Paciente eliminado correctamente', 'success', 'alertContainer');
  cargarPacientes();
}

// LOGOUT
function logout() { removeToken(); window.location = 'login.html'; }

// EVENTOS
document.addEventListener('DOMContentLoaded', () => {
  if (document.getElementById('formLogin')) document.getElementById('formLogin').addEventListener('submit', loginUser);
  if (document.getElementById('formPaciente')) document.getElementById('formPaciente').addEventListener('submit', registrarPaciente);
  if (document.getElementById('tablaPacientes')) cargarPacientes();
  if (document.getElementById('btnLogout')) document.getElementById('btnLogout').addEventListener('click', logout);
  if (document.getElementById('formEditar')) {
    cargarPacienteEditar();
    document.getElementById('formEditar').addEventListener('submit', actualizarPaciente);
  }
});
