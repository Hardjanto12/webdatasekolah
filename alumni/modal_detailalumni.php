<!-- button -->
<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#detail"
    data-idalumni="<?=$x['id_siswa']?>"><i class="bi bi-info-circle" aria-hidden="true">
        Detail</i>
</button>

<!-- Modal Add Data Alumni-->
<div class="modal fade " id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="details">
            </div>
        </div>
    </div>
</div>


<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- when button clicked, show alert 'button clicked' -->
<script>
$(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idalumni = button.data('idalumni') // Extract info from data-* attributes
        var modal = $(this)
        $.ajax({
            url: 'alumni/load-detail.php',
            type: 'POST',
            data: 'idalumni=' + idalumni,
            success: function(data) {
                modal.find('.modal-body').html(data)
            }
        })
    })
})
</script>