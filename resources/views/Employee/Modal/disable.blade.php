
    <div class="modal fade" id="disableEmployeeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                        Disable Employee
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p class="mb-2 fw-bold">
                        Are you sure you want to disable this employee?
                    </p>
                    <p class="text-muted mb-0">
                        This action will deactivate the employee.<br>
                        No data will be permanently deleted.
                    </p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <form id="disableEmployeeForm" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-danger">
                            Yes, Disable
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        const disableModal = document.getElementById('disableEmployeeModal');

        disableModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const employeeId = button.getAttribute('data-employee-id');

            const form = document.getElementById('disableEmployeeForm');
            form.action = `/employees/${employeeId}/disable`;
        });
    </script>
