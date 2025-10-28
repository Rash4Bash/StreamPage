// Nachricht speichern
document.querySelector('#message-form')?.addEventListener('submit', e => {
  e.preventDefault();
  const message = document.querySelector('#message').value;
  localStorage.setItem('siteMessage', message);
  alert('Nachricht gespeichert!');
});

// Streamingplan speichern
document.querySelector('#plan-form')?.addEventListener('submit', e => {
  e.preventDefault();
  const day = document.querySelector('#day').value;
  const time = document.querySelector('#time').value;
  const plan = JSON.parse(localStorage.getItem('streamingPlan')) || {};
  plan[day] = time;
  localStorage.setItem('streamingPlan', JSON.stringify(plan));
  alert('Streamingplan aktualisiert!');
});
