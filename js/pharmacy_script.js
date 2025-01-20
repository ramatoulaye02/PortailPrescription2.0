function renderOrders() {
    const orderList = document.getElementById("order-list");
    orderList.innerHTML = ""; // Clear existing list

    orders.forEach((order) => {
        const card = document.createElement("div");
        card.classList.add("order-card");

        card.innerHTML = `
            <h3>${order.prescription_name}</h3>
            <p>Patient: ${order.patientName}</p>
            <p>Status: <span class="status">${order.status}</span></p>
            <div class="actions">
                <button class="update-status" data-id="${order.id}" data-status="Fulfilled" ${order.status !== "Pending" ? "disabled" : ""}>
                    Mark as Fulfilled
                </button>
                <button class="update-status" data-id="${order.id}" data-status="Cancelled" ${order.status !== "Pending" ? "disabled" : ""}>
                    Mark as Cancelled
                </button>
            </div>
        `;

        orderList.appendChild(card);
    });

    // Attach event listeners to update buttons
    const buttons = document.querySelectorAll(".update-status");
    buttons.forEach((button) => {
        button.addEventListener("click", async (e) => {
            const orderId = e.target.getAttribute("data-id");
            const newStatus = e.target.getAttribute("data-status");

            const response = await fetch("../php/update_order_status.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id: orderId, status: newStatus }),
            });

            if (response.ok) {
                // Update UI
                e.target.closest(".order-card").querySelector(".status").innerText = newStatus;
                const buttonsInCard = e.target.closest(".order-card").querySelectorAll(".update-status");
                buttonsInCard.forEach((btn) => btn.disabled = true);
            } else {
                alert("Failed to update the status. Please try again.");
            }
        });
    });
}

renderOrders();
