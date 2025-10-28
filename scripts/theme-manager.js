// Theme-Manager: dynamischer Wechsel der Theme-Datei
document.addEventListener("DOMContentLoaded", () => {
  const themeSelector = document.getElementById("theme-selector");
  const themeLink = document.getElementById("theme-link");

  // aus localStorage laden (Theme speichern über Sitzungen hinweg)
  const savedTheme = localStorage.getItem("selectedTheme") || "beige";
  themeLink.href = `design/themes/${savedTheme}.css`;
  themeSelector.value = savedTheme;

  // Wechsel bei Änderung im Dropdown
  themeSelector.addEventListener("change", (e) => {
    const newTheme = e.target.value;
    themeLink.href = `design/themes/${newTheme}.css`;
    localStorage.setItem("selectedTheme", newTheme);
  });
});
