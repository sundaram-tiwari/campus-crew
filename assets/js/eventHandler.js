document.addEventListener("DOMContentLoaded", () => {
  const courseFilter = document.getElementById("courseFilter");
  const dateFilter = document.getElementById("dateFilter");
  const searchFilter = document.getElementById("searchFilter");
  const eventsGrid = document.getElementById("eventsGrid");

  function fetchEvents() {
    const course = courseFilter.value;
    const date = dateFilter.value;
    const search = searchFilter.value;

    const url = `events/fetch_events.php?course=${encodeURIComponent(course)}&date=${encodeURIComponent(date)}&search=${encodeURIComponent(search)}`;

    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        eventsGrid.innerHTML = "";
        if (data.length == 0) {
          eventsGrid.innerHTML = `
                    <p>No Events Found.</p>`;
          return;
        }

        data.forEach((event) => {
          const card = document.createElement("div");
          card.classList.add("event-card");

          card.innerHTML = `
                    <a href="events/event_detail.php?id=${event.event_id}" class="event-link">
                    <img src="${event.image_url}" alt="Event Image">
                    <div class="event-info">
                        <h3>${event.title}</h3>
                        <p>${event.event_date} at ${event.event_time}</p>
                        <p class="category">${event.category}</p>
                    </div>
                `;
          eventsGrid.appendChild(card);
        });
      })
      .catch((err) => console.error("Error fetching events: ", err));
  }

  fetchEvents();

  courseFilter.addEventListener('change',fetchEvents);
  dateFilter.addEventListener('change',fetchEvents);
  searchFilter.addEventListener('keyup',fetchEvents);

});
