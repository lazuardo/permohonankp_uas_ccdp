<!-- jQuery -->
<script src="<?= $this->url_assets();?>AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $this->url_assets();?>AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= $this->url_assets();?>AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $this->url_assets();?>AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $this->url_assets();?>AdminLTE-master/dist/js/demo.js"></script>
<!-- AdminLTE for wizard -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<script>
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'default', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        enableURLhash: true, // Enable selection of the step based on url hash
        transition: {
            animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
        },
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // Add done state on navigation
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        keyboardSettings: {
            keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'Next',
            previous: 'Previous'
        },
        disabledSteps: [], // Array Steps disabled
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
        $('#smartwizard').smartWizard();
    });
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })


    $("#smartwizard").on("stepContent", function(e, anchorObject, stepIndex, stepDirection) {
        // var data = [];
        // var nama_perusahaan = document.getElementById("nama_perusahaan").value;
        // var alamat_perusahaan = document.getElementById("alamat_perusahaan").value;
        // var deskripsi_kegiatan = document.getElementById("deskripsi_kegiatan").value;
        // var kategori = document.getElementById("kategori").value;

        // data.push(nama_perusahaan);
        // data.push(alamat_perusahaan);
        // data.push(deskripsi_kegiatan);
        // data.push(kategori);
        if (stepIndex == 1) {
            $("#form_perusahaan").submit();

        }
        if (stepIndex == 2) {
            // saat dari step 2 ke 3 maka semua data akan di masukkan kedalam database


        }

    });
</script>
</body>

</html>