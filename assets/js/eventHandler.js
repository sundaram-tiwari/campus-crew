document.addEventListener('DOMContentLoaded', () => {
    fetch('events/fetch_events.php')
        .then(response => response.json())
        .then(data => { 
            const eventGrid = document.getElementById("eventsGrid");
            eventGrid.innerHTML = "";

            console.log(data);
            data.forEach(event => {
                const card = document.createElement('div');
                card.classList.add("event-card");
                // card.dataset.category = event.category.toLowerCase();

                card.innerHTML = `
                    <img src="${event.image_url}" alt="Event Image">
                    <div class="event-info">
                        <h3>${event.title}</h3>
                        <p>${event.event_date} at ${event.event_time}</p>
                        <p class="category">${event.category}</p>
                    </div>
                `;
                eventGrid.appendChild(card);                
            });
        })
        .catch(err => console.error("Error fetching events: ", err));
});
