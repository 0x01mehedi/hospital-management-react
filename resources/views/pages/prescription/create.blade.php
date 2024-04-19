@extends('layouts.app')


@section('page')
<link rel="stylesheet" href="{{ asset('css/prescription.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-...." crossorigin="anonymous" />

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery-ajax-unobtrusive@3.2.6/dist/jquery.unobtrusive-ajax.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="section mt-4 table-responsive custom-border">
    <form class="custom-container" action="{{ route('prescriptions.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <!-- Patient Information -->
        <div class="row d-flex align-items-center">
            <div class="col-md-2">
                <img src="{{ asset('assets/images/faces/hospital.png') }}" alt="Hospital Logo"
                    style="height: 100px; width: 100px;">
            </div>
            <div class="col-md-8 text-center">
                <address>
                    <h3>MODERN HOSPITAL</h3>
                    Panthopath, Dhaka<br>
                    Mobile: 017834433<br>
                    Email: mhms@ihospital.com<br>
                </address>
            </div>
        </div>


        <div class="row ">

            <div class="col-md-4 form-group" style="margin-left:60px;">
                <label for="cmbDoctors">Doctor</label>
                <address>

                    <select name="doctor" id="cmbDoctors" class="form-control">
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>


                    <div id="doctor-info"></div>

                </address>
            </div>




            <div class="col-md-4 ">
                <label for="cmbPatients">Patient</label>
                <address class="form-group">

                    <select name="patient" id="cmbPatients" class="form-control">
                        <option value="">Select Patient</option>
                        @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>


                    <div id="patient-info"></div>

                </address>
            </div>

            <div class="col-md-2 " style="margin-left:70px;">
                <div><label for="txtPrescriptionDate">Date</label></div>
                <input class="form-group" type="text" style="width:120px" id="txtPrescriptionDate"
                    value="{{ date('d-m-Y') }}" readonly />
                <div><label for="prescriptionId">PID</label> <input class="form-group" type="text" style="width:40px"
                        value="{{ \App\Models\Prescription::getLastId() ? \App\Models\Prescription::getLastId() + 1 : 1 }}"
                        readonly /></div>

            </div>
        </div>






        <hr>
        <div class="row mt-3 table-responsive">

            <i class="fas fa-prescription" style='font-size:40px;'> :</i>
            <!-- Left Column -->
            <div class="col-md-4 custom-border" style="margin-left: 60px;">
                <label for="cc" class="form-label">C/C</label>
                <textarea class="form-control" id="cc" rows="6"></textarea>

                <!-- Add Advice Section -->
                <label for="advice" class="form-label mt-3">Advice</label>
                <textarea class="form-control" id="advice" rows="4"></textarea>
                <!-- Follow Up -->
                <label for="followUp" class="form-label">Follow Up</label>
                <textarea class="form-control" id="followUp" rows="2"></textarea>
            </div>

            <!-- Right Column -->
            <div class="col-md-7">

                <div class="row mt-3 custom-border table-responsive">
                    <h3 class="text-center">Medicines</h3>

                    <table class="table" id="medicinesDetails">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>MEDICINE</th>
                                <th>DOSAGE</th>
                                <th>DAYS</th>
                                <th>INSTRUCTIONS</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="medicines"> </tbody>

                        <tr>
                            <th></th>
                            <th class="medicinesdetails">
                                <select name="cmbMedicines" id="cmbMedicines" class="form-control">
                                    @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                    @endforeach
                                </select>

                            </th>
                            <th>
                                <input class="form-control " id="txtDosage" type="text" placeholder="1+0+1">
                            </th>
                            <th>
                                <input class="form-control " id="txtDays" type="text" placeholder="7 Days">
                            </th>
                            <th>
                                <input class="form-control " id="txtInstructions" type="text" placeholder="After Food">
                            </th>

                        </tr>


                    </table>
                    <th> <input class="btn btn-primary btn-add" type="button" id="btnAddMedicine" value="+">
                    </th>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col-12 ">
                    <button type="button" id="btnPrint" class="btn btn-info float-end"><i class="fas fa-print"></i>
                        Print Prescription</button>
                    <button type="button" id="btnsavepres" class="btn btn-success float-end"><i
                            class="fas fa-prescription"></i> Process Prescription</button>
                </div>
            </div>
        </div>
    </form>
    <div> <a class="btn btn-success" href="{{ route('prescriptions.index') }}">Manage Prescription</a></div>
</div>

<script>
jQuery(document).ready(function() {
    // AJAX request when selecting a doctor
    jQuery("#cmbDoctors").on('change', function() {
        var doctorID = jQuery(this).val();
        if (doctorID) {
            jQuery.ajax({
                url: "{{url('api/doctors')}}/" + doctorID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Check if the response contains the necessary properties
                    if (data && data.name && data.phone && data.email) {
                        // Update the doctor-info div with the received data
                        $("#doctor-info").html(`<p class="mb-1"><strong>Name: </strong>${data.name}</p>
                                <p class="mb-1"><strong>Phone: </strong>${data.phone}</p>
                                <p class="mb-1"><strong>Email: </strong>${data.email}</p>`);
                    } else {
                        console.error("Invalid response format:", data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching doctor information:", error);
                }
            });
        } else {
            $('#doctor-info').empty();
        }
    });

    $("#cmbPatients").on("change", function() {
        var patientID = $(this).val();
        if (patientID) {
            $.ajax({
                url: "{{url('api/patients')}}/" + patientID,
                type: 'GET',
                dataType: "json",
                success: function(data) {
                    // Check if the response contains the necessary properties
                    if (data && data.name) {
                        let dob = data.dob ? new Date(data.dob) : null;
                        let ageInfo = '';
                        if (dob) {
                            let today = new Date();
                            let ageInMonths = (today.getFullYear() - dob.getFullYear()) *
                                12 + (today.getMonth() - dob.getMonth());
                            let years = Math.floor(ageInMonths / 12);
                            let months = ageInMonths % 12;
                            ageInfo =
                                `<p><strong>Age:</strong> ${years} years and ${months} months</p>`;
                        }
                        // Update the #patient-info div with patient details
                        $("#patient-info").html(`<p><strong>Name:</strong> ${data.name}</p>
                                                    <p><strong>Gender:</strong> ${data.gender_id || 'N/A'}</p>
                                                    <p><strong>Contact:</strong> ${data.contact_number || 'N/A'}</p>
                                                    <p><strong>Email:</strong> ${data.email || 'N/A'}</p>
                                                    ${ageInfo}`);
                    } else {
                        console.error("Invalid response format:", data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching patient information:", error);
                }
            });
        } else {
            $('#patient-info').empty();
        }
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
                    url: "{{url('api/doctors')}}/",
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
                    url: "{{url('api/patients')}}/",
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
                url: "{{ url('api/prescription') }}",
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






@endsection