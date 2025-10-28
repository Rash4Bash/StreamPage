document.addEventListener('DOMContentLoaded', () => {
  const msg = localStorage.getItem('siteMessage');
  if (msg) document.querySelector('#site-message').textContent = msg;

  const plan = JSON.parse(localStorage.getItem('streamingPlan')) || {};
  const tbody = document.querySelector('#streaming-table tbody');
  if (tbody) {
    Object.entries(plan).forEach(([day, time]) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${day}</td><td>${time}</td>`;
      tbody.appendChild(tr);
    });
  }
});
