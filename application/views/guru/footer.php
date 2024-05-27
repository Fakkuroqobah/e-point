        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p><?= date('Y') ?> &copy; Yunita</p>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="<?php echo base_url();?>assets/js/app.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/perfect-scrollbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>    
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(100)
                .height(auto);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.selectpicker-modal').select2({ width: '100%', dropdownParent: $("#myModal") });
    $('.selectpicker-modal-import').select2({ width: '100%', dropdownParent: $("#import") });
    $('.selectpicker').select2({ width: '100%' });

    $('#datatables8').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });
});
</script>
</body>
</html>