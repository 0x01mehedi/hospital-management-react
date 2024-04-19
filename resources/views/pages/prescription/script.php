<script>
    // JavaScript code for dynamic functionalities
    @section('scripts')
<script>
    $(function () {
        // Function to fetch doctor information when selecting a doctor
        $("#cmbDoctors").on("change", function () {
            $.ajax({
                url: "{{route('doctors.store')}}",
                type: 'GET',
                data: {
                    "id": $(this).val()
                },
                success: function (res) {
                    let data = JSON.parse(res);
                    let doctor = data.doctor;

                    $("#doctor-info").html(`<p class="mb-1"><strong>Designation: </strong>${doctor.designation}</p>
                    <p class="mb-1"><strong>Phone: </strong>${doctor.phone_number}</p>
                    <p class="mb-1"><strong>Email: </strong>${doctor.email}</p>`)
                }
            });
        });

        // Function to fetch patient information when selecting a patient
        $("#cmbPatients").on("change", function () {
            $.ajax({
                url: '{{ route("api.Patient.findDetails") }}',
                type: 'GET',
                data: {
                    "id": $(this).val()
                },
                success: function (res) {
                    let data = JSON.parse(res);
                    let patient = data.patient;

                    let dob = new Date(patient.dob);
                    let today = new Date();
                    let ageInMonths = (today.getFullYear() - dob.getFullYear()) * 12 + (today.getMonth() - dob.getMonth());
                    let years = Math.floor(ageInMonths / 12);
                    let months = ageInMonths % 12;

                    $("#patient-info").html(`<p class="mb-1"><strong>Gender: </strong>${patient.gender}</p>
                    <p class="mb-1"><strong>Contact: </strong>${patient.contact_number} </p>
                    <p class="mb-1"><strong>Email: </strong>${patient.email} </p>
                    <p class="mb-1"><strong>Age: </strong>${years} years and ${months} months</p>`);
                }
            });
        });

        // Function to add medicine to the list
        $("#btnAddMedicine").on("click", function () {
            let name = $("#cmbMedicines option:selected").text();
            let medicine_id = $("#cmbMedicines").val();
            let dosage = $("#txtDosage").val();
            let days = $("#txtDays").val();
            let instructions = $("#txtInstructions").val();

            let medicine = {
                "name": name,
                "medicine_id": medicine_id,
                "dosage": dosage,
                "days": days,
                "instructions": instructions
            };

            medicines.push(medicine);

            printMedicineList(medicines);
            clearInputFields();
        });

        // Function to delete medicine from the list
        $("body").on("click", ".deleteMedicine", function () {
            let medicine_id = $(this).data("id");

            medicines = medicines.filter(medicine => {
                return medicine.medicine_id != medicine_id;
            });

            printMedicineList(medicines);
        });

        // Function to print the prescription
        $("#btnPrint").on("click", async function () {
            let prescriptionContent = await generatePrescriptionContent();
            let printWindow = window.open('', '_blank');
            printWindow.document.write(prescriptionContent);
            printWindow.document.close();
            printWindow.print();
        });

        // Function to generate the prescription content
        async function generatePrescriptionContent() {
            // Fetch and format doctor information
            let doctorId = $("#cmbDoctors").val();
            let doctorInfo = await getDoctorInfo(doctorId);

            // Fetch and format patient information
            let patientId = $("#cmbPatients").val();
            let patientInfo = await getPatientInfo(patientId);

            // Collect CC, Advice, Follow Up information
            let cc = $("#cc").val();
            let advice = $("#advice").val();
            let followUp = $("#followUp").val();

            // Collect medicines details
            let medicinesTable = $("#medicinesDetails").clone();
            medicinesTable.find("tr:last").remove();
            medicinesTable.find(".deleteMedicine").remove();
            medicinesTable.find("th:last").remove();
            medicinesTable.find("thead").remove();

            // Construct the prescription content
            let prescriptionContent = `
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    /* Add your custom styles here */
                </style>
            </head>
            <body>
            <div class="prescription">
                <div class="doctor-patient-info">
                    <div class="info-column">
                        <h5>Doctor Information</h5>
                        ${doctorInfo}
                    </div>
                    <div class="info-column">
                        <h5>Patient Information</h5>
                        ${patientInfo}
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-6">
                        <p><strong>CC:</strong> ${cc}</p>
                        <p><strong>Advice:</strong> ${advice}</p>
                        <p><strong>Follow Up:</strong> ${followUp}</p>
                    </div>
                    <div class="col-6">
                        <h3>Medicines</h3>
                        ${medicinesTable.html()}
                    </div>
                </div>
            </div>
            </body>
            </html>
        `;

            return prescriptionContent;
        }

        // Function to get doctor information
        async function getDoctorInfo(doctorId) {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '{{ route("api.Doctor.find") }}',
                    type: 'GET',
                    data: {
                        "id": doctorId
                    },
                    success: function (res) {
                        let data = JSON.parse(res);
                        let doctor = data.doctor;

                        let doctorInfo = `
                        <p><strong>Doctor Name:</strong> ${doctor.name}</p>
                        <p><strong>Designation:</strong> ${doctor.designation}</p>
                        <p><strong>Email:</strong> ${doctor.email}</p>
                        <p><strong>Phone:</strong> ${doctor.phone_number}</p>
                    `;
                        resolve(doctorInfo);
                    },
                    error: function (err) {
                        reject(err);
                    }
                });
            });
        }

        // Function to get patient information
        async function getPatientInfo(patientId) {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '{{ route("api.Patient.findDetails") }}',
                    type: 'GET',
                    data: {
                        "id": patientId
                    },
                    success: function (res) {
                        let data = JSON.parse(res);
                        let patient = data.patient;

                        let dob = new Date(patient.dob);
                        let today = new Date();
                        let ageInMonths = (today.getFullYear() - dob.getFullYear()) * 12 + (today.getMonth() - dob.getMonth());
                        let years = Math.floor(ageInMonths / 12);
                        let months = ageInMonths % 12;

                        let patientInfo = `
                        <p><strong>Patient Name:</strong> ${patient.name}</p>
                        <p><strong>Gender:</strong> ${patient.gender}</p>
                        <p><strong>Contact:</strong> ${patient.contact_number}</p>
                        <p><strong>Email:</strong> ${patient.email}</p>
                        <p><strong>Age:</strong> ${years} years and ${months} months</p>
                    `;
                        resolve(patientInfo);
                    },
                    error: function (err) {
                        reject(err);
                    }
                });
            });
        }

        var medicines = [];

        // Function to print the medicine list
        function printMedicineList(medicines) {
            let sn = 1;
            $("#medicines").html("");

            medicines.forEach(function (medicine) {
                $("#medicines").append(`<tr>
            <td>${sn++}</td>
            <td>${medicine.name}</td>
            <td>${medicine.dosage}</td>
            <td>${medicine.days}</td>
            <td>${medicine.instructions}</td>
            <td><input class='deleteMedicine btn btn-danger' type='button' value='Del' data-id='${medicine.medicine_id}'/></td>
        </tr>`);
            });
        }

        // Function to clear input fields after adding a medicine
        function clearInputFields() {
            $("#cmbMedicines").val("");
            $("#txtDosage").val("");
            $("#txtDays").val("");
            $("#txtInstructions").val("");
        }

        // Function to save prescription data
        function savePrescriptionData() {
            let doctor_id = $("#cmbDoctors").val();
            let patient_id = $("#cmbPatients").val();
            let prescription_date = $("#txtPrescriptionDate").val();
            let cc = $("#cc").val();
            let advice = $("#advice").val();
            let followUp = $("#followUp").val();

            let _data = {
                "doctor_id": doctor_id,
                "patient_id": patient_id,
                "prescription_date": prescription_date,
                "cc": cc,
                "advice": advice,
                "followUp": followUp,
                "pres_medicines": medicines
            };

            // Save data using AJAX
            $.ajax({
                url: '{{ route("api.Prescription.save") }}',
                type: 'POST',
                data: _data,
                success: function (res) {
                    console.log("Prescription data saved successfully.");
                    // Clear medicine list and reload the page
                    $("#medicines").html("");
                    location.reload();
                },
                error: function (err) {
                    console.error("Error saving prescription data:", err);
                }
            });
        }

        // Function to handle the button click event to save prescription data
        $("#btnsavepres").on("click", function () {
            if (confirm("Are you sure?")) {
                savePrescriptionData();
            }
        });

        // Function to handle the button click event to clear all medicines
        $("#clearAllMedicines").on("click", function () {
            medicines = [];
            $("#medicines").html("");
        });

    });
</script>


// ----------------------------------------next update-----------------------

<script>
    jQuery(document).ready(function () {
        // AJAX request when selecting a doctor
        jQuery('select[name="cmbDoctors"]').on('change', function () {
            var doctorID = jQuery(this).val();
            if (doctorID) {
                jQuery.ajax({
                    url: 'api/doctors/' + doctorID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#doctor-info").html(`<p class="mb-1"><strong>Designation: </strong>${data.doctor.designation}</p>
                            <p class="mb-1"><strong>Phone: </strong>${data.doctor.phone}</p>
                            <p class="mb-1"><strong>Email: </strong>${data.doctor.email}</p>`);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching doctor information:", error);
                    }
                });
            } else {
                $('#doctor-info').empty();
            }
        });

        // AJAX request when selecting a patient
        jQuery('select[name="cmbPatients"]').on('change', function () {
            var patientID = jQuery(this).val();
            if (patientID) {
                jQuery.ajax({
                    url: 'api/patients/' + patientID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        let dob = new Date(data.patient.dob);
                        let today = new Date();
                        let ageInMonths = (today.getFullYear() - dob.getFullYear()) * 12 + (today.getMonth() - dob.getMonth());
                        let years = Math.floor(ageInMonths / 12);
                        let months = ageInMonths % 12;

                        $("#patient-info").html(`<p class="mb-1"><strong>Gender: </strong>${data.patient.gender}</p>
                            <p class="mb-1"><strong>Contact: </strong>${data.patient.contact_number}</p>
                            <p class="mb-1"><strong>Email: </strong>${data.patient.email}</p>
                            <p class="mb-1"><strong>Age: </strong>${years} years and ${months} months</p>`);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching patient information:", error);
                    }
                });
            } else {
                $('#patient-info').empty();
            }
        });
    });
</script>
