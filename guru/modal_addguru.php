<!-- button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalsiswa"><i
        class="bi bi-plus-lg" aria-hidden="true"></i>
    Tambahkan
    guru
</button>
<!-- Modal Add Data Alumni-->
<div class="modal fade " id="addModalsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan data guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php 
                    include 'input.php';
                    ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>