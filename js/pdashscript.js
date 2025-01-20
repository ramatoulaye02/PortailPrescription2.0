
/*

const pharmacies = [
    { id: 1, name: "Pharmacie Jean Coutu", address: "305 Rue Sherbrooke, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 2, name: "Uniprix Clinique", address: "3575 Avenue Park, Montreal, QC", services: ["Pickup"] },
    { id: 3, name: "Pharmacie Proxim", address: "1000 Rue Saint-Denis, Montreal, QC", services: ["Delivery"] },
    { id: 4, name: "Familiprix", address: "933 Boulevard René Lévesque, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 5, name: "Pharmacie Jean Coutu", address: "614 Rue Saint-Jacques, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 6, name: "Pharmacie Jean Coutu", address: "1000 Rue Wellington, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 7, name: "Familiprix Clinique", address: "933 Boulevard René Lévesque, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 8, name: "Pharmaprix", address: "901 Rue Sainte-Catherine, Montreal, QC", services: ["Delivery"] },
    { id: 9, name: "Proxim", address: "1485 R.Atateken, Montreal, QC", services: ["Pickup"] },
    { id: 10, name: "RightRx", address: "1140 Avenue Des Pins O, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 11, name: "Uniprix", address: "3575 Avenue du Park, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 12, name: "Sopropharm", address: "1200 Avenue Mcgill College, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 13, name: "Laser", address: "1117 Rue Sainte-Catherine, Montreal, QC", services: ["Delivery"] },
    { id: 14, name: "Pharmaprix", address: "3861 Boulevard Saint-Laurent, Montreal, QC", services: ["Pickup", "Delivery"] },
    { id: 15, name: "Uniprix Clinique", address: "1538 Rue Sherbroooke, Montreal, QC", services: ["Pickup", "Delivery"] },
 
 
 ];
 let selectedDeliveryOption = null;
 

 
 let prescriptions = [
    { id: 1, name: "Acetaminophen", status: "Outdated", service: ["Pickup","Delivery"] },
    { id: 2, name: "Albuterol", status: "In Process", service: ["Pickup","Delivery"]},
    { id: 3, name: "Insulin", status: "Picked Up", service: ["Pickup","Delivery"] },
    { id: 4, name: "Paracetamol", status: "In Process", service: ["Pickup","Delivery"] },
    { id: 5, name: "Ibuprofen", status: "Outdated", service: ["Pickup","Delivery"] },
    { id: 6, name: "Amoxillin", status: "Picked Up", service: ["Pickup","Delivery"] },
    { id: 7, name: "Metformin", status: "In Process", service: ["Pickup","Delivery"] },
    { id: 8, name: "Aspirin", status: "Outdated", service: ["Pickup","Delivery"] },
    { id: 9, name: "Methadone", status: "Picked Up", service: ["Pickup","Delivery"] },
    { id: 10, name: "Oxycodone", status: "In Process", service: ["Pickup","Delivery"]},
    { id: 11, name: "Losartan", status: "Picked Up", service: ["Pickup","Delivery"] },
    { id: 12, name: "Matformin", status: "Outdated", service: ["Pickup","Delivery"] },
    { id: 13, name: "Vitamin D", status: "Outdated", service: ["Pickup","Delivery"] },
    { id: 14, name: "Benzonatate", status: "In Process", service: ["Pickup","Delivery"]},
    { id: 15, name: "Lisinopril", status: "Picked Up", service: ["Pickup","Delivery"] },
    { id: 16, name: "Estradiol", status: "In Process", service: ["Pickup","Delivery"] },
    { id: 17, name: "Famotidine", status: "In Process", service: ["Pickup","Delivery"] }
 
 
 ];
 
 
 
 
 
 
 // Function to render prescriptions list
 function renderPrescriptions() {
    const prescriptionList = document.getElementById("prescription-list");
    prescriptionList.innerHTML = ""; // Clear existing list
 
 
    prescriptions.forEach(prescription => {
        const card = document.createElement("div");
        card.classList.add("prescription-card");
        card.innerHTML = `
            <h3>${prescription.name}</h3>
            <p>Status: <span>${prescription.status}</span></p>
        `;
        card.onclick = () => viewPrescriptionDetail(prescription);
        prescriptionList.appendChild(card);
    });
 }
 
 
 // Function to view the prescription details
 function viewPrescriptionDetail(prescription) {
    const modal = document.getElementById("prescription-modal");
    const detailText = document.getElementById("prescription-detail");
    detailText.innerHTML = `Prescription Name: ${prescription.name} <br> Status: ${prescription.status}`;
    modal.style.display = "block";
 
 
    if (prescription.status === "Picked Up" || prescription.status === "Outdated" | prescription.status === "Ordered") {
        // Disable the "Choose Pharmacy" button
        document.querySelector("button").disabled = true;
        document.querySelector("button").style.backgroundColor = "#ccc"; // Optional: visually disable button
       
        // Show a message in the modal about the current status
        orderStatus.innerHTML = prescription.status === "Ordered"
            ? "Your prescription has been ordered and is being processed."
            : "This prescription is outdated and cannot be updated.";
        orderStatus.style.display = "block";
    }
 
 
 
 
 
 
   /*if (prescription.status == "Ordered"){
       
 
 
        const pharmacyId = prescription.pharmacyId;
        const pharmacy = pharmacies.find(p => p.id === pharmacyId);
 
 
        const service = prescription.service;
 
 
        if (service === "Pickup"){
            orderStatus.innerHTML = 'Your prescription can be picked up in <strong>${pharmacy.name}</strong> at <strong>${pharmacy.address}</strong>.'
 
 
        }else if (service == "Delivery"){
            orderStatus.innerHTML = 'Your order has been recieved and will be delivered the next 72 hours.';
        }
 
 
        orderStatus.style.display = "block";
    } else {
        document.querySelector("button").disabled = false;
        document.querySelector("button").style.backgroundColor = "#333";
        orderStatus.style.display = "none";
    }
 
 

    if (prescription.status === "In Process") {
        document.querySelector("button").style.display = "inline-block";
    } else {
        document.querySelector("button").style.display = "none";
    }
 }
 
 
 // Close the modal
 function closeModal() {
    const modal = document.getElementById("prescription-modal");
    modal.style.display = "none";
 }
 
 
 */
 
 function choosePharmacy() {
    const pharmacyDropdown = document.getElementById("pharmacy-dropdown");
    pharmacyDropdown.innerHTML = `<option value="" disabled selected>Select a pharmacy</option>`; // Reset dropdown
 
 
    // Populate the dropdown with the hardcoded pharmacies
    pharmacies.forEach(pharmacy => {
        const option = document.createElement("option");
        option.value = pharmacy.id;
        option.textContent = pharmacy.name + " " + pharmacy.address;
        pharmacyDropdown.appendChild(option);
    });
 
 
    // Show the pharmacy selection section and hide the prescription modal
    document.getElementById("pharmacy-selection").style.display = "block";
    document.getElementById("prescription-modal").style.display = "none";
 
 
    pharmacyDropdown.addEventListener("change",displayPharmacyInfo);
 }
 
 
 function displayPharmacyInfo(){
    const pharmacyId = document.getElementById("pharmacy-dropdown").value;
    const pharmacy = pharmacies.find(p => p.id === parseInt(pharmacyId));
 
 
    if (pharmacy){
        document.getElementById("pharmacy-name").textContent = `Name: ${pharmacy.name}`;
        document.getElementById("pharmacy-address").textContent = `Address: ${pharmacy.address}`;
 
 
        const serviceOptions = document.getElementById("service-options");
        serviceOptions.innerHTML = "";
 
 
        pharmacy.services.forEach(service => {
            const option = document.createElement("option");
            option.value = service;
            option.textContent = service;
            serviceOptions.appendChild(option);
        });
    }
 }
 
 
 function placeOrder() {
    const pharmacyId = document.getElementById("pharmacy-dropdown").value;
    const pharmacy = pharmacies.find(p => p.id === parseInt(pharmacyId));
    const service = document.getElementById("service-options").value;
 
 
    if (!pharmacy || !service) {
        alert("Please select a pharmacy and the service you would like to have.");
        return;
    }
 
 
    selectedDeliveryOption = service;
 
 
   // alert(`Prescription ordered from ${pharmacy.name}!`);
    //document.getElementById("pharmacy-selection").style.display = "none"; // Hide pharmacy selection section
 
 
    // Update status to "Ordered"
    prescriptions = prescriptions.map(prescription => {
        if (prescription.status === "In Process") {
            prescription.status = "Ordered";
        }
        return prescription;
    });
 
 
    renderPrescriptions(); // Re-render the list with updated statuses
 
 
    /*if (selectedDeliveryOption == "Delivery"){
        document.getElementById("delivery-status").style.display = "block";
        document.getElementById("pickup-message").style.display = "none";
        document.getElementById("delivery-status").textContent = "Your prescription is on its way to your address from ${pharmacy.name}.";
 
 
        const deliveryTrackingStatus = document.createElement("div");
        deliveryTrackingStatus.textContent = "Order has been recieved. Your prescription will be delivered in the next 72 hours";
        document.getElementById("delivery-status").appendChild(deliveryTrackingStatus);
 
 
    } else if (selectedDeliveryOption == "Pickup"){
        document.getElementById("pickup-message").style.display = "block";
        document.getElementById("delivery-status").style.display = "none";
        document.getElementById("pickup-message").textContent = "Please come to ${pharmacy.name} at ${pharmacy.address} during opening hours for the pickup!";
    }*/
 
 
    document.getElementById("pharmacy-selection").style.display = "none";
 
 
 }
 
 function renderOrders() {
    const orderList = document.getElementById("order-list");
    orderList.innerHTML = ""; // Clear existing list

    orders.forEach((order) => {
        const card = document.createElement("div");
        card.classList.add("order-card");
        card.innerHTML = `
            <h3>${order.prescription_name}</h3>
            <p>Pharmacy: ${order.pharmacyName}</p>
            <p>Status: ${order.status}</p>
        `;
        orderList.appendChild(card);
    });
}

renderOrders();

 
 
 
 /*// Function to choose a pharmacy using Google Maps
 function choosePharmacy() {
    document.getElementById("prescription-modal").style.display = "none";
    document.getElementById("pharmacy-map").style.display = "block";
    initMap(); // Initialize Google Map
 }
 
 
 // Initialize Google Map
 function initMap() {
    const montreal = { lat: 45.5017, lng: -73.5673 }; // Montreal coordinates
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: montreal
    });
 
 
    const marker = new google.maps.Marker({
        position: montreal,
        map: map,
        title: "Montreal"
    });
 
 
    // Add more pharmacies as markers here if needed
 }
 
 
 // Function to place the order
 function placeOrder() {
    // Here you would update the status and store it in the database
    alert("Your prescription has been ordered!");
    document.getElementById("pharmacy-map").style.display = "none";
 
 
    // Update status to "Ordered"
    prescriptions = prescriptions.map(prescription => {
        if (prescription.status === "In Process") {
            prescription.status = "Ordered";
        }
        return prescription;
    });
 
 
    renderPrescriptions(); // Re-render the list with updated statuses
 }*/
 
 
 // Initial render
 renderPrescriptions();
 
 
 
 