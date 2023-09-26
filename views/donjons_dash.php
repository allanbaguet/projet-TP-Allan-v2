<div class="container-fluid">
    <a href="/controllers/dashboard_controller.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
        </a>
        <h1 class="text-center mb-4">Liste des donjons</h1>
        <div class="d-flex justify-content-center">
            <a href="/controllers/preset_donjon_controller.php">
                <button type="button" class="btn mb-4" id="button-green">+ Nouveau donjon</button>
            </a>

        </div>
        <div class="row my-5">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-active">
                            <th scope="col">ID</th>
                            <th scope="col">Liste donjons</th>
                            <th scope="col">Modification</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>Crypte de kardorim</td>
                            <td class="d-flex justify-content-evenly">
                            <button class="btn btn-transparent">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-transparent">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <td>Grange du tournesol</td>
                            <td class="d-flex justify-content-evenly">
                                <button class="btn btn-transparent">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-transparent">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">3</th>
                            <td>Enclos du BR</td>
                            <td class="d-flex justify-content-evenly">
                            <button class="btn btn-transparent">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-transparent">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>