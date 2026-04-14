const API_BASE = 'http://localhost:8787';

async function submitForm(event, endpoint) {
  event.preventDefault();
  const form = event.target;
  const statusEl = form.querySelector('.status');
  statusEl.textContent = 'Submitting...';
  statusEl.className = 'status';

  const formData = new FormData(form);
  const payload = Object.fromEntries(formData.entries());

  try {
    const res = await fetch(`${API_BASE}${endpoint}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    });

    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    statusEl.textContent = 'Submitted successfully. Thank you!';
    statusEl.className = 'status ok';
    form.reset();
  } catch (err) {
    statusEl.textContent = `Could not submit (${err.message}). Is the prototype API running?`;
    statusEl.className = 'status err';
  }
}

window.submitForm = submitForm;
