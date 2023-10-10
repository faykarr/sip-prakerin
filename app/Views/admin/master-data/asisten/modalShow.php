<div class="modal fade text-left modal-borderless" id="showAsistenModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Detail Asisten
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid rounded" src="<?= base_url("/assets/compiled/jpg/school.jpg") ?>"
                            alt="Card image cap" style="height: 20rem">
                        <div class="card-body">
                            <h4 class="card-title nama_asisten">
                            </h4>
                            <p class="text-muted">
                                Detail asisten dosen UPT Komputer - <span class="nama_asisten"></span>
                            </p>
                            <hr>
                            <div class="row justify-content-start">
                                <div class="col-md-8">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    NIM
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td>
                                                    <strong class="nim">
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    Nama Asisten
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="nama_asisten">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    No HP
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="no_hp">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    Email Asisten
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    Alamat
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="alamat">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    Jabatan
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="jabatan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    Status
                                                </td>
                                                <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td class="status">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                    <span>Close</span>
                </button>
            </div>
        </div>
    </div>
</div>